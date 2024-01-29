<div class="row">
    <div class="col-md-6">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Thumbnail
            </label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control p-1 @error('thumbnail') border border-solid border-danger  @enderror" accept="image/png, image/jpeg, image/jpg,   image/webp, image/avif">
            <span class=" font-size-10">Format: JPG, WEBP  |  Resolution: 640p x 480p  |  File Size: below 100kb</span>
            @error('thumbnail')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Logo
            </label>
            <input type="file" name="logo" id="logo" class="form-control p-1 @error('logo') border border-solid border-danger  @enderror" accept="image/png, image/jpeg, image/jpg,   image/webp, image/avif">
            <span class=" font-size-10">Format: JPG, WEBP  |  Resolution: 640p x 480p  |  File Size: below 100kb</span>
            @error('logo')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    
</div>

<div class="row">
    <div class="col-md-6">
        <div class="fallback w-full mx-auto my-4">
            <label class="form-label">
                Background Header Image
            </label>
            <input type="file" name="header" id="header" class="form-control p-1 @error('header') border border-solid border-danger  @enderror" accept="image/png, image/jpeg, image/jpg,   image/webp, image/avif">
            <span class=" font-size-10">Format: JPG, WEBP  |  Resolution: 1920p x 1080p  |  File Size: below 400kb</span>
            @error('header')
                <div class="text-danger font-size-10">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>