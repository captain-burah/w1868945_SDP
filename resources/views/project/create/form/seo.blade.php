

<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_title_en">Meta Title EN &#40;<span id="meta_title_en_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_title_en"
                maxlength="60"
                id="meta_title_en"
                value="{{ old('meta_title_en') }}"
                {{-- placeholder="Apartment For Sale In Address Harbour Point | Dubai Creek Harbour" --}}
                class="form-control @error('meta_title_en') border border-solid border-danger  @enderror"
            >
            @error('meta_title_en')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
<div class="row" dir="rtl">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_title_ar">Meta Title AR &#40;<span id="meta_title_en_chars">60</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_title_ar"
                maxlength="60"
                id="meta_title_ar"
                value="{{ old('meta_title_ar') }}"
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
            <label for="meta_description_en">Meta Description En &#40;<span id="meta_description_en_chars">255</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_description_en"
                maxlength="60"
                id="meta_description_en"
                value="{{ old('meta_description_en') }}"
                {{-- placeholder="Apartment for sale in Address Harbour Point By Emaar. An iconic luxury apartment located in Dubai Creek Harbour with luxurious amenities and contemporary finishes" --}}
                class="form-control @error('meta_description_en') border border-solid border-danger  @enderror"
            >
            @error('meta_description_en')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

<div class="row mt-2" dir="rtl">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_description_ar">Meta Description Ar &#40;<span id="meta_description_en_chars">255</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_description_ar"
                maxlength="60"
                id="meta_description_ar"
                value="{{ old('meta_description_ar') }}"
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
            <label for="meta_keywords_en">Meta Keywords En &#40;<span id="meta_keywords_en_chars">155</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_keywords_en"
                maxlength="60"
                id="meta_keywords_en"
                value="{{ old('meta_keywords_en') }}"
                {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                class="form-control @error('meta_keywords_en') border border-solid border-danger  @enderror"
            >
            @error('meta_keywords_en')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

<div class="row mt-2" dir="rtl">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="meta_keywords_ar">Meta Keywords Ar &#40;<span id="meta_keywords_en_chars">155</span> characters remaining &#41;</label>
            <input
                type="text"
                name="meta_keywords_ar"
                maxlength="60"
                id="meta_keywords_ar"
                value="{{ old('meta_keywords_ar') }}"
                {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                class="form-control @error('meta_keywords_ar') border border-solid border-danger  @enderror"
            >
            @error('meta_keywords_ar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

