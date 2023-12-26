<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="text-muted">Booking Application</h3>
        <nav aria-label="breadcrumb " >
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a>project selection</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">


            <label class="form-label">Project Selection</label>
            <hr class="my-3">

            <div class="row y-2">
                @foreach($projects as $data)
                    <div class="col-md-3 text-center my-2 ">
                        <form class="" method="post" action="{{ route('bookings.store.form0.projects') }}">
                        @csrf

                            <input type="hidden" name="project_id" value="{{$data->id}}">

                            <button type="submit" class="bg-white shadow-sm border-0 my-auto  w-100">
                                <div class="card my-auto mx-auto">
                                    <div class="card-body my-auto">
                                        {{ $data->name }}
                                    </div>
                                </div>
                            </button>

                        </form>
                    </div>
                @endforeach
            </div>




    </div>
    <!-- end card body -->
</div>

