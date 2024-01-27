

<div class="row" dir="rtl">

    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Header Description (AR) (max 255 characters)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('description_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="description_ar" id="description_ar" class="form-control w-100" rows="5">{{ $project->description_ar}}</textarea>

                </div>
            </div>
        </div>
    </div>
</div>




<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Project Background Heading (AR)</label>
            <div class="w-100 ">
                <div class="my-1">
                    @error('secOne_title_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <input
                        type="text"
                        name="secOne_title_ar"
                        id="secOne_title_ar"
                        maxlength="255"
                        class="form-control
                        @error('secOne_title_ar') border border-solid border-danger  @enderror"
                        value="{{ $project->secOne_title_ar }}"
                    >
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Project Background Description (AR)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secOne_description_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secOne_description_ar" id="secOne_description_ar" class="form-control w-100" rows="5">{{ $project->SecOne_description_ar }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Features Heading (AR)</label>
            <div class="w-100 ">
                <div class="my-1">
                    @error('secTwo_title_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <input
                        type="text"
                        name="secTwo_title_ar"
                        id="secTwo_title_ar"
                        maxlength="255"
                        class="form-control
                        @error('secTwo_title_ar') border border-solid border-danger  @enderror"
                        value="{{ $project->secTwo_title_ar }}"
                    >
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Features Description (AR)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secTwo_description_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secTwo_description_ar" id="secTwo_description_ar" class="form-control w-100" rows="5">{{ $project->SecTwo_description_ar }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Amenity List (AR)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secTwo_amenities_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secTwo_amenities_ar" id="secTwo_amenities_ar" class="form-control w-100 textareablock" rows="5">{{ $project->SecTwo_amenities_ar }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Location heading (AR)</label>
            <div class="w-100 ">
                <div class="my-1">
                    @error('secThree_title_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <input
                        type="text"
                        name="secThree_title_ar"
                        id="secThree_title_ar"
                        maxlength="255"
                        class="form-control
                        @error('secThree_title_ar') sborder border-solid border-danger  @enderror"
                        value="{{ $project->secThree_title_ar }}"
                    >
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="basicpill-meta_title-input">Location Description (AR)</label>
            <div class="w-100 ">
                <div class="my-2">
                    @error('secThree_description_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="secThree_description_ar" id="secThree_description_ar" class="form-control w-100" rows="5">{{ $project->SecThree_description_ar }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>