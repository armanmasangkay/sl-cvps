@extends('layouts.main')

@include('templates.navigation')

@section('content')

@if(session('success') === true)
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
        title: 'Great!',
        text: '{{session('message')}}',
        footer: ' '
    })
</script>
@endif

<div class="container mt-5 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 rounded text-center shadow-sm bg-white">
                <div class="d-flex justify-content-center mt-2">
                    <i data-feather="edit-3" class="mt-2 text-primary"></i>
                    <h4 class="text-primary text-content-heading ml-2 mt-1">Edit Facility</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded shadow-sm bg-white">

                <form action="{{ route('facility.update',$facility) }}" method="post" class="mt-2">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label class="text-secondary">Facility Name <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="facility_name" value="{{old('facility_name') ?? $facility->facility_name }}">
                        @error('facility_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <input type="hidden" name="municipality_id" value="{{ Auth::user()->municipality_id }}">
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
