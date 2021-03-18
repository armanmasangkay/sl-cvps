<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Models\Person;
use App\Models\PostVax;
use App\Models\Vaccinator;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostVaxController extends Controller
{

    protected const FIELDS = [
        'consent',
        'reason_for_consent',
        'age_more_than_16_years_old',
        'has_no_allergies',
        'has_no_severe_allergic_reaction',
        'has_no_allergy_to_food',
        'if_with_allergy_or_asthma',
        'has_no_history',
        'if_with_bleeding_history',
        'does_not_manifest_any_of_the_following_symptoms',
        'if_manifesting_any_of_the_mentioned_symptoms',
        'has_no_history_of_exposure',
        'has_not_been_previously_treated_for_covid_19',
        'has_not_received_any_vaccine_in_the_past_2_weeks',
        'has_not_received_convalescent',
        'not_pregnant',
        'if_pregnant_2nd_or_3rd_trimester',
        'does_not_have_any_of_the_following',
        'if_with_mentioned_conditions_specify',
        'if_with_mentioned_condition_has_presented_medical_clearance',
        'deferral',
        'date_of_vaccination',
        'vaccine_id',
        'vaccinator_id',
        'dose',
    ];

    private function abortIfPersonHasNoQr(Person $person)
    {
        if(!$person->hasQrCode()){
            abort('500');
        }
    }

    private function getVaccinators()
    {
        return Vaccinator::where('municipality_id',Auth::user()->municipality_id)->get();
    }


    public function index(Person $person)
    {
        Auth::user()->allowIf(User::ENCODER);
        $this->abortIfPersonHasNoQr($person);

        $vaccinators=$this->getVaccinators();

        $vaccines=Vaccine::where('municipality_id',Auth::user()->municipality_id)->get();

        return view('pages.encoder.new-data',[
            'person'=>$person,
            'vaccinators'=>$vaccinators,
            'vaccines'=>$vaccines
        ]);
    }

    private function validateRequest($request)
    {
        return Validator::make($request->all(), [
            'does_not_manifest_any_of_the_following_symptoms'   =>  'sometimes',
            'if_manifesting_any_of_the_mentioned_symptoms'      => 'required_if:does_not_manifest_any_of_the_following_symptoms,on',
            'not_pregnant'                                      =>  'sometimes',
            'if_pregnant_2nd_or_3rd_trimester'                  =>  'required_if:not_pregnant,on',
            'does_not_have_any_of_the_following'                =>  'sometimes',
            'if_with_mentioned_conditions_specify'              =>  'required_if:does_not_have_any_of_the_following,on',
            'if_with_mentioned_condition_has_presented_medical_clearance'   => 'required_if:does_not_have_any_of_the_following,on',
            'vaccinator_id'                                     =>  'required',
            'vaccine_id'                                        =>  'required',
            'date_of_vaccination'                               =>  'required',
        ]);
    }

    private function check($request)
    {
        return ($request === "on" ? true : $request);
    }

    public function store(Request $request)
    {
        Auth::user()->allowIf(User::ENCODER);
        $validator = $this->validateRequest($request);

        if($validator->fails())
        {
        return back()
            ->with([
                    'registered' => false,
                    'title'    => 'Error!',
                    'text' => 'An error occured while saving the data. Please recheck your inputs!'
                ])
            ->withErrors($validator->errors());
        }

        foreach($request->all() as $requestKey=>$requestValue)
        {
            $request[$requestKey]=$this->check($requestValue);
        }

        PostVax::create($request->all());

        return redirect(route('pre.index'))->with([
            'registered' => true,
            'title'    => 'Success!',
            'text' => 'Successfully added vaccination data!'
        ]);
    }
}
