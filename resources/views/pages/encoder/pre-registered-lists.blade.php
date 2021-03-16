@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <h5 class="text-muted text-center mb-4 text-heading">List of Pre-Registered Individuals</h5>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">SL NO</td>
                            <td class="border-bottom-0 border-top-0">FULL NAME</td>
                            <td class="border-bottom-0 border-top-0">ADDRESS</td>
                            <td class="border-bottom-0 border-top-0">BIRTH DATE</td>
                            <td class="border-bottom-0 border-top-0" colspan="2">ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">1</td>
                                <td class="pt-2 pb-0"></td>
                                <td class="pt-2 pb-0"></td>
                                <td class="pt-2 pb-0"></td>
                                <td class="pt-2 pb-2" colspan="2">
                                    <div class="d-flex justify-content-start">
                                        <!-- <a href="" class="btn btn-sm btn-warning">Edit</a> -->
                                        <button type="button" class="btn btn-primary ml-1 pt-0 pb-0 btn-scan"  data-toggle="modal" data-target="#exampleModal">Scan QR</button>
                                    </div>
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title text-secondary">Scan QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <center>
                            <img src="{{ asset('images/qr_code.png') }}" alt="" class="qr_image">
                        </center>
                    </div>
                </div>

                <center>
                    <h6 class="text-secondary text-p-info text-click-img">Click QR Image to Scan</h6>
                </center>
                <div class="row mt-3">
                    <div class="col-sm-6 offset-sm-3 col-xs-6 offset-xs-3 pl-4 pr-4">
                        <input type="text" class="form-control" placeholder="Enter QR Code">
                    </div>
                </div>

                <center>
                    <button type="button" class="btn btn-primary mt-2">Add QR</button>
                </center>

            </div>
            <div class="modal-footer border-top-0">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Verify QR</button> -->
            </div>
        </div>
    </div>
</div>

@endsection
