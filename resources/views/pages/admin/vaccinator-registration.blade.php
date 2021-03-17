@extends('layouts.main')

@include('templates.navigation')

@section('content')

@if(Session::get('created') === true)
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        icon: 'success',
        title: '{{ Session::get("title") }}',
        text: '{{ Session::get("text") }}',
        footer: ' '
    })
</script>
@endif

<div class="container mt-5 register">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 text-center rounded shadow-sm bg-white">
                <div class="d-flex justify-content-center mt-2">
                    <i data-feather="edit-3" class="mt-2 text-primary"></i>
                    <h4 class="text-primary text-content-heading ml-2 mt-1"> Add New Vaccinator</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded shadow-sm bg-white">
                <div class="d-flex justify-content-start mt-5">
                    <i data-feather="user" class="mt-1 text-secondary pt-1"></i>
                    <h5 class="text-secondary text-p-info ml-2 mt-1"> Basic Information</h5>
                </div>

                <form action="{{ route('vaccinator.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">First name <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="firstname" value="{{ old('firstname') }}" required>
                            @error('firstname')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Last name <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="lastname" value="{{ old('lastname') }}" required>
                            @error('lastname')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Middle name <small class="text-gray">(optional)</small></label>
                            <input type="text" class="form-control mb-1" name="middlename" value="{{ old('middlename') }}">
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Suffix <small class="text-gray">(optional)</small></label>
                            <input type="text" class="form-control mb-1" name="suffix" value="{{ old('suffix') }}">
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mt-5">
                        <i data-feather="user-plus" class="mt-1 text-secondary pt-1"></i>
                        <h5 class="text-secondary text-p-info ml-2 mt-1"> Additional Information</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Position <small class="text-danger">(required)</small></label>
                            <input type="text" name="position" class="form-control mb-1" required>
                            @error('position')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Role <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="role" value="{{ old('role') }}" required>
                            @error('role')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Facility <small class="text-danger">(required)</small></label>
                            <select name="facility_id" class="form-control mb-1" required>
                                <option value=""></option>
                                @forelse ($facilities as $facility)
                                    <option value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                                @empty

                                @endforelse
                            </select>
                            @error('facility')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">PRC No <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="prc" value="{{ old('prc') }}" required>
                            @error('prc')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="municipality_id" value="{{ Auth::user()->municipality_id }}">

                    <center class="mt-4">
                        <button type="submit" class="btn btn-primary pb-2"><i data-feather="upload" class="pb-1 pt-1"></i> Register</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
