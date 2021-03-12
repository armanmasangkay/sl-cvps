<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Person;

class RegistrationController extends Controller
{
    public function render()
    {
        return view('pages.register')
        ->with(['success' => true, 'title' => 'Great!', 'text' => 'Registration was successful!']);;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qr_code'            => 'required',
            'category'           => 'required',
            'category_id'        => 'required',
            'category_id_num'    => 'required',
            'last_name'          => 'required',
            'first_name'         => 'required',
            'current_reside_prov'=> 'required',
            'current_reside_mun' => 'required',
            'current_reside_brgy'=> 'required',
            'sex'                => 'required',
            'birth_date'         => 'required'
        ]);

        if($validator->fails())
        {
            return redirect(route('person.registration'))
                    ->withErrors($validator)
                    ->withInput();
        }

        $person = Person::create([
            'qr_code'            => $request->qr_code,
            'category'           => $request->category,
            'category_id'        => $request->category_id,
            'category_id_num'    => $request->category_id_num,
            'philhealth_id'      => $request->philhealth_id,
            'pwd_id'             => $request->pwd_id,
            'last_name'          => $request->last_name,
            'first_name'         => $request->first_name,
            'middle_name'        => $request->middle_name,
            'suffix'             => $request->suffix,
            'current_reside_reg' => $request->current_reside_reg,
            'current_reside_prov'=> $request->current_reside_prov,
            'current_reside_mun' => $request->current_reside_mun,
            'current_reside_brgy'=> $request->current_reside_brgy,
            'sex'                => $request->sex,
            'birth_date'         => $request->birth_date
        ]);

        return redirect(route('person.registration'))
                ->with(['success' => true, 'title'=> 'Great!', 'text'=> 'Registration was successful!']);
    }
}
