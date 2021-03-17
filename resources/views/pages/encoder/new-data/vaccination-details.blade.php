<div class="row">
    <div class="col-md-6 pl-md-5 pl-sm-3">
        {{-- <input type="text" name="person_id" id="" value="" hidden> --}}
        {{-- <input type="number" name="dose" id="" value="" hidden> --}}

        <p class="mt-1 pt-1 text-secondary">Vaccinator</p>
        <select name="" class="form-control">
            @foreach($vaccinators as $vaccinator)
                <option value="{{$vaccinator->id}}">{{$vaccinator->fullname()}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pl-md-5 pl-sm-3">
        <p class="mt-1 pt-1 text-secondary">Vaccine Used</p>
        <small class="mb-3 text-info">Format: Batch number | Name (Manufacturer)</small>
        <select name="" class="form-control">
            @foreach($vaccines as $vaccine)
            <option value="{{$vaccine->id}}">{{$vaccine->details()}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pl-md-5 pl-sm-3">
        <p class="mt-1 pt-1 text-secondary">Date Vaccinated</p>
        <input type="date" class="form-control" value="{{Illuminate\Support\Carbon::now()->format('Y-m-d')}}">
    </div>
</div>
