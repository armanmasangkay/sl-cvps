<div class="row">
    <div class="col-md-12 pl-md-5 pl-sm-3">
        <input type="hidden" name="person_id" value="{{ $person->id }}">
        <p class="text-secondary basic-info">QR Code: <strong class="text-danger">{{$person->qr_code}}</strong> </p>
        <p class="text-secondary basic-info">Full name: <strong class="text-danger">{{$person->fullnameFormal()}}</strong></p>
    </div>
</div>
