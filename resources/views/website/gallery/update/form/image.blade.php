
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




<div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Videos
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
</div>


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
                            <img src="{{ asset('uploads/blogs/'.$resources->id.'/thumbnail/'.$resources->thumbnail) }}" width="100%" height="200">
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
