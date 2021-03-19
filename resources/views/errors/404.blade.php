@extends('layouts.main')

@section('content')
<div class="container-fluid px-4 pt-4">
    <div class="container bg-white pt-4 pb-4 mt-4 px-4 shadow-sm rounded">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-secondary text-center error">404</h1>
                <h4 class="text-danger text-center error-msg pb-4 pt-2">Request Error | Page not found!</h4>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 pl-5 pr-5">
                <h5 class="text-center text-secondary body-msg">The page you have requested cannot be load. Please return back to the home page.</h5>
                <center>
                    <button class="btn btn-primary mt-4"><i data-feather="chevron-left" class="pt-1 pb-1" style="margin-bottom: 2px;"></i> Return Back&nbsp;</button>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection