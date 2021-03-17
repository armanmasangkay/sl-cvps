<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostVaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_vax', function (Blueprint $table) {
            $table->id();
            $table->boolean('consent');
            $table->string('reason_for_consent')->nullable();
            $table->boolean("age_more_than_16_years_old");
            $table->boolean("has_no_allergies_to_peg_or_polysorbate");
            $table->boolean("has_no_severe_allergic_reaction_after_the_1st_does_of_the_vaccine");
            $table->boolean("has_no_allergy_to_food_egg_medicines_and_no_asthma");
            $table->boolean("if_with_allergy_or_asthma_will_the_vaccinator_able_to_monitor_the_patient_for_30_minutes")->nullable();
            $table->boolean("has_no_history_of_bleeding_disorders_or_currently_taking_anti_coagulants");
            $table->boolean("if_with_bleeding_history_is_a_gauge_23_25_syringe_available_for_injection")->nullable();
            $table->boolean("does_not_manifest_any_of_the_following_symptoms_fever_chills_headache_cough_colds_sore_throat_myalgia_fatigue_weakness_loss_of_smell_taste_diarrhea_shortness_of_breath_difficulty_in_breathing");
            $table->string("if_manifesting_any_of_the_mentioned_symptoms_specify_all_that_apply")->nullable();
            $table->boolean("has_no_history_of_exposure_to_a_confirmed_or_suspected_covid_19_case_in_the_past_2_weeks");
            $table->boolean("has_not_been_previously_treated_for_covid_19_in_the_past_90_days");
            $table->boolean("has_not_received_any_vaccine_in_the_past_2_weeks");
            $table->boolean("hast_not_received_convalescent_plasma_or_monoclonal_antibodies_for_covid_19_in_the_past_90_days");
            $table->boolean("not_pregnant");
            $table->string("if_pregnant_2nd_or_3rd_trimester")->nullable();
            $table->boolean("does_not_have_any_of_the_following_hiv_cancer_malignancy_underwent_transplant_under_steroid_medication_treatment_bed_ridden_terminal_illness_less_than_6_months_prognosis");
            $table->string('if_with_mentioned_conditions_specify')->nullable();
            $table->boolean("if_with_mentioned_condition_has_presented_medical_clearance_prior_to_vaccination_day")->nullable();
            $table->boolean("deferral");
            $table->date('date_of_vaccination');
            $table->unsignedBigInteger('vaccine_id');
            $table->unsignedBigInteger('vaccinator_id');
            $table->unsignedTinyInteger('dose');
            $table->timestamps();
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade');
            $table->foreign('vaccinator_id')->references('id')->on('vaccinators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_vax');
    }
}
