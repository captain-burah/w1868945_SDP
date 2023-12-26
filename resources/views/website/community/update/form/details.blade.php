<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-title-input">Title &#40;<span id="property_title_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="title"
                placeholder="Strawberry on a green plate"
                id="property_title"
                maxlength="60"

                class="form-control
                @error('title') border border-solid border-danger  @enderror"
                value="{{ $resources->title }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="text-primary" for="basicpill-title-input">Title Ar &#40;<span id="property_title_chars_ar">60</span> characters remaining &#41;</label>
            <input
                dir="rtl"
                type="text"
                name="title_ar"
                placeholder=""
                id="property_title_ar"
                maxlength="60"

                class="form-control
                @error('title_ar') border border-solid border-danger  @enderror"
                value="{{ $resources->title_ar }}"
            >
        </div>
    </div>

</div>


<div class="row mt-5">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-address-input">Address</label>
            <input
                type="text"
                name="address"
                class="form-control
                @error('address') border border-solid border-danger  @enderror"
                id="basicpill-address-input"
                placeholder=""
                value="{{ $resources->address }}"
            >
            @error('address')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="mb-3">
            <label class="text-primary" for="basicpill-address_ar-input">Address Ar</label>
            <input
                dir="rtl"
                type="text"
                name="address_ar"
                class="form-control
                @error('address_ar') border border-solid border-danger  @enderror"
                id="basicpill-address_ar-input"
                placeholder=""
                value="{{ $resources->address_ar }}"
            >
            @error('address_ar')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="heading">Sub Heading</label>
            <input
                type="text"
                name="heading"
                class="form-control
                @error('heading') border border-solid border-danger  @enderror"
                id="heading"
                placeholder=""
                value="{{ $resources->heading }}"
            >

            @error('heading')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="text-primary" for="heading_ar">Sub Heading Ar</label>
            <input
                type="text"
                name="heading_ar"
                class="form-control
                @error('heading_ar') border border-solid border-danger  @enderror"
                id="heading_ar"
                placeholder=""
                value="{{ $resources->heading_ar }}"
            >

            @error('heading_ar')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>



<div class="row mt-5">
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Longitude</label>
            <input
                type="text"
                name="longitude"
                class="form-control
                @error('longitude') border border-solid border-danger  @enderror"
                id="longitude"
                placeholder="55.**"
                value="{{ $resources->longitude }}"
            >
            @error('longitude')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Latitude</label>
            <input
                type="text"
                name="latitude"
                class="form-control
                @error('latitude') border border-solid border-danger  @enderror"
                id="latitude"
                placeholder="24.**"
                value="{{ $resources->latitude }}"
            >
            @error('latitude')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>
