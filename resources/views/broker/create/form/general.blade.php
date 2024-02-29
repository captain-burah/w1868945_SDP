<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Name</label>
            <input
                type="text"
                name="company_name"
                id="company_name"

                class="form-control
                @error('company_name') border border-solid border-danger  @enderror"
                value="{{ old('company_name') }}"
            >
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Address</label>
            <input
                type="text"
                name="company_address"
                id="company_address"

                class="form-control
                @error('company_address') border border-solid border-danger  @enderror"
                value="{{ old('company_address') }}"
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Authorized Person</label>
            <input
                type="text"
                name="authorized_p_name"
                id="authorized_p_name"

                class="form-control
                @error('authorized_p_name') border border-solid border-danger  @enderror"
                value="{{ old('authorized_p_name') }}"
            >
        </div>
    </div>
</div>



