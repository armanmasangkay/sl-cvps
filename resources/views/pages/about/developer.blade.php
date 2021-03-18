@extends('layouts.main')

@section('content')
<div class="container mt-4 about">
    <h4 class="text-center text-secondary mt-5 mb-5">SLSU-CCSIT DEVELOPMENT TEAM</h4>
    <div class="row pt-4">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm mb-3 pt-5 pb-5">
                <center>
                    <div class="img-wrapper border">
                        <img src="{{ asset('images/developer/armanmasangkay.jpg') }}" alt="Arman Masangkay">
                    </div>

                    <h5 class="text-secondary mt-4">Arman Masangkay</h5>
                </center>

                <label class="text-center mt-3">Programmer</label>
                <label class="text-center" style="visibility: hidden !important;">Project Leader</label>

                <center>
                    <div class="mt-5">
                        <i data-feather="facebook" class="m-1 pt-1 pb-1"></i>
                        <i data-feather="mail" class="pt-1 pb-1"></i>
                        <i data-feather="github" class="m-1 pt-1 pb-1"></i>
                        <i data-feather="trello" class="pt-1 pb-1"></i>
                        <!-- <i data-feather="twitter" class="m-1 pt-1 pb-1"></i> -->
                        <i data-feather="instagram" class="pt-1 pb-1"></i>
                        <i data-feather="linkedin" class="m-1 pt-1 pb-1"></i>
                    </div>
                </center>

                <small class="text-center text-gray mt-5">https://github.com/armanmasangkay</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm mb-3 pt-5 pb-5">
                <center>
                    <div class="img-wrapper border">
                        <img src="{{ asset('images/developer/nobeginmasob.jpg') }}" alt="Benigno Ambus">
                    </div>

                    <h5 class="text-secondary mt-4">Benigno E. Ambus</h5>
                </center>

                <label class="text-center mt-3">UI/UX Designer</label>
                <label class="text-center">Programmer</label>

                <center>
                    <div class="mt-5">
                        <i data-feather="facebook" class="m-1 pt-1 pb-1"></i>
                        <i data-feather="mail" class="pt-1 pb-1"></i>
                        <i data-feather="github" class="m-1 pt-1 pb-1"></i>
                        <i data-feather="trello" class="pt-1 pb-1"></i>
                        <!-- <i data-feather="twitter" class="m-1 pt-1 pb-1"></i> -->
                        <i data-feather="instagram" class="pt-1 pb-1"></i>
                        <i data-feather="linkedin" class="m-1 pt-1 pb-1"></i>
                    </div>
                </center>

                <small class="text-center text-gray mt-5">https://github.com/darksidebug</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm mb-3 pt-5 pb-5">
                <center>
                    <div class="img-wrapper border">
                        <img src="{{ asset('images/developer/juneviccadayona.jpg') }}" alt="June Vic Cadayona">
                    </div>

                    <h5 class="text-secondary mt-4">June Vic W. Cadayona</h5>
                </center>

                <label class="text-center mt-3">Programmer</label>
                <label class="text-center" style="visibility: hidden !important;">Webhost Trustee</label>

                <center>
                    <div class="mt-5">
                        <i data-feather="facebook" class="m-1 pt-1 pb-1"></i>
                        <i data-feather="mail" class="pt-1 pb-1"></i>
                        <i data-feather="github" class="m-1 pt-1 pb-1"></i>
                        <i data-feather="trello" class="pt-1 pb-1"></i>
                        <!-- <i data-feather="twitter" class="m-1 pt-1 pb-1"></i> -->
                        <i data-feather="instagram" class="pt-1 pb-1"></i>
                        <i data-feather="linkedin" class="m-1 pt-1 pb-1"></i>
                    </div>
                </center>

                <small class="text-center text-gray mt-5">https://github.com/miyunecadz</label>
            </div>
        </div>
    </div>
</div>
@endsection