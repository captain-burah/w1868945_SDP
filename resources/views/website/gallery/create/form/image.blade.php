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
                <td> : 200 Kb</td>
            </tr>
        </table>

        <div class="col-md-6px-0">
            <div class="fallback w-full mx-auto my-4">
                <label class="form-label">
                    Multiple File Uploader
                </label>
                <input type="file" name="image_files[]" id="inputFile" multiple class="form-control p-1 @error('image_files') border border-solid border-danger  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
                <span class="text-muted font-size-10">You may choose multiple files if you wish to upload.</span>
                @error('image_files')
                    <div class="text-danger font-size-10">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div>





<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 01
            </label>
            <input
                type="text"
                name="video_link1"
                placeholder="Video Link"
                id="video_link1"

                class="form-control
                @error('video_link1') border border-solid border-danger  @enderror"
                value="{{ old('video_link1') }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 02
            </label>
            <input
                type="text"
                name="video_link2"
                placeholder="Video Link"
                id="video_link2"

                class="form-control
                @error('video_link2') border border-solid border-danger  @enderror"
                value="{{ old('video_link2') }}"
            >
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 03
            </label>
            <input
                type="text"
                name="video_link3"
                placeholder="Video Link"
                id="video_link3"

                class="form-control
                @error('video_link3') border border-solid border-danger  @enderror"
                value="{{ old('video_link3') }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 04
            </label>
            <input
                type="text"
                name="video_link4"
                placeholder="Video Link"
                id="video_link4"

                class="form-control
                @error('video_link4') border border-solid border-danger  @enderror"
                value="{{ old('video_link4') }}"
            >
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 05
            </label>
            <input
                type="text"
                name="video_link5"
                placeholder="Video Link"
                id="video_link5"

                class="form-control
                @error('video_link5') border border-solid border-danger  @enderror"
                value="{{ old('video_link5') }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 06
            </label>
            <input
                type="text"
                name="video_link6"
                placeholder="Video Link"
                id="video_link6"

                class="form-control
                @error('video_link6') border border-solid border-danger  @enderror"
                value="{{ old('video_link6') }}"
            >
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 07
            </label>
            <input
                type="text"
                name="video_link7"
                placeholder="Video Link"
                id="video_link7"

                class="form-control
                @error('video_link7') border border-solid border-danger  @enderror"
                value="{{ old('video_link7') }}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">
                Video 08
            </label>
            <input
                type="text"
                name="video_link8"
                placeholder="Video Link"
                id="video_link8"

                class="form-control
                @error('video_link8') border border-solid border-danger  @enderror"
                value="{{ old('video_link8') }}"
            >
        </div>
    </div>
</div>





{{-- <div class="row">
    <div class="mb-3 col-12">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Video File
            </label>
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
            <input type="file" name="thumbnails[]" id="inputFile" multiple class="form-control p-1 @error('thumbnails') border border-solid border-danger w-100  @enderror" accept="image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
            <span class="text-muted font-size-10">Upload only one image | 400px X 400px | < 100 kb</span>
            @error('thumbnails')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
