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

@if(Session::get('created') === false)
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        icon: 'warning',
        title: '{{ Session::get("title") }}',
        text: '{{ Session::get("text") }}',
        footer: ' '
    })
</script>
@endif

<div class="container mt-5 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 text-center rounded shadow-sm bg-white">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Add New Vaccines</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded shadow-sm bg-white">
                <h5 class="text-secondary text-p-info pt-2">Basic Vaccines Information</h5>

                <form action="{{ route('vaccine.store') }}" method="post" class="mt-2">
                    @csrf
                    <input type="hidden" name="municipality_id" value="{{ Auth::user()->municipality_id }}">
                    <div class="form-group">
                        <label class="text-secondary">Name of Vaccine <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="vaccine_name" value="{{ old('vaccine_name') }}" required>
                        @error('vaccine_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Batch No <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="batch_number" value="{{ old('batch_number') }}" required>
                        @error('batch_no')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Lot No <small class="text-gray">(optional)</small></label>
                        <input type="text" class="form-control mb-1" name="lot_number" value="{{ old('lot_number') }}">
                        @error('lot_no')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Manufacturer <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="vaccine_manufacturer" value="{{ old('vaccine_manufacturer') }}" required>
                        @error('manufacturer')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <center>
                        <button type="submit" class="btn btn-primary pb-2">Add</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection