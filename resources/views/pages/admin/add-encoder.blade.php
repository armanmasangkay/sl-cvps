@extends('layouts.main')

@include('templates.navigation')

@section('content')
<div class="container mt-3 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 rounded">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Encoder Registration</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded">
                <small class="text-secondary text-p-info pt-2">Basic Information</small>

                <form action="" method="post" class="mt-2">
                    <div class="form-group">
                        <label class="text-secondary">Firstname <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="firstname">

                        <label class="text-secondary">Mirstname <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="middlename">

                        <label class="text-secondary">Lastname <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="lastname">

                        <label class="text-secondary">Suffix <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1" name="suffix">

                        <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
                        <select name="" class="form-control mb-1">
                            <option value=""></option>
                        </select>

                        <label class="text-secondary">Facility <small class="text-danger">(required)</small></label>
                        <select name="" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>

                    <small class="text-secondary text-p-info pt-2">User Account</small>
                    <div class="form-group pt-1">
                        <label class="text-secondary">Username <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1">

                        <label class="text-secondary">Password <small class="text-danger">(required)</small></label>
                        <input type="password" class="form-control mb-1">

                        <label class="text-secondary">Confirm Password <small class="text-danger">(required)</small></label>
                        <input type="password" class="form-control mb-1">
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