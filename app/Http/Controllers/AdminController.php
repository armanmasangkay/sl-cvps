<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use App\Http\Requests\AdminRequest;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('password.match',['only'=>['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getMunicipalities()
    {
        return Municipality::all();
    }

    public function index()
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        $user = User::where('role', '1')->paginate(5);
        return view('pages.superadmin.admin-lists')->with('users', $user);
    }

    public function reset(User $admin)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        $admin->password=Hash::make('1234');
        $admin->save();
        return redirect(route('admin.index'))->with([
            'success'=>true,
            'message'=>'Reset password succesful!'
        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    public function create()
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
    
        return view('pages.superadmin.add-admin',[
            'user'=>FacadesUser::ADMIN,
            'municipalities'=>$this->getMunicipalities()
        ]);
    }

    public function view()
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        return view('pages.admin.admin-lists');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(AdminRequest $request)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);

        User::create([
            'first_name'    =>      Str::title($request->first_name),
            'last_name'     =>      Str::title($request->last_name),
            'username'      =>      $request->username,
            'password'      =>      bcrypt($request->password),
            'municipality_id'  =>      $request->municipality,
            'role'          =>      FacadesUser::ADMIN
        ]);

    
        return redirect(route('admin.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New admin account added'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        return view('pages.admin.edit-forms.admin',[
            'municipalities'=>$this->getMunicipalities(),
            'admin'=>$admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        Validator::make($request->all(), [
        'first_name'            =>      'required',
        'last_name'             =>      'required',
        'municipality_id'          =>      'required',
        ])->validate();

        $admin->update($request->all());
        
        return redirect(route('admin.edit',$admin))->with([
            'registered' => true,
            'title'      => 'Great!',
            'text'       => 'Admin account updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
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
