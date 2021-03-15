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
@if(Session::get('registered') === false)
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
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 text-center rounded bg-white shadow-sm">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Encoder Registration</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded bg-white shadow-sm">
                <h5 class="text-secondary text-p-info pt-2">Basic Information</h5>

                <form action="{{ route('encoder.store') }}" method="post" class="mt-2">
                    @csrf
                    <input type="hidden" name="municipality_id" value="{{ Auth::user()->municipality_id }}">
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">First name <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                        @error('first_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Last name <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
               
                    <div class="row mb-2">
                        {{--<div class="col-md-12">
                            <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
                            <select name="municipality" class="form-control mb-1" required>
                                <option value=""></option>
                                @foreach($municipalities as $municipality)
                                <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                                @endforeach
                            </select>
                            @error('municipality_id')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        {{-- <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Facility <small class="text-danger">(required)</small></label>
                            <select name="facility" class="form-control" required>
                                <option value="1"></option>
                            </select>
                            @error('facility')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>

                    <h5 class="text-secondary text-p-info mt-3">User Account</h5>
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <label class="text-secondary">Username <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4 px-md-1">
                            <label class="text-secondary">Password <small class="text-danger">(required)</small></label>
                            <input type="password" class="form-control mb-1" name="password" required>
                            @error('password')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <label class="text-secondary">Confirm Password <small class="text-danger">(required)</small></label>
                            <input type="password" class="form-control mb-1" name="confirm" required>
                            @error('confirm')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <center class="mt-4">
                        <button type="submit" class="btn btn-primary pb-2">Register</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection