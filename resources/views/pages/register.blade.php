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
        @include('templates.form-heading-UI')
        <form action="{{ route('person.register') }}" method="post">
            @csrf
            @include('templates.registration-field')
        </form>
    </div>

@endsection