<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Person;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    protected $categories=[
        'health_care_worker'=>'Health Care Worker',
        'senior_citizen'=>'Senior Citizen',
        'indigent'=>'Indigent',
        'uniformed_personnel'=>'Uniformed Personnel',
        'essential_worker'=>'Essential Worker',
        'other'=>'Other'
    ];
    
    protected $categoryIds=[
        'prc'=>'PRC Number',
        'osca'=>'OSCA Number',
        'facility_id'=>'Facility ID Number',
        'other_id'=>'Other ID',
    ];


    public function view()
    {
        return view('pages.register')
                ->with([
                    'registered'=> '', 
                    'title'     => '', 
                    'text'      => '',
                    'categories'=>$this->categories,
                    'categoryIds'=>$this->categoryIds
                ]);
    }

    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'category'       => 'required',
            'category_id'    => 'required',
            'category_id_num'=> 'required',
            'lastname'      => 'required',
            'firstname'     => 'required',
            'contact_num'    => 'required|min:11|numeric',
            'loc_region'     => 'required',
            'loc_prov'       => 'required',
            'loc_muni'       => 'required',
            'loc_brgy'       => 'required',
            'sex'            => 'required',
            'birth_date'     => 'required'
        ]);

        if($validator->fails())
        {
        
            return redirect(route('person.register'))
                    ->withErrors($validator)
                    ->withInput();
        }
        
        if(!$request->confirm)
        {
            return redirect(route('person.register'))
                    ->with([
                        'registered' => false,
                        'title'      => 'Sorry!',
                        'text'       => 'Cannot register information, please confirm your information to register. Thank you!'
                    ])->withInput();
        }

        $person = Person::create([
            'category'       => $request->category,
            'category_id'    => $request->category_id,
            'category_id_num'=> $request->category_id_num,
            'philhealth_id'  => (empty($request->philhealth_id) ? 'N/A' : $request->philhealth_id),
            'pwd_id'         => (empty($request->pwd_id) ? 'N/A' : $request->pwd_id),
            'lastname'       => Str::title($request->lastname),
            'firstname'      => Str::title($request->firstname),
            'middlename'     => Str::title($request->middlename),
            'suffix'         => Str::title($request->suffix),
            'contact_num'    => $request->contact_num,
            'loc_region'     => $request->loc_region,
            'loc_prov'       => $request->loc_prov,
            'loc_muni'       => $request->loc_muni,
            'loc_brgy'       => $request->loc_brgy,
            'sex'            => $request->sex,
            'birth_date'    => $request->birth_date
        ]);

        return redirect(route('person.register'))
            ->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'Registration went successfully. Thank you!'
            ]);

    }
}
