<div class="container border border-gray pt-3 pb-4 pl-4 pr-4 mt-3 rounded register shadow-sm bg-white">
    <h5 class="text-secondary text-p-info">Personal Information</h5>

    <!-- name -->
    <div class="row">
        <div class="col-md-3 pr-md-1 mt-2">
            <label class="text-secondary">First name<small class="text-danger">(required)</small></label>
            <input type="text" class="form-control" name="firstname" required value="{{ old('firstname') }}">
            @error('firstname')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3 px-md-1 mt-2">
            <label class="text-secondary">Middle name <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}">
        </div>
        <div class="col-md-3 px-md-1 mt-2">
            <label class="text-secondary">Last name <small class="text-danger">(required)</small></label>
            <input type="text" class="form-control" name="lastname" required value="{{ old('lastname') }}">
            @error('lastname')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3 pl-md-1 mt-2">
            <label class="text-secondary">Suffix <small class="text-gray">(option)</small></label>
            <input type="text" class="form-control" name="suffix" value="{{ old('suffix') }}">
        </div>
    </div>

    <!-- address -->
    <div class="row">
        <div class="col-md-6 pr-md-1 mt-2">
            <label class="text-secondary">Region <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="loc_reg" value="8" disabled>
        </div>
        <div class="col-md-6 pl-md-1 mt-2">
            <label class="text-secondary">Province <small class="text-danger">(required)</small></label>
            <input type="text" id="Province" class="form-control" name="loc_prov" required value="Southern Leyte" disabled>
            @error('loc_prov')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 pr-md-1 mt-2">
            <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
            <select type="text" id="Municipality" class="form-control" name="loc_muni" required value="{{ old('loc_muni') }}">
                <option value=""></option>
            </select>
            @error('loc_muni')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 pl-md-1 mt-2">
            <label class="text-secondary">Barangay <small class="text-danger">(required)</small></label>
            <select type="text" id="Barangay" class="form-control" name="loc_brgy"  required value="{{ old('loc_brgy') }}">
                <option value=""></option>
            </select>
            @error('loc_brgy')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- gender and birthdate -->
    <div class="row">
        <div class="col-md-4 pr-md-1 mt-2">
            <label class="text-secondary">Sex <small class="text-danger">(required)</small></label>
            <select name="sex" class="form-control" required>
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('sex')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 px-md-1 mt-2">
            <label class="text-secondary">BirthDate <small class="text-danger">(required)</small></label>
            <input type="date" name="birth_date" class="form-control" placeholder="dd/mm/yyyy  (required)" required value="{{ old('birth_date') }}">
            @error('birth_date')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 pl-md-1 mt-2">
            <label class="text-secondary">Contact No <small class="text-danger">(required)</small></label>
            <input type="number" name="contact_num" class="form-control" required value="{{ old('contact_num') }}">
            @error('contact_num')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <h5 class="text-secondary pt-4 text-p-info">Additional Information</h5>

    <!-- category -->
    <div class="row mt-3">
        <div class="col-md-4 pr-md-1 mt-1">
            <label class="text-secondary">Category <small class="text-danger">(required)</small></label>
            <select name="category" class="form-control" required>
                @foreach($categories as $categoryKey=>$categoryValue)
                <option value="{{$categoryKey}}" style="color: #c2c2c2 !important;">{{$categoryValue}}</option>
                @endforeach
            </select>
            @error('category')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 pl-md-1 pr-md-1 mt-1">
            <label class="text-secondary">Category ID <small class="text-danger">(required)</small></label>
            <select name="category_id" class="form-control" required>
                @foreach($categoryIds as $categoryIdsKey=>$categoryIdsValue)
                <option value="{{$categoryIdsKey}}" style="color: #c2c2c2 !important;">{{$categoryIdsValue}}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 pl-md-1 mt-1">
            <label class="text-secondary">Category ID No <small class="text-danger">(required)</small></label>
            <input type="text" class="form-control" name="category_id_num" required value="{{ old('category_id_num') }}">
            @error('category_id_num')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- philhealth and pwd id -->
    <div class="row">
        <div class="col-md-6 pr-md-1 mt-2">
            <label class="text-secondary">PhilHealth ID <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="philhealth" value="{{ old('philhealth') }}">
        </div>
        <div class="col-md-6 pl-md-1 mt-2">
            <label class="text-secondary">PWD ID <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="pwd_id" value="{{ old('pwd_id') }}">
        </div>
    </div>

    <!-- consent -->
    <div class="row mt-3">
        <div class="col-md-12 pr-md-1 mt-1">
            <div class="d-flex justify-content-start">
                <input type="checkbox" class="mt-1 checkbox" name="confirm">
                <p class="text-secondary pl-2 text-confirm">I confirmed that the above information are
                    true and correct base on my knowledge.</p>
            </div>
        </div>
    </div>

    <!-- button submition -->
    <div class="row mt-3">
        <div class="col-md-12 pr-md-1 mt-1">
            <button type="sbumit" class="btn btn-primary pb-2">Confirm</button>
        </div>
    </div>
</div>

<script src="{{ asset('js/r8.js') }}"></script>
