<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostVax extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
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
        'if_deferral_specify',
        'date_of_vaccination',
        'vaccine_id',
        'vaccinator_id',
        'dose',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function vaccinator()
    {
        return $this->hasOne(Vaccinator::class,'id', 'vaccinator_id');
    }

    public function getVaccinatorMunicipality()
    {

        return $this->vaccinator->municipality;
        // return $this->hasOneThrough(Municipality::class, Vaccinator::class,'municipality_id', 'vaccinator_id','id', 'id');
    }
    public function vaccine()
    {
        return $this->hasOne(Vaccine::class,'id','vaccine_id');
    }
}
