<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Models\Municipality;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

        return view('pages.admin.lists.vaccines-lists', [
            'vaccines' => Vaccine::where('municipality_id', Auth::user()->municipality_id)->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->allowIf(User::ADMIN);
        return view('pages.admin.add-vaccines');
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

    private function makeValidator($data)
    {
        return Validator::make($data, [
            'vaccine_name' => 'required',
            'batch_number'  =>   'required',
            'lot_number'    =>   '',
            'vaccine_manufacturer'  =>  'required',
            'municipality_id'  =>    'required'
        ]);
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
        $validator = $this->makeValidator($request->all());

        if ($validator->fails()) {
            return redirect(route('vaccine.create'))->withErrors($validator)->withInput();
        }

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
    public function edit(Vaccine $vaccine)
    {
        Auth::user()->allowIf(User::ADMIN);
        return view('pages.admin.edit-forms.vaccine',[
            'vaccine'=>$vaccine
        ]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, Vaccine $vaccine)
    {
        Auth::user()->allowIf(User::ADMIN);
        $this->makeValidator($request->all())->validate();
        $vaccine->vaccine_name=$request->vaccine_name;
        $vaccine->batch_number=$request->batch_number;
        $vaccine->lot_number=$request->lot_number;
        $vaccine->vaccine_manufacturer=$request->vaccine_manufacturer;
        $vaccine->municipality_id=$request->municipality_id;
        $vaccine->save();
        return redirect(route('vaccine.edit',$vaccine))->with([
            'created'=>true,
            'title'=>'Great!',
            'text'=>'Vaccine updated successfully!'
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
        Auth::user()->allowIf(User::ADMIN);

        try
        {
            $user = Vaccine::findOrFail($id);

            $user->delete();

            return redirect(route('vaccine.index'))->with('message', 'Vaccine successfully deleted');
        }
        catch(ModelNotFoundException $e)
        {
            abort(400);
        }
    }
}
