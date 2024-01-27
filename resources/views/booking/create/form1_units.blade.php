<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="text-muted">Booking Application</h3>
        <nav aria-label="breadcrumb " >
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a>project selection</a></li>
                <li class="breadcrumb-item"><a>unit selection</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">


            <label class="form-label">Unit Selection</label>
            <hr class="my-3">


            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Unit Name</th>
                                <th>Project Name</th>
                                <th>Area</th>
                                <th>Bedrooms</th>
                                <th>Bathrooms</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($units as $data)
                                <tr>
                                    <form class="" method="post" action="{{ route('bookings.store.form0.units') }}">
                                        @csrf
                                        <input type="hidden" value="{{$data->id}}" name="unit_id">
                                        <input type="hidden" value="{{$project->id}}" name="project_id">
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $data->unit_size_range }}</td>
                                        <td>{{ $data->bedroom }}</td>
                                        <td>{{ $data->bathroom }}</td>
                                        <td>{{ $data->unit_price }}</td>
                                        <td>
                                            <button type="submit" class="btn rounded-0 btn-outline-dark btn-sm">
                                                Select
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- <div class="row y-2">
                @foreach($units as $data)
                    <div class="col-md-3 text-center my-2 ">
                        <form class="" method="post" action="{{ route('bookings.store.form0.units') }}">
                        @csrf

                            <input type="hidden" name="unit_id" value="{{$data->id}}">
                            <input type="hidden" name="project_id" value="{{$request->project_id}}">

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
            </div> --}}




    </div>
    <!-- end card body -->
</div>

