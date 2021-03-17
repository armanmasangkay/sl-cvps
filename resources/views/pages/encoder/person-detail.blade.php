@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="justify-content-center">
            <h3 class="text-center">Data Evaluation</h3>
            <div class="row">
                <div class="col">
                    <h6>Acts Data</h6>
                    <div class="card">
                        <p>{{ $actspersondatas[0]['first_name'] }}</p>
                        <p>{{ $actspersondatas[0]['middle_name'] }}</p>
                        <p>{{ $actspersondatas[0]['last_name'] }}</p>
                    </div>
                </div>
                <div class="col">
                    <h6>Vaccination Data</h6>
                    <div class="card">
                        <p>{{ $persondatas['firstname'] }}</p>
                        <p>{{ $persondatas['middlename'] }}</p>
                        <p>{{ $persondatas['lastname'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('qr.add') }}" method="post">
            @csrf
            <input type="hidden" name="person_id" value="{{ $persondatas['id'] }}">
            <input type="hidden" name="qrcode_number" value="{{ $actspersondatas[0]['qr_code'] }}">
            <button type="submit">Accept</button>
        </form>
    </div>
@endsection



