<div class="row counseling">
    <div class="col-md-12 pl-md-5 pl-sm-3">
        <input type="text" name="person_id" id="" value="" hidden>
        <input type="number" name="dose" id="" value="" hidden>
        <div class="d-flex justify-content-start">
            <input type="checkbox" class="mt-2 mr-2" id="toggle" name="consent" checked>
            <p class="ml-3 mt-1 pt-1 text-secondary">Consent</p>
        </div>

        <div class="ml-2">
            <div class="col-md-6">
                <p class="ml-3 mt-2 pt-1 text-secondary">* Reason for refusal</p>
                @error('specify_deferral_text')<span class="text-danger ml-2">{{ $message }}</span>@enderror
                <input type="text" class="form-control ml-3" name="reason_for_refusal">
            </div>
        </div>
    </div>
</div>