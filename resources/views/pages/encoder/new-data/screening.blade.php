<div class="row mt-1">
    <!-- age -->
    <div class="col-md-12 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="age_more_than_16_years_old" {{(old('age_more_than_16_years_old') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Age more than 16 yrs. old?</p>
        </div>
    </div>

    <!-- no allergies to PEG -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="alergic_to_polysorbate"  {{(old('alergic_to_polysorbate') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no allergies to PEG or polysorbate?</p>
        </div>
    </div>

    <!-- allergic reaction -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_no_severe_allergic_reaction" {{(old('has_no_severe_allergic_reaction') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no severe allergic reaction after 1st dose of the vaccine?</p>
        </div>
    </div>

    <!-- no allergy to food -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_no_allergy_to_food" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no allergy to food, egg, medicines, and no asthma?</p>
        </div>
        <div class="d-flex justify-content-start ml-4">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_allergy_or_asthma" {{(old('if_with_allergy_or_asthma') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?</p>
        </div>
    </div>

    <!-- history of bleeding -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_no_history" {{(old('has_no_history') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no history of bleeding disorders or currently taking anti-coagulants?</p>
        </div>
        <div class="d-flex justify-content-start ml-4">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_bleeding_history" {{(old('if_with_bleeding_history') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">If with bleeding history, is gauge 23-25 syringe available for injection?</p>
        </div>
    </div>

    <!-- does not manifest any symptoms -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="does_not_manifest_any_of_the_following_symptoms" {{(old('does_not_manifest_any_of_the_following_symptoms') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds,
            Sore Throat, Myalga, Fatigue, Weakness, Loss of smell/taste, Diarrhea,
            Shortness of breath/difficulty in breathing?</p>
        </div>
        <div class="d-flex justify-content-start ml-2 pl-2">

            <div>
                <p class="ml-3 mt-2 pt-1 text-secondary">* If manifesting any of the mentioned symptom/s, specify all that apply</p>

                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Fever/chills" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Fever/Chills</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Headache" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Headache</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Cough" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Cough</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Colds" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Colds</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Soar Throat" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Soar Throat</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Myalga" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Myalga</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Fatigue" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Fatigue</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Weakness" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Weakness</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Loss of smell/taste" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Loss of smell/taste</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Diarrhea" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Diarrhea</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_manifesting_any_of_the_mentioned_symptoms[]" value="Shortness of breath/difficulty in breathing" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Shortness of breath/difficulty in breathing</p>
                </div>
            </div>

        </div>
    </div>

    <!-- history of exposure -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_no_history_of_exposure" {{(old('has_no_history_of_exposure') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?</p>
        </div>
    </div>

    <!-- not previously treated with covid -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_not_been_previously_treated_for_covid_19" {{(old('has_not_been_previously_treated_for_covid_19') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has not been previously treated for COVID-19 in the past 90 days?</p>
        </div>
    </div>

    <!-- has ot receive any vaccine -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_not_received_any_vaccine_in_the_past_2_weeks" {{(old('has_not_received_any_vaccine_in_the_past_2_weeks') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no received any vaccine in the past two weeks?</p>
        </div>
    </div>

    <!-- history of bleeding -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="has_not_received_convalescent" {{(old('has_not_received_convalescent') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?</p>
        </div>
    </div>

    <!-- not pregnant -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="not_pregnant" {{(old('not_pregnant') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Not pregnant?</p>
        </div>
        <div class="ml-2 pl-2">

            <div class="col-md-6">
                <p class="ml-3 mt-2 pt-1 text-secondary">* If pregnant, select a trimester?</p>

                <select type="text" class="form-control ml-3" name="if_pregnant_2nd_or_3rd_trimester">
                    <option value="">-- Please select --</option>
                    <option value="2nd Trimester">2nd Trimester</option>
                    <option value="3rd Trimester">3rd Trimester</option>
                </select>
            </div>

        </div>
    </div>

    <!-- does not have HIV, Cancer etc -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="does_not_have_any_of_the_following" {{(old('does_not_have_any_of_the_following') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Does not have any of the follwing: HIV, Cancer/Malignancy, Underwent Transplant, Under Steriod Medication/Treatment, Bed Ridden,
                terminal illness, less than 6 months prognosis</p>
        </div>
        <div class="d-flex justify-content-start ml-3">

            <div>
                <p class="ml-3 mt-2 pt-1 text-secondary">* If with mentioned condition/s, specify</p>

                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="HIV" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">HIV</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="Cancer/Malignancy" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Cancer/Malignancy</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="Underwent Transplant" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Underwent Transplant</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="Under Steriod Medication/Treatment" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Under Steriod Medication/Treatment</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="Bed Ridden" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Bed Ridden</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="Terminal Illness" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Terminal illness</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_conditions_specify[]" value="Less 6 months prognosis" {{(old('has_no_allergy_to_food') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">Less 6 months prognosis</p>
                </div>

                <div class="d-flex justify-content-start ml-3 mt-4">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="if_with_mentioned_condition_has_presented_medical_clearance" {{(old('if_with_mentioned_condition_has_presented_medical_clearance') == "on") ? 'checked' : ''}}>
                    <p class="ml-3 mt-1 pt-1 text-secondary">If with mentioned condition, has presented medical clearance 

                        prior to vaccination day?</p>
                </div>

            </div>
        </div>
    </div>

    <!-- does not manifest any symptoms -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="deferral" {{(old('deferral') == "on") ? 'checked' : ''}}>
            <p class="ml-3 mt-1 pt-1 text-secondary">Deferral?</p>
        </div>

        <div class="ml-2">
            <div class="col-md-6">
                <p class="ml-3 mt-2 pt-1 text-secondary">* If deferral, specify</p>
                @error('specify_deferral_text')<span class="text-danger ml-3">{{ $message }}</span>@enderror
                <input type="text" class="form-control ml-3" name="if_deferral_specify" value="{{ old('if_deferral_specify') }}">
            </div>
        </div>

    </div>
</div>
