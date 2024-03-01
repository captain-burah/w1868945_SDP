<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead          { overflow: auto; height: 450px; }
    .tableFixHead thead { position: sticky; top: 0; z-index: 1; }

</style>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

<div class="card w-100">
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-grow-1 align-self-center">
                        <div class="text-muted">
                            <h3><i class="bx bx-area text-dark font-size-24"></i>Secondary Floor Plan Segments</h3>
                            <p class="card-title-desc">The table consists of all floor-plan segments created for units. This will be displayed only in the specific unit page.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block my-auto">
                <div class="clearfix mt-4 mt-lg-0 my-auto">
                    <div class="my-auto float-right">
                        <a href="{{ route('unit-secondary-floor-plan.create') }}" class="btn btn-dark">
                            <i class="bx bx-bookmark-plus mr-2"></i>Add New Segment
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive tableFixHead">
            <table class="table table-sm table-bordered table-hover mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Units Connected</th>
                        <th>Segment Name</th>
                        <th>Number of Files</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($count_status))
                        @foreach ($results as $data)
                            <tr>
                                <td scope="row">{{ $data->id }}</td>
                                <td>
                                    <div class="dropdown">
                                        @foreach($units as $unit)
                                            @if($unit->unit_floorplan_id == $data->id)
                                                <span>{{$unit->name}}, </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>

                                <td>{{$data->name}}</td>

                                <td>{{ $data->unit_floorplan_files()->count() }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            {{-- <a class="dropdown-item" href="{{ route('unit-floor-plan.edit', ['unit_floor_plan' => $data->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a> --}}
                                            <a class="dropdown-item" href="{{ route('unit-secondary-floorplan.destroy.segment', ['id' => $data->id]) }}"><i class="bx bx-trash text-danger"></i> &nbsp;Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- MODAL FOR PROJECTS --}}
                            <div class="modal fade" id="project-connect-{{$data->id}}" tabindex="-1" aria-labelledby="project-connect-modal-{{$data->id}}" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Units</h5>
                                            <button type="button" class="btn btn-outline-secondary p-1 px-2" data-dismiss="modal" aria-label="Close">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="contact-form" id="getInTouch" method="post" action="{{ route('unit-floorplan.connect') }}">
                                            @csrf
                                                <input name="floorplan_id" value="{{$data->id}}" hidden>
                                                <select
                                                    class="form-control select2-search-disable select2-hidden-accessible
                                                    @error('unit_id') border border-solid border-danger  @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="unit_id"
                                                >
                                                    <option selected value="">Choose ...</option>

                                                    @if(isset($units))
                                                        @foreach($units as $data)
                                                            <option selected value="{{$data->id}}">{{ $data->name }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>

                                                <div class="my-2 w-100 text-right">
                                                    <button class="btn btn-outline-dark text-right  ">
                                                        Connect
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-check-shield text-success" style="font-size: 20px"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Connect To Unit</a>
                                        <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Move to Draft</a>
                                        <a class="dropdown-item" href="#"><i class="bx bx-trash"></i> &nbsp; Move to Trash</a>
                                    </div>
                                </div>
                            </td>
                            <td>Business    </td>
                            <td>4</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('unit-brochures.edt', ['project-brochures', $data->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
</div>
