<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function create()
    {
        return view('pages.admin.add-facility', ['user' => 'Admin']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facility_name'         =>      'required',
            'municipality'          =>      'required',
        ]);

        if($validator->fails())
        {
            dd($validator);
            return redirect(route('facility.create'))->withErrors($validator)->withInput();
        }

        Facility::create([
            'facility_name' =>      $request->facility_name,
            'municipality'  =>      $request->municipality
        ]);

        return redirect(route('facility.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New facility area was added'
            ]);
    }
}
