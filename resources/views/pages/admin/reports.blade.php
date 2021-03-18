@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container-fluid mt-4 reports">
    <h4 class="text-primary text-left text-heading pt-2 pl-4 ml-1"><i data-feather="clipboard" class="mb-1"></i> Vaccination Reports</h4>
    <div class="row mt-4">
        <div class="col-md-12 pl-md-5 pr-md-5">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <form action="" method="post" class="form-inline">
                        <div class="d-flex justify-content-between">
                            <input type="date" class="form-control mr-1 ml-auto mb-1">
                            <input type="date" class="form-control mr-1 mb-1">
                        </div>
                        <!-- <select name="municipality" class="form-control mb-1 mr-1">
                            <option value="">Select Municipality</option>
                        </select> -->
                        <button type="submit" class="btn btn-primary d-flex justify-content-start mb-1 mr-1"><i data-feather="search" class="pt-1 pb-1"></i> Search</button>
                        <button type="button" class="btn btn-success d-flex justify-content-start mb-1"><i data-feather="download" class="pt-1 pb-1"></i> Export</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">
                <table class="table table-hover table-bordered mb-0 pb-0" style="min-width: 5500px !important;">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                CATEGORY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                CATEGORY ID
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                CATEGORY ID NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                PHILHEALTH ID
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                PWD ID
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                LAST NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                FIRST NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                MIDDLE NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                SUFFIX
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                CONTACT NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                REGION
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                PROVINCE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                MUNICIPALITY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                BARANGAY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                SEX
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                BIRTHDATE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                CONSENT
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                REASON FOR REFUSAL
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                AGE MORE THAN 16 YRS OLD?
                            </td>
                            <td class="border-bottom-0 border-top-0"  rowspan="2">
                                HAS NO ALLERGIES TO <br>PEG OR POLYSORBATE?
                            </td>
                            <td class="border-bottom-0 border-top-0" rowspan="2">
                                HAS NO SEVERE ALLERGIC <br>REACTION AFTER THE FIRST <br>DOSE OF THE VACCINE?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NO ALLERGY TO <br>FOOD, EGG, MEDICINES, <br>AND NO ASTHMA?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH ALLERGY OR ASTHMA, <br>WILL THE VACCINATOR ABLE <br>TO MONITOR THE PATIENT <br>FOR 30MINUTES?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NO HISTORY OF <br>BLEEDING DISORDERS OR <br>CURRENTLY TAKING <br>ANTI-COAGULANTS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH BLEEDING HISTORY, <br>IS GAUGE 23-25 SYRINGE <br>AVAILABLE FOR INJECTION?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DOES NOT MANIFEST ANY OF THE <br>FOLLOWING SYPMPTOMS: <br>FEVER/CHILLS, HEADACHE, <br>COUGH, COLDS,
                                <br>SORE THROAT, MYALGA, <br>FATIGUE, WEAKNESS, <br>LOSS OF SMELL/TASTE, <br>DIARRHEA, SHORTNESS <br>IN BREATHING
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF MANIFESTING ANY <br>OF THE MENTIONED SYMPTOM/S, <br>SPECIFY ALL THAT APPLY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NO HISTORY OF EXPOSURE <br>TO A CONFIRMED OR SUSPECTED <br>COVID-19 CASE IN <br>THE PAST 2 WEEKS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NOT BEEN PREVIOUSLY <br>TREATED FOR COVID-19 <br>IN THE PAST 90 DAYS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NOT RECEIVE ANY <br>VACCINE IN THE <br>PAST 2 WEEKS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NOT RECEIVE CONVALESCENT <br>PLASMA OR MONOCLONAL <br>ANTIBODIES FOR COVID-19 <br>IN THE PAST 90 DAYS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                NOT PREGNANT?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF PREGNANT, <br>2ND OR 3RD TRIMESTER?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DOES NOT HAVE ANY OF <br>THE FOLLOWING: HIV, <br>CANCER/MALIGNANCY, <br>UNDERWENT TRANSPLANT,
                                <br>UNDER STEROID MEDICATION/
                                <br>TREATMENT, BED RIDDEN, <br>TERMINAL ILLNESS, LESS<br> THAN 6 MONTHS PROGNOSIS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH MENTIONED <br>CONDITION/S, SPECIFY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH MENTIONED <br>CONDITION, HAS PRESENTED <br>MEDICAL CLEARANCE <br>PRIOR TO VACCINATION DAY?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DEFERRAL
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DATE OF VACCINATION
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                VACCINE MANUFACTURER
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                BATCH NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                LOT NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                VACCINATOR NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                PROFESSION OF VACCINATOR
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                1ST DOSE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                2ND DOSE
                            </td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">

@php
    function transformInteger($int)
    {
        return $int === 1 ? "YES" : "NO";
    }

    function transformDose($dose)
    {
        return $dose === 1 || $dose === 2 ? "YES" : "";

    }

    function transformNull($string)
    {
        return $string ?? "N/A" ;
    }
@endphp
                            @forelse ($vaccinateds as $vaccinated)
                            <tr class="border-bottom-1">
                            <td class="pt-1 pb-1">{{ $vaccinated->person->category }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->category_id }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->category_id_num }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->philhealth_id }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->pwd_id }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->lastname }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->firstname }}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->person->middlename )}}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->person->suffix) }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->contact_num }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->loc_region}}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->loc_prov }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->loc_muni }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->loc_brgy }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->sex }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->person->birth_date }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->consent) }}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->reason_for_consent) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->age_more_than_16_years_old) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_no_allergies) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_no_severe_allergic_reaction) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_no_allergy_to_food) }}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->if_with_allergy_or_asthma) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_no_history) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->if_with_bleeding_history) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->does_not_manifest_any_of_the_following_symptoms) }}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->if_manifesting_any_of_the_mentioned_symptoms) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_no_history_of_exposure) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_not_been_previously_treated_for_covid_19) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_not_received_any_vaccine_in_the_past_2_weeks) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->has_not_received_convalescent) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->not_pregnant) }}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->if_pregnant_2nd_or_3rd_trimester) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->does_not_have_any_of_the_following) }}</td>
                            <td class="pt-1 pb-1">{{ transformNull($vaccinated->if_with_mentioned_conditions_specify) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->if_with_mentioned_condition_has_presented_medical_clearance) }}</td>
                            <td class="pt-1 pb-1">{{ transformInteger($vaccinated->deferral) }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->date_of_vaccination}}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->vaccine->vaccine_manufacturer }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->vaccine->batch_number }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->vaccine->lot_number }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->vaccinator->fullname() }}</td>
                            <td class="pt-1 pb-1">{{ $vaccinated->vaccinator->position }}</td>
                            <td class="pt-1 pb-1">{{ ($vaccinated->dose ===1 ? "YES" : "") }}</td>
                            <td class="pt-1 pb-1">{{ ($vaccinated->dose ===2 ? "YES" : "") }}</td>

                        </tr>
                            @empty

                            @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="mt-2">
    </div>
</div>

@endsection
