<div class="row m-3">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Name</label>
            <input
                type="text"
                name="company_name"
                id="company_name"

                class="form-control
                @error('company_name') border border-solid border-danger  @enderror"
                value="{{ $resource->company_name }}"
            >
        </div>
    </div>
</div>


<div class="row m-3">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Email</label>
            <input
                type="text"
                name="company_email"
                id="company_email"

                class="form-control
                @error('company_email') border border-solid border-danger  @enderror"
                value="{{ $resource->company_email }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Contact</label>
            <input
                type="text"
                name="company_land_line"
                id="company_land_line"

                class="form-control
                @error('company_land_line') border border-solid border-danger  @enderror"
                value="{{ $resource->company_land_line }}"
            >
        </div>
    </div>
</div>



<div class="row m-3">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Address</label>
            <input
                type="text"
                name="company_address"
                id="company_address"

                class="form-control
                @error('company_address') border border-solid border-danger  @enderror"
                value="{{ $resource->company_address }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-title-input">Authorized Person</label>
            <input
                type="text"
                name="authorized_p_name"
                id="authorized_p_name"
            
                class="form-control
                @error('authorized_p_name') border border-solid border-danger  @enderror"
                value="{{ $resource->authorized_p_name }}"
            >
        </div>
    </div>
</div>


<div class="row m-3">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Company Website</label>
            <input
                type="text"
                name="company_website"
                id="company_website"

                class="form-control
                @error('company_website') border border-solid border-danger  @enderror"
                value="{{ $resource->company_website }}"
            >
        </div>
    </div>
</div>

