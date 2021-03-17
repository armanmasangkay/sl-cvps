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


<div class="container mt-5 register">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 text-center rounded bg-white shadow-sm">
                <div class="d-flex justify-content-center mt-2">
                    <i data-feather="edit-3" class="mt-2 text-primary"></i>
                    <h4 class="text-primary text-content-heading ml-2 mt-1"> Edit Encoder</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded bg-white shadow-sm">
                <div class="d-flex justify-content-start mt-5">
                    <i data-feather="user" class="mt-1 text-secondary pt-1"></i>
                    <h5 class="text-secondary text-p-info ml-2 mt-1"> Basic Information</h5>
                </div>

                <form action="{{ route('encoder.update',$encoder) }}" method="post" class="mt-2">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="municipality_id" value="{{ Auth::user()->municipality_id }}">
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">First name <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="first_name" value="{{ old('first_name') ?? $encoder->first_name  }}" required>
                        </div>
                        @error('first_name')
                        <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                        @enderror

                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Last name <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="last_name" value="{{ old('last_name') ?? $encoder->last_name }}" required>
                            @error('last_name')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
            
                    
                    <center class="mt-4">
                        <button type="submit" class="btn btn-primary pb-2"><i data-feather="upload" class="pb-1 pt-1"></i> Update</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection