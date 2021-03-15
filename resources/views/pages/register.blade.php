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

    <div class="container-fluid pt-4">
        <div class="container border border-gray pt-3 pb-3 pl-4 pr-4 mt-3 rounded">
            <h4 class="text-primary mt-1 pt-1 text-content-heading">COVID-19 Vaccination Passport</h4>
        </div>
        <form action="{{ route('person.register') }}" method="post">
            @csrf
            @include('templates.registration-field')
        </form>
    </div>

    @include('templates.collaboration')

@endsection