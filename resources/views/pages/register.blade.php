@extends('layouts.main')

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

    <div class="container-fluid pt-4 registration-heading">
        <div class="container border border-gray pt-3 pb-3 pl-4 pr-4 mt-3 rounded shadow-sm logo-wrapper">
            <div class="d-flex justify-content-start pb-md-2">
                <img src="{{ asset('images/icons/province') }}" alt="" width="65" height="65" class="mr-1">
                <img src="{{ asset('images/icons/doh.png') }}" alt="" width="63" height="62" style="margin-top: 1px;">
                <h4 class="text-primary mt-1 pt-lg-3 pt-md-3 pt-sm-3 text-content-heading pl-2">COVID-19 Vaccination Passport</h4>
            </div>
        </div>
        <form action="{{ route('person.register') }}" method="post">
            @csrf
            @include('templates.registration-field')
        </form>
    </div>

@endsection