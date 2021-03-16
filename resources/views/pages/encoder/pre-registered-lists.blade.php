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
                            <td class="border-bottom-0 border-top-0">FULL NAME</td>
                            <td class="border-bottom-0 border-top-0">ADDRESS</td>
                            <td class="border-bottom-0 border-top-0">BIRTH DATE</td>
                            <td class="border-bottom-0 border-top-0" colspan="2">ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        @forelse ($persons as $person)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{ $person->fullnameFormal() }}</td>
                                <td class="pt-2 pb-0">{{ $person->address() }}</td>
                                <td class="pt-2 pb-0">{{ $person->birth_date }}</td>
                                <td class="pt-2 pb-2" colspan="2">
                                    @if ($person->hasQrCode())

                                    @else
                                        <div class="d-flex justify-content-start">
                                            <!-- <a href="" class="btn btn-sm btn-warning">Edit</a> -->
                                            <button type="button" class="btn btn-primary ml-1 pt-0 pb-0 btn-scan" data-id="id1"  data-toggle="modal" data-target="#exampleModal">Scan QR</button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty

                        @endforelse


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
                <div class="row p-2">
                    <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                        <center>
                            <div class="p-1 shadow-sm border rounded qr_image">
                                <img src="{{ asset('images/qr_code.png') }}" alt="QR CODE IMAGE" id="btn-scan-qr" width="200">
                            </div>
                        </center>


                    </div>
                    <div class="col-md-10 offset-md-1 p-2 rounded canvas-wrapper" id="canvas-wrapper">
                        <canvas hidden="" id="qr-canvas" style="width: inherit !important;"></canvas>
                    </div>
                </div>

                <center>
                    <h6 class="text-secondary text-p-info text-click-img" id="text-click-img">Click QR Image to Scan</h6>
                    <h6 class="text-secondary text-p-info mt-2" id="text-stop-scan" style="display: none;">Click here to Stop Scanning</h6>
                </center>

                <form action="" method="post" id="qrForm">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-sm-6 offset-sm-3 col-xs-6 offset-xs-3 pl-4 pr-4">
                            <input type="text" class="form-control pt-4 pb-4" placeholder="Enter QR Code" id="qrcode">
                        </div>
                    </div>

                    <center>
                        <button type="button" class="btn btn-primary mt-2 pt-2 pb-2" id="verifyButton">Add QR</button>
                    </center>
                </form>
            </div>
            <div class="modal-footer border-top-0">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Verify QR</button> -->
            </div>
        </div>
    </div>
</div>

@endsection


@section('custom_js')
<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

<script>
    const qrcode1 = window.qrcode;
    const video = document.createElement("video");
    const canvasElement = document.getElementById("qr-canvas");
    const canvas = canvasElement.getContext("2d");
    const qrcodes = document.getElementById("qrcode");
    const outputData = document.getElementById("outputData");
    const btnScanQR = document.getElementById("btn-scan-qr");
    const stopScan = document.getElementById('text-stop-scan');
    let scanning = false;

    qrcode1.callback = res => {
        if (res) {
            qrcodes.value = res;
            console.log(res)
            let bodyData = {
                "qrcode": res
            }
            scanning = false;
            video.srcObject.getTracks().forEach(track => {
                track.stop();
            });

            canvasElement.hidden = true;
            btnScanQR.hidden = false;
            $('.qr_image').addClass('border shadow-sm')
            document.getElementById('text-click-img').innerHTML = 'Click QR Image to Scan'
            document.getElementById('text-click-img').style.display = 'block'
            stopScan.style.display = 'none'
            $('#canvas-wrapper').removeClass('border')
        }
    };

    btnScanQR.onclick = () => {

        document.getElementById('text-click-img').innerHTML = 'Openning camera ....'

        navigator.mediaDevices
            .getUserMedia({
                video: {
                    facingMode: "environment"
                }
            })
            .then(function (stream) {
                scanning = true;
                canvasElement.hidden = false;
                btnScanQR.hidden = true;
                document.getElementById('text-click-img').style.display = 'none'
                stopScan.style.display = 'block'

                video.setAttribute(
                    "playsinline", true
                );
                video.srcObject = stream;
                video.play();

                tick();
                $('#canvas-wrapper').toggleClass('border')
                stopScan.innerHTML = 'Click <a href="#">here</a> to Stop Scanning'

                $('.qr_image').removeClass('border shadow-sm')
                scan();
            });
    };
    function tick() {
        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        scanning && requestAnimationFrame(tick);
    }
    function scan() {
        try {
            qrcode1.decode();
        } catch (e) {
            setTimeout(scan, 300);
        }
    }

    stopScan.onclick = () => {

        stopScan.innerHTML = 'Closing camera ....'
        setTimeout(() => {
            stopScanning()
        }, 1500);


    }

    function stopScanning(){
        canvasElement.hidden = true;

        btnScanQR.hidden = false;
        $('.qr_image').toggleClass('border shadow-sm')
        $('#canvas-wrapper').removeClass('border')
        document.getElementById('text-click-img').innerHTML = 'Click QR Image to Scan'
        document.getElementById('text-click-img').style.display = 'block'

        scanning = false;
        video.srcObject.getTracks().forEach(track => {
            track.stop();
        });

        stopScan.style.display = 'none'
    }
</script>
@endsection
