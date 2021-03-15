@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="border border-gray pt-4 pb-4 pl-5 pr-5 mt-5 rounded shadow-sm bg-white">
                        <center>
                            <h5 class="text-secondary text-p-info pt-2">System User Login</h5>
                        </center>

                        <form action="{{route('user.login')}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control mb-2" name="username" placeholder="Username" value="{{old('username')}}">
                                @error('username')
                                <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-2" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <select name="role" class="form-control" required>
                                    <option value="">Select role</option>
                                    <option value="{{App\Classes\Facades\User::SUPER_ADMIN}}">Super Admin</option>
                                    <option value="{{App\Classes\Facades\User::ADMIN}}">Admin</option>
                                    <option value="{{App\Classes\Facades\User::ENCODER}}">Encoder</option>
                                </select>
                            </div>
                       

                            <center>
                                <button class="btn btn-primary pb-2 mb-2 mt-1">Log in</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
