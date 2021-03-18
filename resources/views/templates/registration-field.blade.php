<div class="container border border-gray pt-4 pb-4 pl-4 pr-4 mt-3 rounded register shadow-sm bg-white">
    
    <div class="border border-gray pt-4 pb-4 pl-md-5 pr-md-5 pl-sm-3 pr-sm-3 pl-4 pr-3 pre-reg">
    <div class="d-flex justify-content-start mt-2">
        <i data-feather="user" class="mt-1 text-primary pt-1"></i>
        <h5 class="text-primary ml-2 mt-1"> Personal Information</h5>
    </div>
    
    <!-- name -->
    <div class="row pt-4">
        <div class="col-lg-3 col-md-6 mt-2">
            <label class="text-secondary">First name<small class="text-danger">(required)</small></label>
            <input type="text" class="form-control" name="firstname" id="input" required value="{{ old('firstname') }}" placeholder="Enter first name">
            @error('firstname')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-3 col-md-6 mt-2">
            <label class="text-secondary">Middle name <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" placeholder="Enter middle name">
        </div>
        <div class="col-lg-3 col-md-6 mt-2">
            <label class="text-secondary">Last name <small class="text-danger">(required)</small></label>
            <input type="text" class="form-control" name="lastname" required value="{{ old('lastname') }}" placeholder="Enter last name">
            @error('lastname')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-3 col-md-6 mt-2">
            <label class="text-secondary">Suffix <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="suffix" value="{{ old('suffix') }}" placeholder="Enter suffix (ex. Jr, Sr, I, II, III)">
        </div>
    </div>

    <!-- address -->
    <div class="row">
        <div class="col-md-6 mt-2">
            <label class="text-secondary">Region</label>
            <input type="text" class="form-control" name="loc_region" value="8" readonly  placeholder="Enter region (ex. 8)">
        </div>
        <div class="col-md-6 mt-2">
            <label class="text-secondary">Province</label>
            <input type="text" id="Province" class="form-control" name="loc_prov" value="Southern Leyte" readonly required placeholder="Enter province (ex. Southern Leyte)">
            @error('loc_prov')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 mt-2">
            <label class="text-secondary">Municipality <small class="text-danger">(required)</small></label>
            <select type="text" id="Municipality" class="form-control" name="loc_muni" required value="{{ old('loc_muni') }}">
                <option value="">Select Municipality</option>
            </select>
            @error('loc_muni')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 mt-2">
            <label class="text-secondary">Barangay <small class="text-danger">(required)</small></label>
            <select type="text" id="Barangay" class="form-control" name="loc_brgy"  required value="{{ old('loc_brgy') }}">
                <option value="">Select barangay</option>
            </select>
            @error('loc_brgy')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- gender and birthdate -->
    <div class="row">
        <div class="col-md-4 mt-2">
            <label class="text-secondary">Sex <small class="text-danger">(required)</small></label>
            <select name="sex" class="form-control" required>
                <option value="">Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('sex')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 mt-2">
            <label class="text-secondary">Birth Date <small class="text-danger">(required)</small></label>
            <input type="date" name="birth_date" class="form-control" placeholder="dd/mm/yyyy  (required)" required value="{{ old('birth_date') }}"  placeholder="Brithdate(dd/mm/yyyy)">
            @error('birth_date')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 mt-2">
            <label class="text-secondary">Contact No <small class="text-danger">(required)</small></label>
            <input type="number" name="contact_num" class="form-control" required value="{{ old('contact_num') }}"  placeholder="Enter contact number (ex. 09xxxxxxxxx)">
            @error('contact_num')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="d-flex justify-content-start mt-5">
        <i data-feather="user-plus" class="mt-1 text-primary pt-1"></i>
        <h5 class="text-primary ml-2 mt-1" style="padding-top: 1px !important;"> Additional Information</h5>
    </div>

    <!-- category -->
    <div class="row pt-4">
        <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
            <label class="text-secondary">Category <small class="text-danger">(required)</small></label>
            <select name="category" class="form-control" required>
                <option value="">Select category</option>
                @foreach($categories as $categoryKey=>$categoryValue)
                <option value="{{$categoryKey}}" >{{$categoryValue}}</option>
                @endforeach
            </select>
            @error('category')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 pr-md-1 mt-1">
            <label class="text-secondary">Category ID <small class="text-danger">(required)</small></label>
            <select name="category_id" class="form-control" required>
                <option value="">Select category ID</option>
                @foreach($categoryIds as $categoryIdsKey=>$categoryIdsValue)
                <option value="{{$categoryIdsKey}}">{{$categoryIdsValue}}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
            <label class="text-secondary">Category ID No <small class="text-danger">(required)</small></label>
            <input type="text" class="form-control" name="category_id_num" required value="{{ old('category_id_num') }}" placeholder="Enter category ID number">
            @error('category_id_num')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- philhealth and pwd id -->
    <div class="row">
        <div class="col-md-6 mt-2">
            <label class="text-secondary">PhilHealth ID <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="philhealth" value="{{ old('philhealth') }}" placeholder="Enter PhilHealth ID number (if any)">
        </div>
        <div class="col-md-6 mt-2">
            <label class="text-secondary">PWD ID <small class="text-gray">(optional)</small></label>
            <input type="text" class="form-control" name="pwd_id" value="{{ old('pwd_id') }}" placeholder="Enter PWD ID number (if any)">
        </div>
    </div>

    <!-- consent -->
    <div class="row mt-3">
        <div class="col-md-12 mt-1">
            <div class="d-flex justify-content-start">
                <input type="checkbox" class="mt-2 mr-2" id="toggle" name="confirm">
                <p class="text-secondary pl-2 mt-2 pl-3 text-confirm">I confirmed that the above information are
                    true and correct base on my knowledge.</p>
            </div>
        </div>
    </div>

    <!-- button submition -->
    <div class="row mt-3">
        <div class="col-md-12 mt-1 mb-3">
            <button type="sbumit" class="btn btn-primary pb-2"><i data-feather="check" class="pt-1 pb-1"></i>Confirm &nbsp;</button>
        </div>
    </div>

    </div>
</div>

<script src="{{ asset('js/r8.js') }}"></script>
