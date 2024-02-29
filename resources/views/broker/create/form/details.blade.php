<div class="row">

    <div class="col-md-12">
        <div class="mb-3 mx-auto ">
            <label class="form-label font-bold">REQUIREMENTS</label>
            <table>
                <tr>
                    <td style="width: 200px">Accepted File Type</td>
                    <td> : Any</td>
                </tr>
                <tr>
                    <td style="width: 200px">Max Size Per File</td>
                    <td> : 400 kB</td>
                </tr>
            </table>

            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="fallback w-full mx-auto my-4">
                        <label class="form-label">
                            Multiple File Uploader
                        </label>
                        <input type="file" name="files[]" id="inputFile" multiple class="form-control p-1 @error('files') border border-solid border-danger  @enderror" >
                        <span class="text-muted font-size-10">You may choose multiple files if you wish to upload.</span>
                        @error('files')
                            <div class="text-danger font-size-10">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

