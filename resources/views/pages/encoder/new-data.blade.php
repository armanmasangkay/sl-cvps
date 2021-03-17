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

<div class="container mt-5 register">   
    @include('templates.form-heading-UI')

    <div class="row">
        <div class="col-md-12">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded bg-white shadow-sm">
                <div class="d-flex justify-content-start mt-3">
                    <i data-feather="clipboard" class="mt-1 text-primary"></i>
                    <h4 class="text-primary text-content-heading ml-2"> New Vaccination Information</h4>
                </div>
                
                <form action="" method="post" class="mt-4">
                    @csrf
                    <div class="d-flex justify-content-start mt-5">
                        <i data-feather="user" class="mt-1 text-secondary pt-1"></i>
                        <h5 class="text-secondary text-p-info ml-2 mt-1"> Basic Information</h5>
                    </div>
                    @include('pages.encoder.new-data.basic-info')
                    
                    <div class="d-flex justify-content-start mt-3">
                        <i data-feather="book-open" class="mt-1 text-secondary pt-1"></i>
                        <h5 class="text-secondary text-p-info ml-2 mt-1"> Counseling Section</h5>
                    </div>
                    @include('pages.encoder.new-data.counseling')

                    <div class="d-flex justify-content-start mt-3">
                        <i data-feather="bookmark" class="mt-1 text-secondary pt-1"></i>
                        <h5 class="text-secondary text-p-info ml-2 mt-1"> Screening Section Information</h5>
                    </div>
                    @include('pages.encoder.new-data.screening')

                    <div class="d-flex justify-content-start mt-5">
                        <i data-feather="calendar" class="mt-1 text-secondary pt-1"></i>
                        <h5 class="text-secondary text-p-info ml-2 mt-1"> Vaccination Details</h5>
                    </div>
                    @include('pages.encoder.new-data.vaccination-details')

                    <div class="mt-5 mb-2">
                        <button type="submit" class="btn btn-primary pb-2"> <i data-feather="upload" class="pb-1 pt-1"></i> Save New Data</button>
                        <a href="" class="btn btn-secondary pb-2"><i data-feather="chevron-left" class="pb-1 pt-1"></i> Back &nbsp;</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection