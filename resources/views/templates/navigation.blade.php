<nav class="navbar navbar-expand-lg navbar-light bg-light pb-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand text-primary" href="#">Southern Leyte - CVPS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-1" id="navbarText">
            <ul class="navbar-nav ml-auto">

                <!-- super admin nav menu -->
                @if(Auth::user()->role==App\Classes\Facades\User::SUPER_ADMIN)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.create') }}">New Admin</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View&nbsp;</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{route('admin.index')}}">Admin Lists</a>
                        <a class="dropdown-item text-secondary" href="">Reports</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.logout')}}">Signout</a>
                </li>
                @endif
                <!-- end super admin nav menu -->

                <!-- admin nav menu -->
                @if(Auth::user()->role==App\Classes\Facades\User::ADMIN)
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add&nbsp;</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{ route('vaccinator.create') }}">Vaccinator</a>
                        <a class="dropdown-item text-secondary" href="{{ route('facility.create') }}">Facility</a>
                        <a class="dropdown-item text-secondary" href="{{ route('vaccine.create') }}">Vaccine</a>
                        <a class="dropdown-item text-secondary mb-1" href="{{ route('encoder.create') }}">Encoder</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Lists&nbsp;</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{ route('vaccinator.index') }}">Vaccinators</a>
                        <a class="dropdown-item text-secondary" href="{{ route('facility.index') }}">Facilities</a>
                        <a class="dropdown-item text-secondary" href="{{ route('vaccine.index') }}">Vaccines</a>
                        <a class="dropdown-item text-secondary mb-1" href="{{ route('encoder.index') }}">Encoders</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.logout')}}">Signout</a>
                </li>
                @endif
                <!-- end admin nav menu -->

                <!-- encoder nav menu -->
                @if(Auth::user()->role==App\Classes\Facades\User::ENCODER)
                <form class="form-inline pt-0 pb-0"style="position: relative; top: 5px;" method="get" action="{{route('search.pre-registered')}}">
        
                    <input class="form-control mr-sm-1 mb-1 mt-1" name="firstname" type="search" placeholder="First name" aria-label="First name">
                    <input class="form-control mr-sm-1 " type="search" name="lastname" placeholder="Last name" aria-label="Last name">
                    <button class="btn btn-primary my-2 my-sm-0 mr-2" type="submit" style="position: retlative; top: -2px;">Search</button>
                </form>
                <li class="nav-item">
                    <a class="btn btn-secondary text-white mt-2" href="{{route('user.logout')}}" style="position: relative; top: 1px;">Signout</a>
                </li>
                @endif
                <!-- end encoder nav menu -->
            </ul>
        </div>
    </div>
</nav>
