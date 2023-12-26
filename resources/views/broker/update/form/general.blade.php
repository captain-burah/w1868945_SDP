
<div class="row">

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Emirate</label>


            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('emirates') border border-solid border-danger @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="emirates"
            >
                <option selected value="">Choose ...</option>
                @if(isset($emirates))
                    @foreach($emirates as $data)
                        @if($project->emirate_id == $data->id)
                            <option selected value="{{$data->id}}">{{ $data->city_name_en }} ({{$data->city_name_ar}})</option>
                        @else
                            <option value="{{$data->id}}">{{ $data->city_name_en }} ({{$data->city_name_ar}})</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @error('emirates')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Off Plan / Ready</label>


            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('property_release_id') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="property_release_id"
            >
                <option selected value="">Choose ...</option>
                <option selected value="1">Off-plan</option>
                <option selected value="2">Ready</option>

            </select>
            @error('property_release_id')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Community</label>

            <input
                type="text"
                name="community"
                class="form-control
                @error('community') border border-solid border-danger  @enderror"
                id="community"
                placeholder=""
                value="{{ $project->community }}"
            >
            @error('community')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Category</label>

            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('category') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="category"
            >

                <option selected value="">Choose ...</option>
                @if(isset($categories))
                    @foreach($categories as $data)
                        @if($project->category_id == $data->id)
                            <option selected value="{{$data->id}}">{{ $data->name_en }} ({{$data->name_ar}})</option>
                        @else
                            <option value="{{$data->id}}">{{ $data->name_en }} ({{$data->name_ar}})</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @error('category')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>



{{-- <hr class="my-5 "> --}}

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
                value="{{$project->longitude}}"
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
                value="{{$project->latitude}}"
            >
            @error('latitude')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>
