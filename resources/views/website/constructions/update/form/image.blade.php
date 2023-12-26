<div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Images
            </label>

            <div class="row p-4">
                @if(isset($image))
                @foreach($resources->website_construction_images as $data)
                    <div class="grid grid-rows-3 grid-flow-col gap-4">
                        <div class="inline-block align-baseline my-4 text-center">
                            <a href="{{ url('community-destroy/'.$data->id) }}" class="btn btn-outline-dark btn-sm">
                                Delete
                            </a>
                        </div>
                        <div class="">
                            <img src="{{ asset('uploads/construction/'.$resources->id.'/images/'.$data->name) }}" width="100%" height="200">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="m-4">

                        </div>
                    </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>
</div>







<div class="row">
    <div class="mb-3 col-12">
        <label class="form-label font-bold">REQUIREMENTS</label>
        <table>
            <tr>
                <td style="width: 200px">Accepted File Type</td>
                <td> : .webp</td>
            </tr>
            <tr>
                <td style="width: 200px">Max File Size</td>
                <td> : 400 Kb</td>
            </tr>
        </table>

        <div class="col-md-6">
            <div class="fallback w-full mx-auto my-4">
                <label class="form-label">
                    Multiple File Uploader
                </label>
                <input type="file" name="files[]" id="inputFile" multiple class="form-control p-1 @error('files') border border-solid border-danger  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
                <span class="text-muted font-size-10">You may choose multiple files if you wish to upload.</span>
                @error('files')
                    <div class="text-danger font-size-10">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div>



<div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Header Image
            </label>
            <input type="file" name="header_images[]" id="inputFile" multiple class="form-control p-1 @error('header_images') border border-solid border-danger w-100  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
            <span class="text-muted font-size-10">Upload only one image</span>
            @error('header_images')
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
            <input type="file" name="thumbnails[]" id="inputFile" multiple class="form-control p-1 @error('thumbnails') border border-solid border-danger w-100  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
            <span class="text-muted font-size-10">Upload only one image</span>
            @error('thumbnails')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

