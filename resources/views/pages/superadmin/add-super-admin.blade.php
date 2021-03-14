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
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 rounded">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Admin User Registration</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded">
                <small class="text-secondary text-p-info pt-2">Basic Information</small>

                <form action="{{ route('admin.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label class="text-secondary">Lastname <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Firstname <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
                        <select name="municipality" class="form-control" required>
                            <option value=""></option>
                        </select>
                        @error('municipality')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>

                    <small class="text-secondary text-p-info pt-2">User Account</small>
                    <div class="form-group pt-1">
                        <label class="text-secondary">Username <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1"name="username" value="{{ old('username') }}" required>
                        @error('username')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Password <small class="text-danger">(required)</small></label>
                        <input type="password" class="form-control mb-1" name="password" value="{{ old('password') }}" required>
                        @error('password')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <label class="text-secondary">Confirm Password <small class="text-danger">(required)</small></label>
                        <input type="password" class="form-control mb-1" name="confirm_password" value="{{ old('confirm_password') }}" required>
                        @error('confirm_password')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <center>
                        <button type="submit" name="submit" class="btn btn-primary pb-2">Register</button>
                        <button class="btn btn-secondary pb-2">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection