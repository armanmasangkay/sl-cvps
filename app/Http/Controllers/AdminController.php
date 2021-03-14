<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('pages.admin.add-new');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('pages.admin.add-new', ['user' => 'Super Admin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     private function passwordCheck($password, $confirm_password)
     {
        if($password !== $confirm_password)
        {
            return true;
        }
     }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'            =>      'required',
            'last_name'             =>      'required',
            'username'              =>      'required',
            'password'              =>      'required|min:4',
            'confirm_password'      =>      'required',
            'municipality'          =>      'required',
        ]);

        if($validator->fails())
        {
            return redirect(route('admin.create'))->withErrors($validator)->withInput();
        }


        if(Admin::adminExist($request->username))
        {
            return redirect(route('admin.create'))->withErrors(['username' => 'Username already in use']);
        }

        if($this->passwordCheck($request->password, $request->confirm_password))
        {
            return redirect(route('admin.create'))->withErrors(['password' => 'Password does not match']);
        }

        


        $admin = Admin::create([
            'first_name'    =>      $request->first_name,
            'last_name'     =>      $request->last_name,
            'username'      =>      $request->username,
            'password'      =>      bcrypt($request->password),
            'municipality'  =>      $request->municipality
        ]);

        return redirect(route('admin.create'))->with('created',true)->with('message' , 'New Admin user added');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
