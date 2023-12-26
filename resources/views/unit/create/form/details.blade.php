<div class="row mt-4">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="bathrooms">Bathrooms <span></span></label>
            <input
                type="text"
                name="bathrooms"
                class="form-control
                @error('bathrooms') border border-solid border-danger  @enderror"
                id="bathrooms"
                placeholder="ex: 2"
                value="{{ old('bathrooms') }}"
            >
            @error('bathrooms')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="bedrooms">Bedrooms <span></span></label>
            <input
                type="text"
                name="bedrooms"
                class="form-control
                @error('bedrooms') border border-solid border-danger  @enderror"
                id="bedrooms"
                placeholder="ex: 4"
                value="{{ old('bedrooms') }}"
            >
            @error('bedrooms')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-4">


    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-units-input">Floor<span></span></label>
            <input
                type="number"
                name="floor"
                class="form-control
                @error('units') border border-solid border-danger  @enderror"
                id="floor"
                placeholder="ex: 156"
                value="{{ old('floor') }}"
            >
            @error('floor')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="area_range">Unit Area (Sq.Ft)<span></span></label>
            <input
                type="text"
                name="area_range"
                class="form-control
                @error('area_range') border border-solid border-danger  @enderror"
                id="area_range"
                placeholder="ex: 743 SQ.FT / 69.03 SQ.M"
                value="{{ old('area_range') }}"
            >
            @error('area_range')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


<div class="row mt-4">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="outdoor_area_range">Outdoor Area (Sq.Ft)<span></span></label>
            <input
                type="text"
                name="outdoor_area_range"
                class="form-control
                @error('outdoor_area_range') border border-solid border-danger  @enderror"
                id="outdoor_area_range"
                placeholder="ex: 743 SQ.FT / 69.03 SQ.M"
                value="{{ old('outdoor_area_range') }}"
            >
            @error('outdoor_area_range')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="terrace_area_range">Terrace Area (Sq.Ft)<span></span></label>
            <input
                type="text"
                name="terrace_area_range"
                class="form-control
                @error('terrace_area_range') border border-solid border-danger  @enderror"
                id="terrace_area_range"
                placeholder="ex: 743 SQ.FT / 69.03 SQ.M"
                value="{{ old('terrace_area_range') }}"
            >
            @error('terrace_area_range')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
