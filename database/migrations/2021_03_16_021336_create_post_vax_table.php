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
        Schema::create('post_vaxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->boolean('consent')->default(false);
            $table->string('reason_for_consent')->nullable();
            $table->boolean("age_more_than_16_years_old")->default(false);
            $table->boolean("has_no_allergies")->default(false);
            $table->boolean("has_no_severe_allergic_reaction")->default(false);
            $table->boolean("has_no_allergy_to_food")->default(false);
            $table->boolean("if_with_allergy_or_asthma")->nullable();
            $table->boolean("has_no_history")->default(false);
            $table->boolean("if_with_bleeding_history")->nullable();
            $table->boolean("does_not_manifest_any_of_the_following_symptoms")->default(false);
            $table->string("if_manifesting_any_of_the_mentioned_symptoms")->nullable();
            $table->boolean("has_no_history_of_exposure")->default(false);
            $table->boolean("has_not_been_previously_treated_for_covid_19")->default(false);
            $table->boolean("has_not_received_any_vaccine_in_the_past_2_weeks")->default(false);
            $table->boolean("has_not_received_convalescent")->default(false);
            $table->boolean("not_pregnant")->default(false);
            $table->string("if_pregnant_2nd_or_3rd_trimester")->nullable();
            $table->boolean("does_not_have_any_of_the_following")->default(false);
            $table->string('if_with_mentioned_conditions_specify')->nullable();
            $table->boolean("if_with_mentioned_condition_has_presented_medical_clearance")->nullable();
            $table->boolean("deferral")->default(false);
            $table->string('if_deferral_specify')->nullable();
            $table->date('date_of_vaccination');
            $table->unsignedBigInteger('vaccine_id');
            $table->unsignedBigInteger('vaccinator_id');
            $table->unsignedTinyInteger('dose');
            $table->timestamps();
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade');
            $table->foreign('vaccinator_id')->references('id')->on('vaccinators')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_vaxes');
    }
}
