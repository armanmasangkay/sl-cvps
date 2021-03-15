@extends('layouts.main')

@include('templates.navigation')

@section('content')

@if(Session::get('registered') === true)
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

<div class="container mt-3 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 rounded text-center">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Vaccination Facilities Registration</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded">
                <small class="text-secondary text-p-info pt-2">Basic Facility Information</small>

                <form action="{{ route('facility.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label class="text-secondary">Facility Name <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="facility_name" value="{{ old('facility') }}" required>
                        @error('facility_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
                        <select name="municipality" class="form-control mb-1" required>
                            @foreach ($municipalities as $municipality)
                                <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                            @endforeach
                        </select>
                        @error('municipality')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <center>
                        <button type="submit" class="btn btn-primary pb-2">Register</button>
                        <a href="" class="btn btn-secondary pb-2">Cancel</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection