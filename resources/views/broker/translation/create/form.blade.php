<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Translation Segmenting</h3>

        <div class="my-4">
            <form class="contact-form" action="{{ route('project-translation.store')  }}" method="POST" enctype="multipart/form-data" id="dropzone"
            >
                @csrf
                <div class="flex-none w-100 my-4 ">
                    <a href="{{ route('project-translation.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                        <i class="bx bx-arrow-back"></i>
                        Back
                    </a>
                    <button
                        type="submit"
                        class="btn btn-sm btn-dark my-auto">
                        Submit to Draft
                    </button>
                </div>

                <div class="flex flex-wrap h-full my-auto" >


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @csrf

                    <div class="mb-3 mx-auto ">

                        <div class="row">
                            <div class="col-md-12">
                                <div data-select2-id="15">
                                    <label class="form-label text-muted">Language</label>
                                    <select
                                        class="form-control select2-search-disable select2-hidden-accessible
                                        @error('language_id') border border-solid border-danger  @enderror"
                                        data-select2-id="basicpill-language_id-input"
                                        tabindex="-1"
                                        aria-hidden="false"
                                        name="language_id"
                                    >
                                        <option selected value="">Choose ...</option>
                                        @if(isset($languages))
                                            @foreach($languages as $data)
                                                <option value="{{$data->id}}">{{ $data->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('language_id')
                                        <div class="text-danger text-xs">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div data-select2-id="15">
                                    <label class="form-label text-muted">Project</label>
                                    <select
                                        class="form-control select2-search-disable select2-hidden-accessible
                                        @error('project_id') border border-solid border-danger  @enderror"
                                        data-select2-id="basicpill-project_id-input"
                                        tabindex="-1"
                                        aria-hidden="false"
                                        name="project_id"
                                    >
                                        <option selected value="">Choose ...</option>
                                        @if(isset($projects))
                                            @foreach($projects as $data)
                                                <option value="{{$data->id}}">{{ $data->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('project_id')
                                        <div class="text-danger text-xs">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="basicpill-title-input">Title &#40;<span id="property_title_chars">60</span> characters remaining &#41;</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="property_title"
                                        maxlength="60"

                                        class="form-control
                                        @error('name') border border-solid border-danger  @enderror"
                                        value="{{ old('name') }}"
                                    >
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="ownership">Project Ownership</label>
                                    <input
                                        type="text"
                                        name="ownership"
                                        class="form-control
                                        @error('ownership') border border-solid border-danger  @enderror"
                                        id="basicpill-ownership-input"
                                        placeholder="Freehold / Leasehold / Fractional"
                                        value="{{ old('ownership') }}"
                                    >
                                    @error('ownership')
                                        <div class="text-danger text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="basicpill-meta_title-input">Description (EN)</label>
                                    <div class="w-100 ">
                                        <div class="my-4">
                                            @error('description')
                                                <div class="text-danger text-xs" >{{ $message }}</div>
                                            @enderror
                                            <textarea name="description" id="description" class="w-100">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="meta_title">Meta Title &#40;<span id="meta_title_en_chars">60</span> characters remaining &#41;</label>
                                    <input
                                        type="text"
                                        name="meta_title"
                                        maxlength="60"
                                        id="meta_title"
                                        value="{{ old('meta_title') }}"
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
                                        value="{{ old('meta_description') }}"
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
                                        value="{{ old('meta_keywords') }}"
                                        {{-- placeholder="apartment for sale in address harbour point, 2 bedroom apartment for sale in dubai creek harbour" --}}
                                        class="form-control @error('meta_keywords') border border-solid border-danger  @enderror"
                                    >
                                    @error('meta_keywords')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end card body -->
</div>
