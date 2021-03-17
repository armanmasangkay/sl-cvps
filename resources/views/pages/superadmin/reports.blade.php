@extends('layouts.main')

@section('title', 'Reports')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <h5 class="text-muted text-center mb-4 text-heading">List of Vaccinators</h5>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0" style="min-width: 1300px !important;">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="align-left" class="pb-1 mr-1 text-primary"></i>
                                CATEGORY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="credit_card" class="pb-1 mr-1 text-primary"></i>
                                CATEGORY ID
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user-check" class="pb-1 mr-1 text-primary"></i>
                                CATEGORY ID NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="credit-card" class="pb-1 mr-1 text-primary"></i>
                                PHILHEALTH ID
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="credit-card" class="pb-1 mr-1 text-primary"></i>
                                PWD ID
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                LAST NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                FIRST NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                MIDDLE NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                SUFFIX
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="phone-incoming" class="pb-1 mr-1 text-primary"></i>
                                CONTACT NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="map" class="pb-1 mr-1 text-primary"></i>
                                REGION
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="navigation" class="pb-1 mr-1 text-primary"></i>
                                PROVINCE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="home" class="pb-1 mr-1 text-primary"></i>
                                MUNICIPALITY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="map-pin" class="pb-1 mr-1 text-primary"></i>
                                BARANGAY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="git-commit" class="pb-1 mr-1 text-primary"></i>
                                SEX
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="calendar" class="pb-1 mr-1 text-primary"></i>
                                BIRTHDATE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user-check" class="pb-1 mr-1 text-primary"></i>
                                CONSENT
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user-x" class="pb-1 mr-1 text-primary"></i>
                                REASON FOR REFUSAL
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="check-circle" class="pb-1 mr-1 text-primary"></i>
                                AGE MORE THAN 16 YRS OLD
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NO ALLERGIES TO PEG OR POLYSORBATE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NO SEVERE ALLERGIC REACTION AFTER THE FIRST DOSE OF THE VACCINE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NO ALLERGY TO FOOD, EGG, MEDICINES, AND NO ASTHMA
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="check-circle" class="pb-1 mr-1 text-primary"></i>
                                IF WITH ALLERGY OR ASTHMA, WILL THE VACCINATOR ABLE TO MONITOR THE PATIENT FOR 30MINUTES
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NO HISTORY OF BLEEDING DISORDERS OR CURRENTLY TAKING ANTI-COAGULANTS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="check-circle" class="pb-1 mr-1 text-primary"></i>
                                IF WITH BLEEDING HISTORY, IS GAUGE 23-25 SYRINGE AVAILABLE FOR INJECTION
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                DOES NOT MANIFEST ANY OF THE FOLLOWING SYPMPTOMS: FEVER/CHILLS, HEADACHE, COUGH, COLDS,
                                SORE THROAT, MYALGA, FATIGUE, WEAKNESS, LOSS OF SMELL/TASTE, DIARRHEA, SHORTNESS IN BREATHING
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="check-circle" class="pb-1 mr-1 text-primary"></i>
                                IF MANIFESTING ANY OF THE MENTIONED SYMPTOM/S, SPECIFY ALL THAT APPLY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NO HISTORY OF EXPOSURE TO A CONFIRMED OR SUSPECTED COVID-19 CASE IN THE PAST 2 WEEKS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NOT BEEN PREVIOUSLY TREATED FOR COVID-19 IN THE PAST 90 DAYS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NOT RECEIVE ANY VACCINE IN THE PAST 2 WEEKS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="alert-circle" class="pb-1 mr-1 text-primary"></i>
                                HAS NOT RECEIVE CONVALESCENT
                            </td>
                            <td class="border-bottom-0 border-top-0" colspan="2">
                                <i data-feather="edit-3" class="pb-1 mr-1 text-primary"></i>
                                ACTIONS
                            </td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        @forelse ($vaccinators as $vaccinator)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{ $vaccinator->fullname() }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->position }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->role }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->facility->facility_name }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->prc }}</td>
                                <td class="pt-2 pb-0" colspan="2">
                                    <div class="d-flex justify-content-start">
                                        <!-- <a href="" class="btn btn-sm btn-warning">Edit</a> -->
                                        <form action="{{ route('vaccinator.destroy', $vaccinator->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure? Deleting this vaccinator will remove all transaction associated to this information.')" class="btn btn-sm btn-danger ml-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-bottom-1">
                                <td colspan="11" class="text-center text-gray">No record found</td>
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

@endsection