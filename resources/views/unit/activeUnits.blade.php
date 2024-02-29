<style>
    #dropdown-menu-duplicate-unit.show {
        left: auto !important;
        right: auto !important;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <h3 class="mb-1">
                                        @if($project_unit == '1')
                                            <i class="bx bx-briefcase text-dark font-size-24"></i> Units of {{$project->name}}
                                        @elseif($project_unit == '0')
                                            <i class="bx bx-briefcase text-dark font-size-24"></i> Units
                                        @endif
                                    </h3>
                                    <p class="mb-0 text-justify text-muted">
                                        Units are an essential concept in real estate transactions, management, and development.
                                        They are bought, sold, rented, or leased by individuals or businesses, making them an integral
                                        part of the real estate market. Each unit may have its own specific features, size, layout,
                                        and amenities, contributing to its value and appeal to potential occupants or investors.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row mx-auto text-center">
                                <div class="col-4">
                                    <div>
                                        <a
                                            @if($project_unit == '1')
                                                href="{{ route('project.units.active', ['id' => $project_id]) }}"
                                            @elseif($project_unit == '0')
                                                href="{{ route('units.index') }}"
                                            @endif
                                            class="btn btn-sm btn-outline-dark text-truncate mb-2">Active Units</a>
                                        <h5 class="mb-0">{{$count_active}}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <a
                                            @if($project_unit == '1')
                                                href="{{ route('project.units.draft', ['id' => $project_id]) }}"
                                            @elseif($project_unit == '0')
                                                href="{{ route('units.drafts') }}"
                                            @endif
                                            class="btn btn-sm btn-outline-dark text-truncate mb-2">Drafts Units</a>
                                        <h5 class="mb-0">{{$count_draft}}</h5>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div>
                                        <a
                                            @if($project_unit == '1')
                                                href="{{ route('project.units.booked', ['id' => $project_id]) }}"
                                            @elseif($project_unit == '0')
                                                href="{{ route('units.booked') }}"
                                            @endif
                                            class="btn btn-sm btn-outline-dark text-truncate mb-2">Booked Units</a>
                                        
                                    </div>
                                </div>
                                {{-- <div class="col-4">
                                    <div>
                                        <a
                                            @if($project_unit == '1')
                                                href="{{ route('project.units.trash', ['id' => $project_id]) }}"
                                            @elseif($project_unit == '0')
                                                href="{{ route('units.trash') }}"
                                            @endif
                                            class="btn btn-sm btn-outline-dark text-truncate mb-2">Trash Units</a>
                                        <h5 class="mb-0">{{$count_trash}}</h5>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 d-none d-lg-block my-auto">
                        <div class="clearfix mt-4 mt-lg-0 my-auto">
                            <div class="my-auto float-right mx-1">
                                <a href="{{ route('units.create') }}" class="btn btn-dark">
                                    <i class="bx bx-bookmark-plus mr-2"></i>Add Unit
                                </a>
                            </div>
                            <div class="my-auto float-right mx-1">
                                <a class="dropdown-toggle btn btn-outline-dark" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-duplicate mr-2"></i>Duplicate Unit
                                </a>

                                <div class="dropdown-menu" id="dropdown-menu-duplicate-unit" aria-labelledby="dropdownMenuButton">
                                    @if(!isset($count_status))
                                        @if($units->count() > 0)
                                            @foreach($units as $data)
                                                <a class="dropdown-item" href="{{ url('unit-duplicate/'.$data->id) }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                            @endforeach
                                        @else
                                            <span class="px-3 text-muted">No units found</span>
                                        @endif
                                    @else
                                        <span class="px-3 text-muted">No units found</span>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
