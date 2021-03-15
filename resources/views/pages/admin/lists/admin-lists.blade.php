@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="table-responsive">
                <table class="table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>FIRST NAME</td>
                            <td>LAST NAME</td>
                            <td>USERNAME</td>
                            <td>MUNICIPALITY</td>
                            <td>ACTIONS</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>      
</div>

@endsection