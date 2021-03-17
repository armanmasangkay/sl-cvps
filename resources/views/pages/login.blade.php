@extends('layouts.main')

@section('content')
    
    <div class="container mt-0">
        <div class="row mt-0 pt-0">
            <div class="col-md-6 offset-md-3 mt-3">
                @include('templates.form-heading-UI')

                <div class="border border-gray pt-4 pb-4 pl-5 pr-5 mt-3 rounded shadow-sm bg-white">
                    <div class="d-flex justify-content-center mt-2">
                        <i data-feather="edit-3" class="mt-1 pt-1 mb-1 text-secondary"></i>
                        <h5 class="text-secondary text-content-heading ml-2 mt-1"> System User Login</h5>
                    </div>

                    <form action="{{route('user.login')}}" method="post" class="mt-3">
                        @csrf
                        <div>
                            <span class="text-secondary"><i data-feather="user" class="pt-1 pb-1 mb-1"></i> Username</span>
                            <input type="text" class="form-control mb-2" name="username" placeholder="Username" value="{{old('username')}}">
                            @error('username')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <span class="text-secondary"><i data-feather="key" class="pt-1 pb-1 mb-1"></i> Password</span>
                            <input type="password" class="form-control mb-2" name="password" placeholder="Password">
                        </div>

                        <div>
                            <span class="text-secondary"><i data-feather="user-plus" class="pt-1 pb-1 mb-1"></i> User Role</span>
                            <select name="role" class="form-control" required>
                                <option value="">Select role</option>
                                <option value="{{App\Classes\Facades\User::SUPER_ADMIN}}">Super Admin</option>
                                <option value="{{App\Classes\Facades\User::ADMIN}}">Admin</option>
                                <option value="{{App\Classes\Facades\User::ENCODER}}">Encoder</option>
                            </select>
                        </div>
                
                        <center>
                            <button class="btn btn-primary pb-2 mb-2 mt-4"><i data-feather="unlock" class="pb-1 pt-1"></i> Log in</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
