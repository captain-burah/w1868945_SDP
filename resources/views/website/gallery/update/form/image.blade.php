
<div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Images
            </label>
            <div class="row p-4">
                @if(isset($image))
                    @foreach($resources->website_gallery_medias as $data)
                        @if($data->type == 'image')
                        <div class="grid grid-rows-3 grid-flow-col gap-4">
                            <div class="inline-block align-baseline my-4 text-center">
                                <a href="{{ url('website-gallery-media-destroy/'.$data->id) }}" class="btn btn-outline-dark btn-sm">
                                    Delete
                                </a>
                            </div>
                            <div class="">
                                <img src="{{ asset('uploads/gallery/'.$resources->id.'/images/'.$data->name) }}" width="100%" height="200">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="m-4">

                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <input type="file" name="image_files[]" id="inputFile" multiple class="form-control p-1 @error('image_files') border border-solid border-danger w-100  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
            <span class="text-muted font-size-10">Upload only one image | 1920px X 1080p | < 300 kb</span>
            @error('image_files')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


<style>
    iframe{
        width: 100% !important;
    }
</style>
<div class="row">
    @foreach($resources->website_gallery_medias as $data)
        @if($data->type == 'video')
            <div class="col-md-6 mb-4">
                <div class="inline-block align-baseline my-2 text-center">
                    <a href="{{ url('website-gallery-media-destroy/'.$data->id) }}" class="btn btn-outline-dark btn-sm btn-block">
                        Delete
                    </a>
                </div>
                <div class="">
                    {!!$data->name!!}
                </div>
            </div>  
        @endif
    @endforeach
</div>


<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link1"
                placeholder="Video Link"
                id="video_link1"

                class="form-control
                @error('video_link1') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link1 }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link2"
                placeholder="Video Link"
                id="video_link2"

                class="form-control
                @error('video_link2') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link2 }}"
            >
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link3"
                placeholder="Video Link"
                id="video_link3"

                class="form-control
                @error('video_link3') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link3 }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link4"
                placeholder="Video Link"
                id="video_link4"

                class="form-control
                @error('video_link4') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link4 }}"
            >
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link5"
                placeholder="Video Link"
                id="video_link5"

                class="form-control
                @error('video_link5') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link5 }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link6"
                placeholder="Video Link"
                id="video_link6"

                class="form-control
                @error('video_link6') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link6 }}"
            >
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link7"
                placeholder="Video Link"
                id="video_link7"

                class="form-control
                @error('video_link7') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link7 }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video Link
            </label>
            <input
                type="text"
                name="video_link8"
                placeholder="Video Link"
                id="video_link8"

                class="form-control
                @error('video_link8') border border-solid border-danger  @enderror"
                value="{{ $resources->video_link8 }}"
            >
        </div>
    </div>
</div>



{{-- <div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Videos File
            </label>
            <div class="row p-4">
                @if(isset($image))
                    @foreach($resources->website_gallery_medias as $data)
                        @if($data->type == "video")
                        <div class="grid grid-rows-3 grid-flow-col gap-4">
                            <div class="inline-block align-baseline my-4 text-center">
                                <a href="{{ url('website-gallery-media-destroy/'.$data->id) }}" class="btn btn-outline-dark btn-sm">
                                    Delete
                                </a>
                            </div>
                            <div class="">
                                <video id="video" name="ESNAAD" playsinline="" preload="auto" autoplay="" muted="" loop="" data-setup="{" autoplay":"any"}"="" height="300px">
                                    <source src="{{ asset('uploads/gallery/'.$resources->id.'/videos/'.$data->name) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="m-4">

                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <input type="file" name="video_files[]" id="inputFile" multiple class="form-control p-1 @error('video_files') border border-solid border-danger w-100  @enderror" accept="video/mp4, video/x-m4v, video/*">
            <span class="text-muted font-size-10">Upload only one image | MP4 | < 30 MB</span>
            @error('video_files')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Thumbnail Image
            </label>
            <div class="row p-4">
                @if($resources->thumbnail != '')
                    <div class="grid grid-rows-3 grid-flow-col gap-4">
                        {{-- <div class="inline-block align-baseline my-4 text-center">
                            <a href="{{ url('website-blogs-image-destroy/'.$data->id) }}" class="btn btn-outline-dark btn-sm">
                                Delete
                            </a>
                        </div> --}}
                        <div class="">
                            <img src="{{ asset('uploads/gallery/'.$resources->id.'/thumbnail/'.$resources->thumbnail) }}" width="100%" height="200">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="m-4">

                        </div>
                    </div>
                @endif  
            </div>
            <input type="file" name="thumbnails[]" id="inputFile" multiple class="form-control p-1 @error('thumbnails') border border-solid border-danger w-100  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
            <span class="text-muted font-size-10">Upload only one image | 400px X 400px | < 100 kb</span>
            @error('thumbnails')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
