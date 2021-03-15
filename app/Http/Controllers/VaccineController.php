<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use App\Models\Municipality;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VaccineController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        $vaccines = Vaccine::all();
        return view('pages.admin.lists.vaccines-lists',['vaccines' => $vaccines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        return view('pages.vaccine.add-vaccine');
    }


    private function getMunicipalityId($municipality)
    {
        $mun = Municipality::where('municipality_name', $municipality)->get();

        $data_mun = '';

        foreach ($mun as $value) {
            $data_mun = $value->id;
        }

        return $data_mun;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        $validator = Validator::make($request->all(), [
            'batch_number'  =>   'required',
            'lot_number'    =>   'required',
            'vaccine_manufacturer'  =>  'required',
            'municipality_id'  =>    'required'
        ]);


        if ($validator->fails()) {
            return redirect(route('vaccine.create'))->withErrors($validator);
        }

        if (!Municipality::checkMunicipalityExist($request->municipality_id)) {
            return redirect(route('vaccine.create'))->withErrors([
                'municipality_id' => 'No municipality match'
            ]);
        }

        $municipality_id = $this->getMunicipalityId($request->municipality_id);

        Vaccine::create([
            'batch_number'      =>      $request->batch_number,
            'lot_number'        =>      $request->lot_number,
            'vaccine_manufacturer'      =>  $request->vaccine_manufacturer,
            'municipality_id'           =>      $municipality_id
        ]);

        return redirect(route('vaccine.create'))->with('created', true)->with('message', 'New vaccine added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
    //     Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
    //     //
    // }
}
