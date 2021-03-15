<nav class="navbar navbar-expand-lg navbar-light bg-light pb-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand text-primary" href="#">Southern Leyte - CVPS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-1" id="navbarText">
            <ul class="navbar-nav ml-auto">

                <!-- super admin nav menu -->
                @if($user == 'Super Admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.create') }}">Add Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.create') }}">Admin Lists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('superadmin.reports') }}">View Reports</a>
                </li>
                @endif
                <!-- end super admin nav menu -->

                <!-- admin nav menu -->
                @if($user == 'Admin')
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
                        <a class="dropdown-item text-secondary" href="{{ route('vaccinator.create') }}">Vaccinators</a>
                        <a class="dropdown-item text-secondary" href="{{ route('facility.create') }}">Facilities</a>
                        <a class="dropdown-item text-secondary" href="{{ route('vaccine.create') }}">Vaccines</a>
                        <a class="dropdown-item text-secondary mb-1" href="{{ route('encoder.create') }}">Encoders</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Reports</a>
                </li>
                @endif
                <!-- end admin nav menu -->

                <!-- encoder nav menu -->
                @if($user == 'Encoder')
                <li class="nav-item">
                    <a class="nav-link" href="#">New Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pre-registrations</a>
                </li>
                @endif
                <!-- end encoder nav menu -->

                <li class="nav-item">
                    <a class="nav-link" href="#">Signout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>