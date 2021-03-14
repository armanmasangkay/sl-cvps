<div class="container border border-gray pt-3 pb-4 pl-4 pr-4 mt-3 rounded">
    <h5 class="text-secondary text-p-info">Personal Information</h5>

    <!-- category -->
    <div class="row mt-3">
        <div class="col-md-4 pr-md-1 mt-1">
            <input type="text" class="form-control" name="category" placeholder="Category (required)"  value="{{ old('category') }}">
            @error('category')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 pl-md-1 pr-md-1 mt-1" required>
            <select name="category_id" class="form-control">
                <option value="1">Category ID  (required)</option>
            </select>
            @error('category_id')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 pl-md-1 mt-1">
            <input type="text" class="form-control" name="category_id_num" placeholder="Category ID No  (required)" required value="{{ old('category_id_num') }}">
            @error('category_id_num')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- philhealth and pwd id -->
    <div class="row">
        <div class="col-md-6 pr-md-1 mt-2">
            <input type="text" class="form-control" name="philhealth_" placeholder="Philhealth ID (optional)" value="{{ old('philhealth') }}">
        </div>
        <div class="col-md-6 pl-md-1 mt-2">
            <input type="text" class="form-control" name="pwd_id" placeholder="PWD ID (optional)" value="{{ old('pwd_id') }}">
        </div>
    </div>

    <!-- name -->
    <div class="row">
        <div class="col-md-3 pr-md-1 mt-2">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname  (required)" required value="{{ old('lastname') }}">
            @error('lastname')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3 px-md-1 mt-2">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname  (required)" required value="{{ old('firstname') }}">
            @error('firstname')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3 px-md-1 mt-2">
            <input type="text" class="form-control" name="middlename" placeholder="Middlename  (optional)" value="{{ old('middlename') }}">
        </div>
        <div class="col-md-3 pl-md-1 mt-2">
            <input type="text" class="form-control" name="suffix" placeholder="Suffix  (optional)" value="{{ old('suffix') }}">
        </div>
    </div>

    <!-- address -->
    <div class="row">
        <div class="col-md-6 pr-md-1 mt-2">
            <input type="text" class="form-control" name="loc_reg" placeholder="Current Residence Region  (optional)" value="{{ old('loc_reg') }}">
        </div>
        <div class="col-md-6 pl-md-1 mt-2">
            <input type="text" class="form-control" name="loc_prov" placeholder="Current Residence Province  (required)" required value="{{ old('loc_prov') }}">
            @error('loc_prov')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 pr-md-1 mt-2">
            <input type="text" class="form-control" name="loc_muni" placeholder="Current Residence Municipality/City  (required)" required value="{{ old('loc_muni') }}">
            @error('loc_muni')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 pl-md-1 mt-2">
            <input type="text" class="form-control" name="loc_brgy" placeholder="Current Residence Barangay  (required)" required value="{{ old('loc_brgy') }}">
            @error('loc_brgy')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- gender and birthdate -->
    <div class="row">
        <div class="col-md-4 pr-md-1 mt-2">
            <select name="sex" class="form-control">
                <option value="">Select gender  (required)</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('sex')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 px-md-1 mt-2">
            <input type="date" name="birth_date" class="form-control" placeholder="dd/mm/yyyy  (required)" required value="{{ old('birth_date') }}">
            @error('birth_date')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-4 pl-md-1 mt-2">
            <input type="text" name="contact_num" class="form-control" placeholder="Contact No  (required)" required value="{{ old('contact_num') }}">
            @error('contact_num')
            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
            @enderror
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
            <a href="" class="btn btn-secondary pb-2">Cancel</a>
        </div>
    </div>
</div>