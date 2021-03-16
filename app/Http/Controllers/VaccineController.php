<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Models\Municipality;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        Auth::user()->allowIf(User::ADMIN);
    
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
        Auth::user()->allowIf(User::ADMIN);
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
        Auth::user()->allowIf(User::ADMIN);
        $validator = Validator::make($request->all(), [
            'vaccine_name' => 'required',
            'batch_number'  =>   'required',
            'lot_number'    =>   '',
            'vaccine_manufacturer'  =>  'required',
            'municipality_id'  =>    'required'
        ]);


        if ($validator->fails()) {
            return redirect(route('vaccine.create'))->withErrors($validator)->withInput();
        }

        // if (!Municipality::checkMunicipalityExist($request->municipality_id)) {
        //     return redirect(route('vaccine.create'))->with([
        //         'created' => false,
        //         'title' => 'Sorry!',
        //         'text' => 'No municipality match'
        //     ])->withInput();
        // }

        // $municipality_id = $this->getMunicipalityId($request->municipality_id);

        Vaccine::create([
            'vaccine_name'      =>      $request->vaccine_name,
            'batch_number'      =>      $request->batch_number,
            'lot_number'        =>      (empty($request->lot_number) ? 'N/A' : $request->lot_number),
            'vaccine_manufacturer'      =>  $request->vaccine_manufacturer,
            'municipality_id'           =>  $request->municipality_id
        ]);

        return redirect(route('vaccine.create'))->with([
                'created' => true,
                'title' => 'Great!',
                'text' => 'New vaccine added'
            ]);
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
