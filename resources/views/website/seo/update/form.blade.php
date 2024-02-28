<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Update Landing Page SEO </h3>
        <p class="mb-0 text-justify text-muted">
            When you embark on a new real estate project, you're not just building structures; you're creating opportunities, shaping communities, and crafting dreams into reality.
        </p>


        <form class="contact-form" id="getInTouch" method="post" action="{{ route('landingpageseos.update', ['landingpageseo' => $resources->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('landingpageseos.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>
                <button
                    type="submit"
                    class="btn btn-sm btn-dark my-auto">
                    Submit
                </button>
            </div>


            <div class="row mt-5">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="page">Page Name</label>
                        <input
                            type="page"
                            name="page"
                            id="page"
                            value="{{ $resources->page }}"
                            placeholder="Project Page"
                            class="form-control @error('page') border border-solid border-danger  @enderror"
                        >
                        @error('page')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>




            <div class="row mt-5">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="meta_title">Meta Title &#40;<span id="meta_title_en_chars">60</span> characters remaining &#41;</label>
                        <input
                            type="text"
                            name="title_en"
                            maxlength="60"
                            id="meta_title"
                            value="{{ $resources->title_en }}"
                            {{-- placeholder="Apartment For Sale In Address Harbour Point | Dubai Creek Harbour" --}}
                            class="form-control @error('title_en') border border-solid border-danger  @enderror"
                        >
                        @error('title_en')
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
                            name="description_en"
                            maxlength="255"
                            id="meta_description"
                            value="{{ $resources->description_en }}"
                            {{-- placeholder="Apartment for sale in Address Harbour Point By Emaar. An iconic luxury apartment located in Dubai Creek Harbour with luxurious amenities and contemporary finishes" --}}
                            class="form-control @error('description_en') border border-solid border-danger  @enderror"
                        >
                        @error('description_en')
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
                            name="keywords_en"
                            maxlength="155"
                            id="meta_keywords"
                            value="{{ $resources->keywords_en }}"
                            {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                            class="form-control @error('keywords_en') border border-solid border-danger  @enderror"
                        >
                        @error('keywords_en')
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
                            name="title_ar"
                            maxlength="60"
                            id="meta_title_ar"
                            value="{{ $resources->title_ar }}"
                            {{-- placeholder="Apartment For Sale In Address Harbour Point | Dubai Creek Harbour" --}}
                            class="form-control @error('title_ar') border border-solid border-danger  @enderror"
                        >
                        @error('title_ar')
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
                            name="description_ar"
                            maxlength="255"
                            id="meta_description_ar"
                            value="{{ $resources->description_ar }}"
                            {{-- placeholder="Apartment for sale in Address Harbour Point By Emaar. An iconic luxury apartment located in Dubai Creek Harbour with luxurious amenities and contemporary finishes" --}}
                            class="form-control @error('description_ar') border border-solid border-danger  @enderror"
                        >
                        @error('description_ar')
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
                            name="keywords_ar"
                            maxlength="155"
                            id="meta_keywords_ar"
                            value="{{ $resources->keywords_ar }}"
                            {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                            class="form-control @error('keywords_ar') border border-solid border-danger  @enderror"
                        >
                        @error('keywords_ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>


        </form>

    </div>
    <!-- end card body -->
</div>
