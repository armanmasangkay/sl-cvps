@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container-fluid mt-4 reports">
    <h4 class="text-primary text-left text-heading pt-2 pl-4 ml-1"><i data-feather="clipboard" class="mb-1"></i> Vaccination Reports</h4>
    <div class="row mt-4">
        <div class="col-md-12 pl-md-5 pr-md-5">
            <div class="row">
                <div class="col-lg-6 col-md-8">

                    <form action="{{route('reports.admin.filter')}}" method="get" class="form-inline">
                        <div class="d-flex justify-content-between">
                          <div style="position: relative;">
                                <label style="position: absolute; top: -1.5rem; left: 0rem !important;">Date from:</label>
                                <input type="date" class="form-control mr-1 ml-auto mb-1" name="from" value="{{$from??''}}" required>
                            </div>
                            <div style="position: relative;">
                                <label style="position: absolute; top: -1.5rem; left: 0rem !important;">Date to:</label>
                                <input type="date" class="form-control mr-1 mb-1" name="to" value="{{$to??''}}" required>
                            </div>
                          
                        </div>
                        <!-- <select name="municipality" class="form-control mb-1 mr-1">
                            <option value="">Select Municipality</option>
                        </select> -->
                        <button type="submit" class="btn btn-primary d-flex justify-content-start mb-1 mr-1"><i data-feather="search" class="pt-1 pb-1"></i> Search</button>
                        <button type="button" class="btn btn-success d-flex justify-content-start mb-1" id="export"><i data-feather="download" class="pt-1 pb-1"></i> Export</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">
                <table class="table table-hover table-bordered mb-0 pb-0" style="min-width: 5500px !important;" id="vaccinationTable">
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
                                HAS NO ALLERGIES TO PEG OR POLYSORBATE?
                            </td>
                            <td class="border-bottom-0 border-top-0" rowspan="2">
                                HAS NO SEVERE ALLERGIC REACTION AFTER THE FIRST DOSE OF THE VACCINE?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NO ALLERGY TO FOOD, EGG, MEDICINES, AND NO ASTHMA?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH ALLERGY OR ASTHMA, WILL THE VACCINATOR ABLE TO MONITOR THE PATIENT FOR 30MINUTES?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NO HISTORY OF BLEEDING DISORDERS OR CURRENTLY TAKING ANTI-COAGULANTS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH BLEEDING HISTORY, IS GAUGE 23-25 SYRINGE AVAILABLE FOR INJECTION?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DOES NOT MANIFEST ANY OF THE FOLLOWING SYPMPTOMS: FEVER/CHILLS, HEADACHE, COUGH, COLDS,
                                SORE THROAT, MYALGA, FATIGUE, WEAKNESS, LOSS OF SMELL/TASTE, DIARRHEA, SHORTNESS IN BREATHING
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF MANIFESTING ANY OF THE MENTIONED SYMPTOM/S, SPECIFY ALL THAT APPLY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NO HISTORY OF EXPOSURE TO A CONFIRMED OR SUSPECTED COVID-19 CASE IN THE PAST 2 WEEKS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NOT BEEN PREVIOUSLY TREATED FOR COVID-19 IN THE PAST 90 DAYS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NOT RECEIVE ANY VACCINE IN THE PAST 2 WEEKS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                HAS NOT RECEIVE CONVALESCENT PLASMA OR MONOCLONAL ANTIBODIES FOR COVID-19 IN THE PAST 90 DAYS?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                NOT PREGNANT?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF PREGNANT, 2ND OR 3RD TRIMESTER?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DOES NOT HAVE ANY OF THE FOLLOWING: HIV, CANCER/MALIGNANCY, UNDERWENT TRANSPLANT,
                                UNDER STEROID MEDICATION/
                                TREATMENT, BED RIDDEN, TERMINAL ILLNESS, LESS THAN 6 MONTHS PROGNOSIS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH MENTIONED CONDITION/S, SPECIFY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                IF WITH MENTIONED CONDITION, HAS PRESENTED MEDICAL CLEARANCE PRIOR TO VACCINATION DAY?
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                DEFERRAL
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                REASON FOR DEFERRAL
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

                            function transformEmpty($string)
                            {
                                return $string==""?'N/A':$string;
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
                            <td class="pt-1 pb-1">{{ transformEmpty($vaccinated->person->suffix) }}</td>
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
                            <td class="pt-1 pb-1">{{ $vaccinated->if_deferral_specify ??'N/A' }}</td>
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
                        <tr>
                            <td colspan="46" class="text-secondary text-left"><strong>No records found</strong></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="mt-2">
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#export').click(function(){
            $("#vaccinationTable").table2excel({
                filename: "SL-VIMS VAS Export.xls"
            });
        })
    });
</script>
@endsection
