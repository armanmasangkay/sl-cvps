<div class="row mt-1">
    <!-- age -->
    <div class="col-md-12 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="age" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Age more than 16 yrs. old?</p>
        </div>
    </div>

    <!-- no allergies to PEG -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="alergic_to_polysorbate" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no allergies to PEG or polysorbate?</p>
        </div>
    </div>

    <!-- allergic reaction -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="alergic_reaction" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no severe allergic reaction after 1st dose of the vaccine?</p>
        </div>
    </div>

    <!-- no allergy to food -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="food_allergy" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no allergy to food, egg, medicines, and no asthma?</p>
        </div>
        <div class="d-flex justify-content-start ml-4">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="vaccinator_monitor_patient" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?</p>
        </div>
    </div>

    <!-- history of bleeding -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="bleeding_history" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no history of bleeding disorders or currently taking anti-coagulants?</p>
        </div>
        <div class="d-flex justify-content-start ml-4">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="is_syringe_available" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">If with bleeding history, is gauge 23-25 syringe available for injection?</p>
        </div>
    </div>

    <!-- does not manifest any symptoms -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="manifest_any_symptoms" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds, 
            Sore Throat, Myalga, Fatigue, Weakness, Loss of smell/taste, Diarrhea,
            Shortness of breath/difficulty in breathing?</p>
        </div>
        <div class="d-flex justify-content-start ml-2 pl-2">
            
            <div>
                <p class="ml-3 mt-2 pt-1 text-secondary">* If manifesting any of the mentioned symptom/s, specify all that apply</p>
                @error('symptoms')<span class="text-danger ml-3">{{ $message }}</span>@enderror
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Fever/chills" >
                    <p class="ml-3 mt-1 pt-1 text-secondary">Fever/Chills</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms" value="Headache">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Headache</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="sypmtoms[]" value="Cough">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Cough</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Colds">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Colds</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Soar Throat">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Soar Throat</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Myalga">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Myalga</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Fatigue">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Fatigue</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Weakness">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Weakness</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Loss of smell/taste">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Loss of smell/taste</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Diarrhea">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Diarrhea</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="symptoms[]" value="Shortness of breath/difficulty in breathing">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Shortness of breath/difficulty in breathing</p>
                </div>
            </div>
            
        </div>
    </div>

    <!-- history of exposure -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="no_exposure_covid">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?</p>
        </div>
    </div>

    <!-- not previously treated with covid -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="not_previously_treated">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has not been previously treated for COVID-19 in the past 90 days?</p>
        </div>
    </div>

    <!-- has ot receive any vaccine -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="not_receive_vaccine">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has no received any vaccine in the past two weeks?</p>
        </div>
    </div>

    <!-- history of bleeding -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="not_receive_convalescent_plasma">
            <p class="ml-3 mt-1 pt-1 text-secondary">Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?</p>
        </div>
    </div>

    <!-- not pregnant -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="not_pregnant">
            <p class="ml-3 mt-1 pt-1 text-secondary">Not pregnant?</p>
        </div>
        <div class="ml-2 pl-2">
            
            <div class="col-md-6">
                <p class="ml-3 mt-2 pt-1 text-secondary">* If pregnant, select a trimester?</p>
                @error('trimester')<span class="text-danger ml-3">{{ $message }}</span>@enderror
                <select type="text" class="form-control ml-3" name="trimester">
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
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="have_following_illness" style="padding-right: 35px;">
            <p class="ml-3 mt-1 pt-1 text-secondary">Does not have any of the follwing: HIV, Cancer/Malignancy, Underwent Transplant, Under Steriod Medication/Treatment, Bed Ridden,
                terminal illness, less than 6 months prognosis</p>
        </div>
        <div class="d-flex justify-content-start ml-3">
            
            <div>
                <p class="ml-3 mt-2 pt-1 text-secondary">* If with mentioned condition/s, specify</p>
                @error('illnesses')<span class="text-danger ml-3">{{ $message }}</span>@enderror
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illness[]" value="HIV">
                    <p class="ml-3 mt-1 pt-1 text-secondary">HIV</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illnesses[]" value="Cancer/Malignancy">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Cancer/Malignancy</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illnesses[]" value="Underwent Transplant">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Underwent Transplant</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illnesses[]" value="Under Steriod Medication/Treatment">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Under Steriod Medication/Treatment</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illnesses[]" value="Bed Ridden">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Bed Ridden</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illnesses[]" value="Terminal Illness">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Terminal illness</p>
                </div>
                <div class="d-flex justify-content-start ml-3">
                    <input type="checkbox" class="mt-2 mr-2" id="toggle" name="illnesses[]" value="Less 6 months prognosis">
                    <p class="ml-3 mt-1 pt-1 text-secondary">Less 6 months prognosis</p>
                </div>
            </div>
            
        </div>

        <div class="d-flex justify-content-start ml-3">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="not_pregnant">
            <p class="ml-3 mt-1 pt-1 text-secondary">If with mentioned condition, has presented medical clearance 
                prior to vaccination day?</p>
        </div>
    </div>

    <!-- does not manifest any symptoms -->
    <div class="col-md-12 mt-2 pl-md-5 pl-sm-3">
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="deferral">
            <p class="ml-3 mt-1 pt-1 text-secondary">Deferral?</p>
        </div>
        {{-- <div class="ml-2 pl-2">
            
            <div class="col-md-6">
                <p class="ml-3 mt-2 pt-1 text-secondary">* If deferral, specify</p>
                @error('specify_deferral_text')<span class="text-danger ml-3">{{ $message }}</span>@enderror
                <input type="text" class="form-control ml-3" name="specify_deferral_text">
            </div>
            
        </div> --}}
    </div>
</div>