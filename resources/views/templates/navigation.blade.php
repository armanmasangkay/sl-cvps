<nav class="navbar navbar-expand-lg navbar-light bg-light pb-3">
    <div class="container">
        <a class="navbar-brand text-primary" href="#">SL - Covid-19 Vaccination Passport</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-1" id="navbarText">
            <ul class="navbar-nav ml-auto">

                <!-- super admin nav menu -->
                @if($user == 'Super Admin')
                <li class="nav-item">
                    <a class="nav-link" href="#">Add Amin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('superadmin.reports') }}">View Reports</a>
                </li>
                @endif
                <!-- end super admin nav menu -->

                <!-- admin nav menu -->
                @if($user == 'Admin')
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add</a>
                    <div class="dropdown-menu pl-1 pr-1" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Vaccinator</a>
                        <a class="dropdown-item" href="#">Facility</a>
                        <a class="dropdown-item" href="#">Vaccine</a>
                        <a class="dropdown-item mb-1" href="#">Encoder</a>
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