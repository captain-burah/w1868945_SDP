
<div class="row">

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label text-muted">Project</label>
            <select
                class="form-control select2-search-disable select2-hidden-accessible  border border-solid border-muted text-muted
                @error('status') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="status"
                disabled
            >   
                <option value="">Choose ...</option>
                @if(isset($projects))
                    @foreach($projects as $data)
                        @if($resource->unit->project_id == $data->id)
                            <option selected value="{{$data->id}}">{{ $data->name }}</option>
                        @else
                            <option value="{{$data->id}}">{{ $data->name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @error('status')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror


        </div>
    </div>


    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label text-muted">Unit</label>
            <select
                class="form-control select2-search-disable select2-hidden-accessible  border border-solid border-muted text-muted
                @error('status') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="status"
                
            >   
                <option value="">Choose ...</option>
                @if(isset($units))
                    @foreach($units as $data)
                        @if($resource->unit->name == $data->name)
                            <option selected value="{{$data->id}}">{{ $data->name }}</option>
                        @else
                            <option value="{{$data->id}}">{{ $data->name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @error('status')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror


        </div>
    </div>

    
</div>

{{-- <hr class="my-5 "> --}}
