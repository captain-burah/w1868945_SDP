<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Title &#40;<span id="property_title_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="title_en"
                placeholder="Trillionair Residence"
                id="property_title"
                maxlength="60"

                class="form-control
                @error('title_en') border border-solid border-danger  @enderror"
                value="{{ old('title_en') }}"
            >
        </div>
    </div>

</div>


<div class="row mt-5">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="ownership">Project Ownership</label>
            <input
                type="text"
                name="ownership"
                class="form-control
                @error('ownership') border border-solid border-danger  @enderror"
                id="basicpill-ownership-input"
                placeholder="Freehold / Leasehold / Fractional"
                value="{{ old('ownership') }}"
            >
            @error('ownership')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="handover">Estimated Completion</label>
            <input
                type="text"
                name="handover"
                class="form-control
                @error('handover') border border-solid border-danger  @enderror"
                id="handover"
                placeholder="Q3 2026"
                value="{{ old('handover') }}"
            >

            @error('handover')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>



<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Starting Pricing in AED  <span class="text-muted font-weight-light">&#40;do not use any number format&#41;</span></label>
            <input
                type="number"
                name="price"
                class="form-control
                @error('price') border border-solid border-danger  @enderror"
                id="price"
                placeholder="2700000"
                value="{{ old('price') }}"
            >
            @error('price')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>


<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Escrow Number</label>
            <input
                type="text"
                name="escrow"
                class="form-control
                @error('escrow') border border-solid border-danger  @enderror"
                id="price"
                placeholder="123*******789"
                value="{{ old('escrow') }}"
            >
            @error('escrow')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>


<div class="row mt-5">
    <div class="col-md-3">
        <div class="mb-3">
            <label for="basicpill-units-input">No of Units<span></span></label>
            <input
                type="number"
                name="units"
                class="form-control
                @error('units') border border-solid border-danger  @enderror"
                id="units"
                placeholder="156"
                value="{{ old('units') }}"
            >
            @error('units')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="bedrooms">Bedroom <span></span></label>
            <input
                type="text"
                name="bedrooms"
                class="form-control
                @error('bedrooms') border border-solid border-danger  @enderror"
                id="bedrooms"
                placeholder="Studio, 1, 2, 3 & 4"
                value="{{ old('bedrooms') }}"
            >
            @error('bedrooms')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="bathrooms">Bathroom <span></span></label>
            <input
                type="text"
                name="bathrooms"
                class="form-control
                @error('bathrooms') border border-solid border-danger  @enderror"
                id="bathrooms"
                placeholder="1, 2, 3, 4"
                value="{{ old('bathrooms') }}"
            >
            @error('bathrooms')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="floors">Floors <span></span></label>
            <input
                type="number"
                name="floors"
                class="form-control
                @error('floors') border border-solid border-danger  @enderror"
                id="floors"
                placeholder="50"
                value="{{ old('floors') }}"
            >
            @error('floors')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="area_range">Unit Area Range (Sq.Ft)<span></span></label>
            <input
                type="text"
                name="area_range"
                class="form-control
                @error('area_range') border border-solid border-danger  @enderror"
                id="area_range"
                placeholder="1,200 - 1,500"
                value="{{ old('area_range') }}"
            >
            @error('area_range')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="outdoor_area_range">Outdoor Area (Sq.Ft)<span></span></label>
            <input
                type="text"
                name="outdoor_area_range"
                class="form-control
                @error('outdoor_area_range') border border-solid border-danger  @enderror"
                id="outdoor_area_range"
                placeholder="5,200 - 7,500"
                value="{{ old('outdoor_area_range') }}"
            >
            @error('outdoor_area_range')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="terrace_area_range">Terrace Area (Sq.Ft)<span></span></label>
            <input
                type="text"
                name="terrace_area_range"
                class="form-control
                @error('terrace_area_range') border border-solid border-danger  @enderror"
                id="terrace_area_range"
                placeholder="3,200 - 5,500"
                value="{{ old('terrace_area_range') }}"
            >
            @error('terrace_area_range')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
