<nav class="navbar navbar-expand-lg navbar-light bg-light pb-3 shadow-sm">
    <div class="container{{ (Auth::user()->role==App\Classes\Facades\User::SUPER_ADMIN) ? '-fluid' : ''}}">
        <a class="navbar-brand text-primary" href="#">Southern Leyte - CVPS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-1" id="navbarText">
            <ul class="navbar-nav ml-auto">

                <!-- super admin nav menu -->
                @if(Auth::user()->role==App\Classes\Facades\User::SUPER_ADMIN)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.create') }}"><i data-feather="user-plus" class="pt-1 pb-1 mb-1"></i> New Admin</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search" class="pt-1 pb-1 mb-1"></i> View&nbsp;</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{route('admin.index')}}"><i data-feather="users" class="pt-1 pb-1"></i> Admin Lists</a>
                        <a class="dropdown-item text-secondary" href=""><i data-feather="file" class="pt-1 pb-1"></i> Reports</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.logout')}}"><i data-feather="log-out" class="pt-1 pb-1"></i> Signout</a>
                </li>
                @endif
                <!-- end super admin nav menu -->

                <!-- admin nav menu -->
                @if(Auth::user()->role==App\Classes\Facades\User::ADMIN)
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="plus" class="pt-0 pb-1"></i> Add&nbsp;</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{ route('vaccinator.create') }}"><i data-feather="user-plus" class="pt-1 pb-1"></i> Vaccinator</a>
                        <a class="dropdown-item text-secondary" href="{{ route('facility.create') }}"><i data-feather="home" class="pt-1 pb-1"></i> Facility</a>
                        <a class="dropdown-item text-secondary" href="{{ route('vaccine.create') }}"><i data-feather="briefcase" class="pt-1 pb-1"></i> Vaccine</a>
                        <a class="dropdown-item text-secondary mb-1" href="{{ route('encoder.create') }}"><i data-feather="user-plus" class="pt-1 pb-1"></i> Encoder</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search" class="pt-1 pb-1 mb-1"></i> View Lists&nbsp;</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{ route('vaccinator.index') }}"><i data-feather="users" class="pt-1 pb-1"></i> Vaccinators</a>
                        <a class="dropdown-item text-secondary" href="{{ route('facility.index') }}"><i data-feather="home" class="pt-1 pb-1"></i> Facilities</a>
                        <a class="dropdown-item text-secondary" href="{{ route('vaccine.index') }}"><i data-feather="briefcase" class="pt-1 pb-1"></i> Vaccines</a>
                        <a class="dropdown-item text-secondary mb-1" href="{{ route('encoder.index') }}"><i data-feather="users" class="pt-1 pb-1"></i> Encoders</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i data-feather="file" class="pt-1 pb-1 mb-1"></i> View Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.logout')}}"> <i data-feather="log-out" class="pt-1 pb-1"></i> Signout</a>
                </li>
                @endif
                <!-- end admin nav menu -->

                <!-- encoder nav menu -->
                @if(Auth::user()->role==App\Classes\Facades\User::ENCODER)
                <form class="form-inline pt-0 pb-0"style="position: relative; top: 5px;" method="get" action="{{route('search.pre-registered')}}">
                    <input class="form-control mr-sm-1 mb-1 mt-1" name="firstname" type="search" placeholder="First name" aria-label="First name">
                    <input class="form-control mr-sm-1 " type="search" name="lastname" placeholder="Last name" aria-label="Last name">
                    <button class="btn btn-primary my-2 my-sm-0 mr-2" type="submit" style="position: retlative; top: -2px;">
                    <i data-feather="search" class="pt-0 pb-1"></i>
                    Search</button>
                </form>
                <li class="nav-item">
                    <a class="btn btn-secondary text-white mt-2" href="{{route('user.logout')}}" style="position: relative; top: 1px;">
                    <i data-feather="log-out" class="pt-1 pb-1"></i>
                    Signout</a>
                </li>
                @endif
                <!-- end encoder nav menu -->
            </ul>
        </div>
    </div>
</nav>
