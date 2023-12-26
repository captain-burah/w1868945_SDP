

<div class="row">

    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Header Description (EN) (max 255 characters)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('description')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="description" id="description" class="form-control w-100" rows="5">{{ old('description') }}</textarea>

                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Project Background Heading (EN)</label>
            <div class="w-100 ">
                <div class="my-1">
                    @error('secOne_title')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <input
                        type="text"
                        name="secOne_title"
                        id="secOne_title"
                        maxlength="255"
                        class="form-control
                        @error('secOne_title') border border-solid border-danger  @enderror"
                        value="{{ old('secOne_title') }}"
                    >
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Project Background Description (EN)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secOne_description')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secOne_description" id="secOne_description" class="form-control w-100" rows="5">{{ old('secOne_description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Features Heading (EN)</label>
            <div class="w-100 ">
                <div class="my-1">
                    @error('secTwo_title')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <input
                        type="text"
                        name="secTwo_title"
                        id="secTwo_title"
                        maxlength="255"
                        class="form-control
                        @error('secTwo_title') border border-solid border-danger  @enderror"
                        value="{{ old('secTwo_title') }}"
                    >
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Features Description (EN)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secTwo_description')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secTwo_description" id="secTwo_description" class="form-control w-100" rows="5">{{ old('secTwo_description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Amenity List (EN)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secTwo_amenities')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secTwo_amenities" id="secTwo_amenities" class="form-control w-100 textareablock" rows="5">{{ old('secTwo_amenities') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Location heading (EN)</label>
            <div class="w-100 ">
                <div class="my-1">
                    @error('secThree_title')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <input
                        type="text"
                        name="secThree_title"
                        id="secThree_title"
                        maxlength="255"
                        class="form-control
                        @error('secThree_title') border border-solid border-danger  @enderror"
                        value="{{ old('secThree_title') }}"
                    >
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Location Description (EN)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secThree_description')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secThree_description" id="secThree_description" class="form-control w-100" rows="5">{{ old('secThree_description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>