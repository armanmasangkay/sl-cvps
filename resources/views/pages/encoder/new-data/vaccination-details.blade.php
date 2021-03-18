<div class="row">
    <div class="col-md-6 pl-md-5 pl-sm-3">
        {{-- <input type="text" name="person_id" id="" value="" hidden> --}}
        {{-- <input type="number" name="dose" id="" value="" hidden> --}}

        <p class="mt-1 pt-1 text-secondary">Vaccinator</p>
        <select name="vaccinator_id" class="form-control">
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
        <select name="vaccine_id" class="form-control">
            @foreach($vaccines as $vaccine)
            <option value="{{$vaccine->id}}">{{$vaccine->details()}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pl-md-5 pl-sm-3">
        <p class="mt-1 pt-1 text-secondary">Date Vaccinated</p>
        <input type="date" class="form-control" name="date_of_vaccination" value="{{Illuminate\Support\Carbon::now()->format('Y-m-d')}}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 pl-md-5 pl-sm-3">
        <p class="mt-1 pt-1 text-secondary">Dose</p>
        <input type="text" readonly name="dose" value="{{ $person->postvaxes->count() >= 1 ? 2: 1 }}" class="form-control">
    </div>
</div>
