<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="text-muted">Booking Application</h3>
        <nav aria-label="breadcrumb " >
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a>project selection</a></li>
                <li class="breadcrumb-item"><a>unit selection</a></li>
                <li class="breadcrumb-item"><a>client details</a></li>
                <li class="breadcrumb-item"><a>client documents</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form class="contact-form" method="POST" action="{{ route('bookings.store.form2') }}" enctype="multipart/form-data">
        @csrf
        {{-- @method('PATCH') --}}

            <input type="hidden" name="client_id" value="{{$client_id}}">
            <input type="hidden" name="booking_id" value="{{$request->booking_id}}">
            <input type="hidden" name="unit_id" value="{{$request->unit_id}}">

            <div class="row">
                <div class="card-body px-3">
                    <h4 class="text-muted">
                        Client Documents
                    </h4>
                    <p class="text-muted">Gathering documents on clients is a fundamental aspect of client management for businesses, professionals, and service providers across various industries. This process involves the systematic collection and organization of relevant documents and information pertaining to individual or corporate clients.</p>
                    <table class="text-muted">
                        <tr>
                            <td style="width: 200px">Accepted File Type</td>
                            <td> : PDF, JPG, JPEG, PNG, WEBP</td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Max Size Per File</td>
                            <td> : 10 MB</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr class="my-2">

            <div class="mb-3 mx-auto ">


                <div class="row">
                    <div class="col-md-6">
                        <div class="fallback w-full mx-auto my-4">
                            <label class="form-label">
                                Emirates ID (front & back)
                            </label>
                            <input
                                type="text"
                                id="eid"
                                name="eid"
                                placeholder="Emirates ID"
                                class="form-control @error('eid') border border-solid border-danger  @enderror"

                                value="Emirates ID"
                            >
                            <span class="text-muted font-size-10">Provide a name to refer the brochures you can use to link to any projects</span>
                            @error('eid')
                                <div class="text-danger font-size-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="fallback w-full mx-auto my-4">
                            <label class="form-label">
                                Multiple Files
                            </label>
                            <input type="file" name="eids[]" multiple class="form-control p-1 @error('eids') border border-solid border-danger  @enderror" accept="application/pdf, image/png, image/jpeg,, image/jpg,   image/webp, image/avif">
                            <span class="text-muted font-size-10">You may choose multiple files if you wish to upload.</span>
                            @error('eids')
                                <div class="text-danger font-size-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="fallback w-full mx-auto my-4">
                            <label class="form-label">
                                Passport
                            </label>
                            <input
                                type="text"
                                id="passport"
                                name="passport"
                                placeholder="Passport"
                                class="form-control @error('passport') border border-solid border-danger  @enderror"

                                value="Passport"
                            >
                            <span class="text-muted font-size-10">Provide a name to refer the brochures you can use to link to any projects</span>
                            @error('passport')
                                <div class="text-danger font-size-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="fallback w-full mx-auto my-4">
                            <label class="form-label">
                                Multiple Files
                            </label>
                            <input type="file" name="passports[]" multiple class="form-control p-1 @error('passports') border border-solid border-danger  @enderror" accept="application/pdf, image/png, image/jpeg, image/jpg, image/webp, image/avif">
                            <span class="text-muted font-size-10">You may choose multiple files if you wish to upload.</span>
                            @error('passports')
                                <div class="text-danger font-size-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="fallback w-full mx-auto my-4">
                            <label class="form-label">
                                VISA
                            </label>
                            <input
                                type="text"
                                id="visa"
                                name="visa"
                                placeholder="VISA"
                                class="form-control @error('visa') border border-solid border-danger  @enderror"

                                value="VISA"
                            >
                            <span class="text-muted font-size-10">Provide a name to refer the brochures you can use to link to any projects</span>
                            @error('visa')
                                <div class="text-danger font-size-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="fallback w-full mx-auto my-4">
                            <label class="form-label">
                                Multiple Files
                            </label>
                            <input type="file" name="visas[]" multiple class="form-control p-1 @error('visas') border border-solid border-danger  @enderror" accept="application/pdf, image/png, image/jpeg, image/jpg, image/webp, image/avif">
                            <span class="text-muted font-size-10">You may choose multiple files if you wish to upload.</span>
                            @error('visas')
                                <div class="text-danger font-size-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 float-right">
                    <button type="submit" class="btn btn-dark btn-block float-right">Next</button>
                </div>
            </div>


        </form>

    </div>
    <!-- end card body -->
</div>
