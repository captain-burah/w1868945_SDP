<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Video Segmenting</h3>
        <p class="mb-0 text-justify text-muted">
            Real estate is not just about properties; it's about turning dreams into addresses
        </p>



        <div class="my-4">
            <form class="contact-form" action="{{ route('project-video.store')  }}" method="POST" enctype="multipart/form-data" id="dropzone"
            >
                @csrf
                <div class="flex-none w-100 my-4 ">
                    <a href="{{ route('project-video.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
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
                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Segment Name
                                    </label>
                                    <input
                                        type="text"
                                        id="segment_name"
                                        name="segment_name"
                                        {{-- placeholder="Riveira - Arabic" --}}
                                        class="form-control @error('segment_name') border border-solid border-danger  @enderror"

                                        value="{{ old('segment_name')}}"
                                    >
                                    <span class="text-muted font-size-10">Provide a name to refer the brochures you can use to link to any projects</span>
                                    @error('segment_name')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Video File
                                    </label>
                                    <input type="text" name="video1" id="inputVideo1"  class="form-control p-1 @error('video1') border border-solid border-danger  @enderror">
                                    <span class="text-muted font-size-10">Paste the link of the video once uploaded to YouTube with restricted privileges</span>
                                    @error('files')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Video File
                                    </label>
                                    <input type="text" name="video2" id="inputVideo2"  class="form-control p-1 @error('video2') border border-solid border-danger  @enderror">
                                    <span class="text-muted font-size-10">Paste the link of the video once uploaded to YouTube with restricted privileges</span>
                                    @error('files')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Video File
                                    </label>
                                    <input type="text" name="video3" id="inputVideo3"  class="form-control p-1 @error('video3') border border-solid border-danger  @enderror">
                                    <span class="text-muted font-size-10">Paste the link of the video once uploaded to YouTube with restricted privileges</span>
                                    @error('files')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Video File
                                    </label>
                                    <input type="text" name="video4" id="inputVideo4"  class="form-control p-1 @error('video4') border border-solid border-danger  @enderror">
                                    <span class="text-muted font-size-10">Paste the link of the video once uploaded to YouTube with restricted privileges</span>
                                    @error('files')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Video File
                                    </label>
                                    <input type="text" name="video5" id="inputVideo5"  class="form-control p-1 @error('video5') border border-solid border-danger  @enderror">
                                    <span class="text-muted font-size-10">Paste the link of the video once uploaded to YouTube with restricted privileges</span>
                                    @error('files')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
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
