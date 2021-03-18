<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Encoder;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class EncoderController extends Controller
{
    private function getMunicipalities()
    {
        return Municipality::all();
    }

    private function showEncodersList()
    {
        $encoders = User::where('role', '3')->where('municipality_id', Auth::user()->municipality_id)->paginate(5);
        return view('pages.admin.lists.encoder-lists',[
            'encoders'=>$encoders
        ]);
    }

    public function index()
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        return $this->showEncodersList();
    }

    public function reset(User $encoder)
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);

        $encoder->password=Hash::make('1234');
        $encoder->save();

        return $this->showEncodersList()->with([
            'success'=>true,
            'message'=>'Password reset successful!'
        ]);
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
            'first_name'            =>      'required',
            'last_name'             =>      'required',
            'username'              =>      'required|unique:users,username',
            'password'              =>      'required|min:4',
            'confirm'               =>      'required',
            'municipality_id'          =>      'required'
        ]);

        if($validator->fails())
        {
            return redirect(route('encoder.create'))->withErrors($validator)->withInput();
        }

        if($this->passwordCheck($request->password, $request->confirm))
        {
            return redirect(route('encoder.create'))->with([
                    'registered'  => false,
                    'title'    => 'Warning!',
                    'text' => 'Password does not match'
                ])->withInput();
        }

        User::create([
            'first_name'    =>      Str::title($request->first_name),
            'last_name'     =>      Str::title($request->last_name),
            'username'      =>     $request->username,
            'password'      =>     bcrypt($request->password),
            'municipality_id'  =>     $request->municipality_id,
            'role'     =>      FacadesUser::ENCODER,
        ]);

        return redirect(route('encoder.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New encoder was added'
            ]);
    }

    public function edit(User $encoder)
    {
    
        Auth::user()->allowIf(FacadesUser::ADMIN);
        return view('pages.admin.edit-forms.encoder',[
            'encoder'=>$encoder
        ]);
    }

    public function update(User $encoder, Request $request)
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        Validator::make($request->all(), [
            'first_name'            =>      'required',
            'last_name'             =>      'required',
            'municipality_id'       =>      'required'
        ])->validate();
        
        $encoder->first_name=$request->first_name;
        $encoder->last_name=$request->last_name;
        $encoder->municipality_id=$request->municipality_id;
        $encoder->save();

        return redirect(route('encoder.edit',$encoder))->with([
            'registered' => true,
            'title'      => 'Great!',
            'text'       => 'Update encoder information successfully!'
        ]);
    }


    public function destroy($id)
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        try
        {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect(route('encoder.index'))->with('message', 'User successfully deleted');
        }
        catch(ModelNotFoundException $e)
        {
            abort(400);
        }
    }
}
