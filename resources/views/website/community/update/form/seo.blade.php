

<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_title">Meta Title &#40;<span id="meta_title_en_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_title"
                maxlength="60"
                id="meta_title"
                value="{{ $resources->meta_title }}"
                {{-- placeholder="Apartment For Sale In Address Harbour Point | Dubai Creek Harbour" --}}
                class="form-control @error('meta_title') border border-solid border-danger  @enderror"
            >
            @error('meta_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>


<div class="row mt-5">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_description">Meta Description &#40;<span id="meta_description_en_chars">255</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_description"
                maxlength="60"
                id="meta_description"
                value="{{ $resources->meta_description }}"
                {{-- placeholder="Apartment for sale in Address Harbour Point By Emaar. An iconic luxury apartment located in Dubai Creek Harbour with luxurious amenities and contemporary finishes" --}}
                class="form-control @error('meta_description') border border-solid border-danger  @enderror"
            >
            @error('meta_description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_keywords">Meta Keywords &#40;<span id="meta_keywords_en_chars">155</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_keywords"
                maxlength="60"
                id="meta_keywords"
                value="{{ $resources->meta_keywords }}"
                {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                class="form-control @error('meta_keywords') border border-solid border-danger  @enderror"
            >
            @error('meta_keywords')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
















<div class="row  mt-5">

    <div class="col-md-12">
        <div class="mb-3">
            <label class="text-primary" for="meta_title_ar">Meta Title Ar &#40;<span id="meta_title_en_chars_ar">60</span> characters remaining &#41;</label>
            <input
                dir="rtl"
                type="text"
                name="meta_title_ar"
                maxlength="60"
                id="meta_title_ar"
                value="{{ $resources->meta_title_ar }}"
                {{-- placeholder="Apartment For Sale In Address Harbour Point | Dubai Creek Harbour" --}}
                class="form-control @error('meta_title_ar') border border-solid border-danger  @enderror"
            >
            @error('meta_title_ar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>


<div class="row mt-5">

    <div class="col-md-12">
        <div class="mb-3">
            <label class="text-primary" for="meta_description_ar">Meta Description Ar &#40;<span id="meta_description_en_chars_ar">255</span> characters remaining &#41;</label>
            <input
                dir="rtl"
                type="text"
                name="meta_description_ar"
                maxlength="60"
                id="meta_description_ar"
                value="{{ $resources->meta_description_ar }}"
                {{-- placeholder="Apartment for sale in Address Harbour Point By Emaar. An iconic luxury apartment located in Dubai Creek Harbour with luxurious amenities and contemporary finishes" --}}
                class="form-control @error('meta_description_ar') border border-solid border-danger  @enderror"
            >
            @error('meta_description_ar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label class="text-primary" for="meta_keywords_ar">Meta Keywords Ar &#40;<span id="meta_keywords_en_chars_ar">155</span> characters remaining &#41;</label>
            <input
                dir="rtl"
                type="text"
                name="meta_keywords_ar"
                maxlength="60"
                id="meta_keywords_ar"
                value="{{ $resources->meta_keywords_ar }}"
                {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                class="form-control @error('meta_keywords_ar') border border-solid border-danger  @enderror"
            >
            @error('meta_keywords_ar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

