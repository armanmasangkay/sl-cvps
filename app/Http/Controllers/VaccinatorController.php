<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Http\Requests\VaccinatorRequest;
use App\Classes\Facades\User as FacadesUser;
use App\Models\Facility;
use App\Models\Vaccinator;
use App\Repositories\Contracts\VaccinatorRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VaccinatorController extends Controller
{
    private $vaccinatorRepository;

    public function __construct(VaccinatorRepositoryInterface $vaccinatorRepository)
    {
       $this->vaccinatorRepository=$vaccinatorRepository;
    }

    public function index()
    {
        Auth::user()->allowIf(User::ADMIN);

        return view('pages.admin.lists.vaccinators-lists',[
            'vaccinators' => Vaccinator::where('municipality_id', Auth()->user()->municipality_id)->paginate(5)]);
    }

    private function getFacilities()
    {
        return Facility::where('municipality_id', Auth::user()->municipality_id)->get();
    }

    public function create()
    {
        Auth::user()->allowIf(User::ADMIN);
        return view('pages.admin.vaccinator-registration', ['facilities' => $this->getFacilities()]);
    }

    private function createVaccinatorValidator($data)
    {
       return Validator::make($data,[
            'firstname'=>'required',
            'lastname'=>'required',
            'position'=>'required',
            'role'=>'required',
            'facility_id'=>'required',
            'prc'=>'required',
            'municipality_id' => 'required'
        ]);
    }

    public function store(Request $request)
    {
        Auth::user()->allowIf(User::ADMIN);
        $validator=$this->createVaccinatorValidator($request->all());

        if($validator->fails()){
            return redirect(route('vaccinator.create'))->withErrors($validator)->withInput();

        }


        $this->vaccinatorRepository->store($request->all());


        return redirect(route('vaccinator.create'))->with([
            'created'=>true,
            'title'  => 'Great!',
            'text'   =>'Vaccinator successfully registered.'
        ]);
    }

    public function edit(Vaccinator $vaccinator)
    {
        return view('pages.admin.edit-forms.vaccinator',[
            'vaccinator'=>$vaccinator,
            'facilities'=>$this->getFacilities()
        ]);
    }

    public function update(Vaccinator $vaccinator,Request $request)
    {
        $this->createVaccinatorValidator($request->all());

        $vaccinator->firstname=$request->firstname;
        $vaccinator->middlename=$request->middlename;
        $vaccinator->lastname=$request->lastname;
        $vaccinator->suffix=$request->suffix;
        $vaccinator->position=$request->position;
        $vaccinator->role=$request->role;
        $vaccinator->facility_id=$request->facility_id;
        $vaccinator->prc=$request->prc;
        $vaccinator->municipality_id=$request->municipality_id;
        $vaccinator->save();
        return redirect(route('vaccinator.edit',$vaccinator))->with([
            'created'=>true,
            'title'  => 'Great!',
            'text'   =>'Vaccinator successfully updated.'
        ]);
    }

    public function destroy($id)
    {
        Auth::user()->allowIf(User::ADMIN);

        try
        {
            $user = Vaccinator::findOrFail($id);

            $user->delete();

            return redirect(route('vaccinator.index'))->with('message', 'Vaccinator successfully deleted');
        }
        catch(ModelNotFoundException $e)
        {
            abort(400);
        }
    }
}
