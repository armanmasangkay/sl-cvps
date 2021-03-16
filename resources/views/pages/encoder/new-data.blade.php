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
                <h4 class="text-primary mt-2 pt-1 text-content-heading">New Vaccination Information</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded bg-white shadow-sm">

                <form action="" method="post" class="mt-2">
                    @csrf
                    <h5 class="text-secondary text-p-info pt-2">Basic Information</h5>
                    
                    
                    <center class="mt-4">
                        <button type="submit" class="btn btn-primary pb-2">Register</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection