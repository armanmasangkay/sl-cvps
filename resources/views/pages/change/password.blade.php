@extends('layouts.main')

@section('content')

<div class="container mt-0">
    <div class="row mt-0 pt-0">
        <div class="col-md-6 offset-md-3 mt-3">
            @include('templates.form-heading-UI')

            <div class="border border-gray pt-4 pb-4 pl-5 pr-5 mt-3 rounded shadow-sm bg-white">
                <div class="d-flex justify-content-center mt-2">
                    <i data-feather="edit-3" class="mt-1 pt-1 mb-1 text-secondary"></i>
                    <h5 class="text-secondary text-content-heading ml-2 mt-1"> Change User Password</h5>
                </div>

                <form action="{{route('change-password.store')}}" method="post" class="mt-3">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="mb-2">
                        <span class="text-secondary"><i data-feather="key" class="pt-1 pb-1 mb-1"></i> Password</span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <span class="text-secondary"><i data-feather="key" class="pt-1 pb-1 mb-1"></i> Confirm Password</span>
                        <input type="password" class="form-control mb-2" name="confirm_password" placeholder="Password">
                    </div>
            
                    <center>
                        <button class="btn btn-primary pb-2 mb-2 mt-4"><i data-feather="edit" class="pb-1 pt-1"></i>Update&nbsp;</button>
                        <a href="{{ route('check-route.index') }}" class="btn btn-secondary pb-2 mb-2 mt-4"><i data-feather="chevron-left" class="pb-1 pt-1"></i>Back&nbsp;</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

@if(Session::get('updated') === true)
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

@if(Session::get('matched') === false || Session::get('updated') === false)
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
    }).then(res => {
        if(res.isConfirmed){
            window.location.reload()
        }
    })
</script>
@endif
@endsection
