
<div class="row mt-4">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Unit Name &#40;<span id="property_title_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="unit_name"
                placeholder="ex: RY SUNRIDGE-G-G04"
                id="unit_name"
                maxlength="60"

                class="form-control
                @error('unit_name') border border-solid border-danger  @enderror"
                value="{{ old('unit_name') }}"
            >
        </div>
    </div>

</div>



<div class="row mt-4">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-title-input">Unit Size <span class="text-muted">&#40;use number formatting&#41;</span></label>
            <input
                type="text"
                name="unit_size"
                placeholder="ex: 1,753 SQ.FT / 162.86 SQ.M"
                id="unit_size"

                class="form-control
                @error('unit_size') border border-solid border-danger  @enderror"
                value="{{ old('unit_size') }}"
            >
        </div>
    </div>

</div>




<div class="row mt-4">

    <div class="col-md-12">
        <div data-select2-id="15">
            <label class="form-label">Project</label>


            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('emirates') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="project"
            >
                <option selected value="">Choose ...</option>
                @if(isset($projects))
                    @foreach($projects as $data)
                        <option value="{{$data->id}}">{{ $data->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('project')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

</div>
