@extends('layouts.main')

@include('templates.navigation')

@section('content')
<div class="container mt-3">
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

                <form action="" method="post" class="mt-2">
                    <div class="form-group">
                        <input type="text" class="form-control mb-1" placeholder="Firstname">
                        <input type="text" class="form-control mb-1" placeholder="Lastname">
                        <select name="" class="form-control">
                            <option value="">Select municipality</option>
                        </select>
                    </div>

                    <small class="text-secondary text-p-info pt-2">User Account</small>
                    <div class="form-group pt-1">
                        <input type="text" class="form-control mb-1" placeholder="Username">
                        <input type="password" class="form-control mb-1" placeholder="Password">
                        <input type="password" class="form-control mb-1" placeholder="Confirm Password">
                    </div>
                    
                    <center>
                        <button class="btn btn-primary pb-2">Register</button>
                        <button class="btn btn-secondary pb-2">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection