<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="basicpill-title-input">Title EN &#40;<span id="property_title_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="title_en"
                placeholder="Trillionair Residence"
                id="property_title"
                maxlength="60"

                class="form-control
                @error('title_en') border border-solid border-danger  @enderror"
                value="{{ $project->name}}"
            >
        </div>
    </div>

    <div class="col-md-6" dir="rtl">
        <div class="mb-3">
            <label class="w-100 text-right" for="basicpill-title-input">Title AR &#40;<span id="property_title_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="title_ar"
                placeholder="Trillionair Residence"
                id="property_title"
                maxlength="60"

                class="form-control
                @error('title_ar') border border-solid border-danger  @enderror"
                value="{{ $project->name_ar }}"
            >
        </div>
    </div>

</div>



<div class="row mt-5">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="ownership">Project Ownership EN</label>
            <input
                type="text"
                name="ownership"
                class="form-control
                @error('ownership') border border-solid border-danger  @enderror"
                id="basicpill-ownership-input"
                placeholder="Freehold / Leasehold "
                value="{{ $project->ownership }}"
            >
            @error('ownership')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6" dir="rtl">
        <div class="mb-3">
            <label class="w-100 text-rig" for="ownership_ar">Project Ownership AR</label>
            <input
                type="text"
                name="ownership_ar"
                class="form-control
                @error('ownership_ar') border border-solid border-danger  @enderror"
                id="basicpill-ownership-input"
                placeholder="التملك الحر / الإيجار"
                value="{{ $project->ownership_ar }}"
            >
            @error('ownership_ar')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>



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
                value="{{ $project->handover }}"
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
            <label for="price">Pricing in AED  <span class="text-muted font-weight-light">&#40;do not use any number format&#41;</span></label>
            <input
                type="number"
                name="price"
                class="form-control
                @error('price') border border-solid border-danger  @enderror"
                id="price"
                placeholder="2700000"
                value="{{$project->starting_price}}"
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
                value="{{$project->escrow}}"
            >
            @error('escrow')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>



{{-- <hr class="my-5 "> --}}




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
                value="{{ $project->no_of_units }}"
            >
            <span class="text-muted font-size-10"><strike>Sq.Ft.</strike> &nbsp; Do not use any units, whitespaces or number formats</span>
            @error('units')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="bedrooms">Type of Units <span></span></label>
            <input
                type="text"
                name="bedrooms"
                class="form-control
                @error('bedrooms') border border-solid border-danger  @enderror"
                id="bedrooms"
                placeholder="Studio, 1, 2, 3 & 4"
                value="{{$project->bedrooms}}"
            >
            <span class="text-muted font-size-10">You can enter any units, whitespaces or number formats</span>
            @error('bedrooms')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="building_height">Building Height <span></span></label>
            <input
                type="text"
                name="building_height"
                class="form-control
                @error('building_height') border border-solid border-danger  @enderror"
                id="building_height"
                placeholder="eg: 500 ft"
                value="{{ $project->building_height }}"
            >
            @error('building_height')
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
                value="{{$project->floors}}"
            >
            <span class="text-muted font-size-10"><strike>Sq.Ft.</strike> &nbsp; Do not enter any units, whitespaces or number formats</span>
            @error('floors')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

    





</div>



{{-- <hr class="my-5 "> --}}


