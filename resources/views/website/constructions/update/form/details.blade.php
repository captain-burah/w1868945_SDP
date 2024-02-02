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


<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-meta_title-input">Description (EN)</label>
            <div class="w-100 ">
                <div class="my-4">
                    @error('description')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="description" id="description" class="w-100">{{ $resources->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-meta_title-input">Description (AR)</label>
            <div class="w-100 ">
                <div class="my-4">
                    @error('description_ar')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="description_ar" id="description_ar" class="w-100">{{ $resources->description_ar }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>