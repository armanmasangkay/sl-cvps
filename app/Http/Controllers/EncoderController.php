<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User as FacadesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Encoder;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class EncoderController extends Controller
{
    private function getMunicipalities()
    {
        return Municipality::all();
    }

    public function index()
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        $encoder = User::where('role', '3')->get();
        return view('pages.admin.lists.encoder-lists')->with('encoders', $encoder);
    }

    public function create()
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        return view('pages.admin.add-encoder', [
            'user' => 'Admin',
            'municipalities'=>$this->getMunicipalities()
        ]);
    }

    private function passwordCheck($password, $confirm_password)
    {
        if($password !== $confirm_password)
        {
            return true;
        }
    }

    public function store(Request $request)
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        $validator = Validator::make($request->all(), [
            'firstname'            =>      'required',
            'lastname'             =>      'required',
            'username'              =>      'required|unique:users,username',
            'password'              =>      'required|min:4',
            'confirm'               =>      'required',
            'municipality'          =>      'required'
        ]);

        if($validator->fails())
        {
            return redirect(route('encoder.create'))->withErrors($validator)->withInput();
        }

        if($this->passwordCheck($request->password, $request->confirm))
        {
            return redirect(route('encoder.create'))->with([
                    'matched'  => false,
                    'title'    => 'Warning!',
                    'text' => 'Password does not match'
                ])->withInput();
        }

        User::create([
            'first_name'    =>      Str::title($request->firstname),
            'last_name'     =>      Str::title($request->lastname),
            'username'      =>     $request->username,
            'password'      =>     bcrypt($request->password),
            'municipality_id'  =>     $request->municipality,
            'role'     =>      FacadesUser::ENCODER,
        ]);

        return redirect(route('encoder.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New encoder was added'
            ]);
    }


    public function destroy($id)
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        try
        {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect(route('admin.index'))->with('message', 'User successfully deleted');
        }
        catch(ModelNotFoundException $e)
        {
            abort(400);
        }
    }
}
