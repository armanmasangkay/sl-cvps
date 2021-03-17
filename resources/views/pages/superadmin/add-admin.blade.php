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
@if(Session::get('matched') === false || Session::get('found') === true)
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

<div class="container mt-3 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 text-center rounded shadow-sm bg-white">
                <div class="d-flex justify-content-center mt-2">
                    <i data-feather="edit-3" class="mt-2 text-primary"></i>
                    <h4 class="text-primary text-content-heading ml-2 mt-1"> Admin User Registration</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded shadow-sm bg-white">
                <div class="d-flex justify-content-start mt-5">
                    <i data-feather="user" class="mt-1 text-secondary pt-1"></i>
                    <h5 class="text-secondary text-p-info ml-2 mt-1"> Basic Information</h5>
                </div>

                <form action="{{ route('admin.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label class="text-secondary">First name <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-secondary">Last name <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
                        <select name="municipality" class="form-control" required>
                            <option value=""></option>
                            @foreach($municipalities as $municipality)
                            <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                            @endforeach
                        </select>
                        @error('municipality')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-start mt-5">
                        <i data-feather="lock" class="mt-1 text-secondary pt-1"></i>
                        <h5 class="text-secondary text-p-info ml-2 mt-1"> User Account</h5>
                    </div>
                    <div class="form-group pt-1">
                        <label class="text-secondary">Username <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1"name="username" value="{{ old('username') }}" required>
                        @error('username')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group pt-1">
                        <label class="text-secondary">Password <small class="text-danger">(required)</small></label>
                        <input type="password" class="form-control mb-1" name="password" value="{{ old('password') }}" required>
                        @error('password')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group pt-1">
                        <label class="text-secondary">Confirm Password <small class="text-danger">(required)</small></label>
                        <input type="password" class="form-control mb-1" name="confirm_password" value="{{ old('confirm_password') }}" required>
                        @error('confirm_password')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>


                    <center>
                        <button type="submit" name="submit" class="btn btn-primary pb-2"><i data-feather="upload" class="pb-1 pt-1"></i> Register</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
