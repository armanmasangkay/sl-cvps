@extends('layouts.main')

@include('templates.navigation')

@section('content')
<div class="container mt-3 register">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 rounded">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Vaccination Facilities Registration</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded">
                <small class="text-secondary text-p-info pt-2">Basic Facility Information</small>

                <form action="" method="post" class="mt-2">
                    <div class="form-group">
                        <label class="text-secondary">Facility Name <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control mb-1">

                        <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
                        <select name="" class="form-control mb-1">
                            <option value=""></option>
                        </select>
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