<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Facility;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    private function getAllMunicipalities()
    {
        return Municipality::all();
    }

    public function index()
    {
        Auth::user()->allowIf(User::ADMIN);

        return view('pages.admin.lists.facilities-lists',[
            'facilities' => Facility::where('municipality_id', Auth::user()->municipality_id)->paginate(5)
        ]);
    }

    public function create()
    {
        Auth::user()->allowIf(User::ADMIN);
        return view('pages.admin.add-facility', [
            'user'=> 'Admin',
            'municipalities'=>$this->getAllMunicipalities()
        ]);
    }

    private function makeValidator($data)
    {
        return Validator::make($data, [
            'facility_name'         =>      'required|unique:facilities,facility_name',
            'municipality_id'          =>      'required',
        ]);
    }
    public function store(Request $request)
    {
        Auth::user()->allowIf(User::ADMIN);
        $validator = $this->makeValidator($request->all());

        if($validator->fails())
        {
            return redirect(route('facility.create'))->withErrors($validator)->withInput();
        }

        Facility::create([
            'facility_name' =>      $request->facility_name,
            'municipality_id'  =>      $request->municipality_id
        ]);

        return redirect(route('facility.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New facility area was added'
            ]);
    }

    public function edit(Facility $facility)
    {
        Auth::user()->allowIf(User::SUPER_ADMIN);
        return view('pages.admin.edit-forms.facility',[
            'facility'=>$facility
        ]);
    }

    public function update(Facility $facility,Request $request)
    {
        Auth::user()->allowIf(User::SUPER_ADMIN);
       $this->makeValidator($request->all())->validate();

       $facility->facility_name=$request->facility_name;
       $facility->save();
       return redirect(route('facility.edit',$facility))->with([
           'success'=>true,
           'message'=>'Facility updated successfully!'
       ]);
    }

    public function destroy($id)
    {
        Auth::user()->allowIf(User::ADMIN);

        try
        {
            $user = Facility::findOrFail($id);

            $user->delete();

            return redirect(route('facility.index'))->with('message', 'Facility successfully deleted');
        }
        catch(ModelNotFoundException $e)
        {
            abort(400);
        }
    }
}
