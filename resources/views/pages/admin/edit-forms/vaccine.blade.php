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

{{-- @if(Session::get('created') === false)
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
@endif --}}

<div class="container mt-5 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 text-center rounded shadow-sm bg-white">
                <div class="d-flex justify-content-center mt-2">
                    <i data-feather="edit-3" class="mt-2 text-primary"></i>
                    <h4 class="text-primary text-content-heading ml-2 mt-1"> Edit Vaccine</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded shadow-sm bg-white">
        
                <form action="{{ route('vaccine.update',$vaccine) }}" method="post" class="mt-2">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="municipality_id" value="{{ Auth::user()->municipality_id }}">
                    <div class="form-group">
                        <label class="text-secondary">Name of Vaccine <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="vaccine_name" value="{{ old('vaccine_name') ?? $vaccine->vaccine_name }}" required>
                        @error('vaccine_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Batch No <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="batch_number" value="{{ old('batch_number') ?? $vaccine->batch_number }}" required>
                        @error('batch_no')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Lot No <small class="text-gray">(optional)</small></label>
                        <input type="text" class="form-control mb-1" name="lot_number" value="{{ old('lot_number') ?? $vaccine->lot_number }}">
                        @error('lot_no')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Manufacturer <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="vaccine_manufacturer" value="{{ old('vaccine_manufacturer') ?? $vaccine->vaccine_manufacturer }}" required>
                        @error('manufacturer')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <center>
                        <button type="submit" class="btn btn-primary pb-2"><i data-feather="upload" class="pb-1 pt-1"></i> Update</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection