

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




<div class="row mt-4">

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
