@extends('layouts.main')

@include('templates.navigation')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<div class="container mt-3">

    <div class="row">
        <div class="col-12 mt-4">

            @if(Illuminate\Support\Facades\Route::currentRouteName()=='pre.index')
            <h5 class="text-muted text-center mb-4 text-heading">List of Individuals for Vaccination</h5>
            @else
            <div class="text-center" class="mb-4">
                <h5 class="text-muted mb-4 text-heading">Search Results for "{{$queryFirstname}} {{$queryLastname}}"</h5>
                <a href="{{route('pre.index')}}">Back to Individuals list</a>
            </div>
            @endif


            @if($persons->count()>0)

            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0" style="min-width: 1000px !important;">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                FULL NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="map-pin" class="pb-1 mr-1 text-primary"></i>
                                ADDRESS
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="calendar" class="pb-1 mr-1 text-primary"></i>
                                BIRTH DATE
                            </td>
                            <td class="border-bottom-0 border-top-0" colspan="2">
                                <i data-feather="edit-3" class="pb-1 mr-1 text-primary"></i>
                                ACTIONS
                            </td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        @forelse ($persons as $person)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{ $person->fullnameFormal() }}</td>
                                <td class="pt-2 pb-0">{{ $person->address() }}</td>
                                <td class="pt-2 pb-0">{{ $person->birthday() }}</td>
                                <td class="pt-2 pb-2" colspan="2">
                                    @if ($person->hasQrCode())
                                        <div class="d-flex justify-content-start">

                                            <a href="{{route('encoder.post-vax',$person)}}" class="btn btn-success ml-1 pt-0 pb-0" style="padding-bottom: 2px !important;">
                                             <i data-feather="file-plus" class="pb-1 pt-1"></i> New Data
                                            </a>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-start">
                                            <button type="button" class="btn btn-primary ml-1 pt-0 pb-0 btn-scan" data-id="{{ $person->id }}"  data-toggle="modal" data-target="#exampleModal">
                                                <i data-feather="smartphone" class="pb-1 pt-1"></i>
                                                Scan QR
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty

                        @endforelse


                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{$persons->links()}}
            </div>

            @else
            <h6 class="text-center mt-4 text-muted ">No data to show</h6>
            @endif
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
                    {{-- @csrf --}}

                    <div class="row mt-3">
                        <div class="col-sm-6 offset-sm-3 col-xs-6 offset-xs-3 pl-4 pr-4">
                            <small class="text-danger" id="errormessage"></small>
                            <input type="hidden" name="person_id" id="person_id">
                            <input type="text" class="form-control pt-4 pb-4" placeholder="Enter QR Code" id="qrcode">
                        </div>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-primary mt-2 pt-2 pb-2" id="verifyButton">Add QR</button>
                    </center>
                </form>
            </div>
            <div class="modal-footer border-top-0">

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

    $(document).on('click', '.btn-scan', function(){
        const data_id = $(this).attr('data-id')
        $('#person_id').val(data_id)
    })

    document.getElementById('qrForm').addEventListener('submit', async function(e){
        e.preventDefault()

        let errormessage = document.getElementById('errormessage');
        let data = {
            person_id : document.getElementById('person_id').value,
            qrcode_number : document.getElementById('qrcode').value
        }

        let response =  await fetch('/checkqr', {
            method: 'post',
            headers: {
                'Content-Type' : 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        })

        response = await response.json()

        // console.log(response)

        if(response.status === "success")
        {
            errormessage.innerHTML = ""
            // console.log(response.data);
            sendData(response.data);

        }
        else
        {
            errormessage.innerHTML = response.errors
        }
    })

    async function sendData(data)
    {
        let response = await fetch('/senddata',
        {
            method: 'post',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        });

        // response =  await response.json();

        // console.log(response);

        window.location.href = '/detail';
    }

</script>
@endsection
