<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead { overflow: auto; height: 450px; }
    .tableFixHead thead { position: sticky; top: 0; z-index: 1; }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

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

@if( Auth::user()->roles[0]->name == "Developer")
    <div class="card w-100" style="min-height: 100vh">
        <div class="card-body">
            <h4 class="card-title">Active Units Table</h4>
            <p class="card-title-desc">The table consists of Active Units on the ESNAAD website</p>
            <div class="table-responsive">
                <table class="table table-bordered border-dark mb-0">

                    <thead>
                        <tr class="bg-dark text-white">
                            <th>#</th>
                            <th style="width: 100px;">Operation</th>
                            <th style="width: 100px;">Unit Status</th>
                            <th >Unit Reference</th>
                            <th style="width: 200px;">Price (AED)</th>
                            <th style="width: 150px;">Area</th>
                            <th style="width: 150px;">Bedrooms</th>
                            <th style="width: 150px;">Project Name</th>
                            <th style="width: 150px;">Floorplans</th>
                            <th style="width: 150px;">Booking Floorplans</th>
                            {{-- <th style="width: 150px;">Gallery</th> --}}
                            <th style="width: 150px;">Payment Plan</th>
                            <th style="width: 150px;">Sales Offer</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        @if(!isset($count_status))
                            @foreach($units as $key => $value)

                                <?php $status = $value->status; ?>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    
                                    {{-- OPERATION --}}
                                    <td class="d-inline-flex">
                                        <?php
                                            /**
                                             * UNIT STATES
                                             * 1 == ACTIVE
                                             * 2 == DRAFT
                                             * 3 == TRASH
                                            */
                                        ?>
                                        
                                        <a class="btn btn-sm btn-outline-light rounded " title="view details" href="{{ route('units.show', ['unit' => $value->id]) }}"><i class="bx bx-show-alt text-dark font-size-18"></i></a>

                                        <div class="dropdown mx-1">
                                            <a class="dropdown-toggle btn btn-sm btn-outline-light rounded dropdown-toggle" title="active/draft" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @if($value->status == '1')
                                                    <i class="bx bx-check-shield text-success font-size-18" ></i>
                                                @elseif($value->status == '2')
                                                    <i class="bx bx-cloud-download text-dark font-size-18" ></i>
                                                @else
                                                    <i class="bx bx-trash text-danger font-size-18" ></i>
                                                @endif
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if($value->status == '1')
                                                    <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                    <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                    <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                                @elseif($value->status == 2)
                                                    <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                    <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                    <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                                @else
                                                    <a class="dropdown-item" title="Active/Draft" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                    <a class="dropdown-item" title="Active/Draft" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                    <a class="dropdown-item" title="Active/Draft" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                                @endif
                                            </div>
                                        </div>

                                        <a class="btn btn-sm btn-outline-light rounded" title="Edit Unit" href="{{ route('units.edit', ['unit' => $value->id]) }}"><i class="bx bx-edit text-dark font-size-18"></i></a>
                                        {{-- <a class="btn btn-sm btn-outline-light rounded" title="duplicate" href="{{ route('units.duplicate', ['id' => $value->id]) }}"><i class="bx bx-duplicate text-dark font-size-18"></i></a> --}}

                                        
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        <?php
                                            /**
                                             * UNIT STATES
                                             * 1 == LISTED
                                             * 2 == BOOKED
                                             * 3 == AMORTIZING
                                             * 4 == SOLD
                                             * 5 == RESALE
                                            */
                                        ?>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @if($value->state == '1')
                                                    <span class="bg-info text-white p-1">Listed</span>
                                                @elseif($value->state == '2')
                                                    <span class="bg-warning text-white p-1">Booked</span>                                                
                                                @elseif($value->state == '3')
                                                    <span class="bg-primary text-white p-1">Amortizing</span>                                         
                                                @elseif($value->state == '4')
                                                    <span class="bg-success text-white p-1">Sold</span>                                                                                               
                                                @elseif($value->state == '5')
                                                    <span class="bg-danger text-white p-1">Resale</span>                                                                                               
                                                @else
                                                    N/A
                                                @endif
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if($value->state == '1')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '2')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '3')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '4')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '5')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                @else
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ $value->name }}</td>

                                    <td>{{ number_format($value->unit_price, 1) }}</td>

                                    <td>{{ $value->unit_size_range }}</td>

                                    <td>{{ $value->bedroom }}</td>
                                    

                                    {{-- PROJECT --}}
                                    <td class="text-left">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"                                        >
                                                {{-- {{$value->project_id}} --}}
                                                @if($value->project != null)
                                                    @if($value->project->id == $value->project_id)
                                                        <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project->name }}
                                                    @else
                                                        <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                    @endif
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            </a>
                                            {{-- {{$projects}} --}}
                                            <div class="dropdown-menu w-100 " aria-labelledby="dropdownMenuButton">
                                                {{-- <button class="dropdown-item" data-toggle="modal" data-target="#project-brochure-connect"><i class="bx bx-plus-circle"></i> &nbsp;Add</button> --}}
                                                <a class="dropdown-item" href="{{ url('unit-project/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                                <hr class="my-2">
                                                <form class="contact-form px-3" id="getInTouch" method="post" action="{{ route('unit-project.connect') }}">
                                                @csrf
                                                    <input name="unit_id" value="{{$value->id}}" hidden>
                                                    <select
                                                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                        @error('project_id') border border-solid border-danger  @enderror"
                                                        data-select2-id="basicpill-status-input"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        name="project_id"
                                                        >
                                                        <option selected value="">Choose Segment...</option>

                                                        @if(isset($projects))
                                                            @foreach($projects as $data)
                                                                <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>

                                                    <div class="my-2 w-100 text-right">
                                                        <button class="btn btn-outline-dark btn-sm btn-block  ">
                                                            Connect
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </td>


                                    {{-- FLOOR PLANS --}}
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                @if($value->unit_floorplan_id != null)
                                                    <i class="bx bx-check-circle text-success " style="font-size: 18px"></i> {{ $value->unit_floorplan->name }}                                                    
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('unit/floorplan/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                                <hr class="my-2">
                                                <form class="contact-form px-3" method="post" action="{{ route('unit.connect.floorplan') }}">
                                                    @csrf
                                                    <input name="project_id" value="{{$value->id}}" hidden >
                                                    <input name="type" value="primary" hidden >
                                                    <select
                                                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                        @error('factsheet_id') border border-solid border-danger @enderror"
                                                        data-select2-id="basicpill-status-input"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        name="floorplan_id"
                                                        >
                                                        <option selected value="">Choose Segment</option>

                                                        @if(isset($floorplans))
                                                            @foreach($floorplans as $data)
                                                                @if($data->type == 'secondary')
                                                                @else
                                                                    <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                                @endif
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
                                        </div>
                                    </td>



                                    {{-- BOOKING FLOOR PLANS --}}
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @if($value->unit_secondary_floorplan_id != null)
                                                    <i class="bx bx-check-circle text-success " style="font-size: 18px"></i> {{ $value->unit_secondary_floorplan }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('unit/secondary-floorplan/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                                <hr class="my-2">
                                                <form class="contact-form px-3" method="post" action="{{ route('unit.connect.floorplan') }}">
                                                    @csrf
                                                    <input name="project_id" value="{{$value->id}}" hidden >
                                                    <input name="type" value="secondary" hidden >
                                                    <select
                                                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                        @error('factsheet_id') border border-solid border-danger @enderror"
                                                        data-select2-id="basicpill-status-input"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        name="floorplan_id"
                                                        >
                                                        <option selected value="">Choose Segment</option>

                                                        @if(isset($floorplans))
                                                            @foreach($floorplans as $data)
                                                                @if($data->type == 'secondary')
                                                                    <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                                @endif
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
                                        </div>
                                    </td>




                                    {{-- IMAGES --}}
                                    {{-- <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle my-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @if($value->unit_image != null)
                                                    @if($value->unit_image->unit_id == $value->id)
                                                        <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->unit_image->name }}
                                                    @else
                                                        <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                    @endif
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('unit/images/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                                <hr class="my-2">
                                                <form class="contact-form px-3" method="post" action="{{ route('unit.connect.image') }}">
                                                    @csrf
                                                    <input name="project_id" value="{{$value->id}}" hidden >
                                                    <select
                                                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                        @error('brochure_id') border border-solid border-danger @enderror"
                                                        data-select2-id="basicpill-status-input"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        name="image_id"
                                                        >
                                                        <option selected value="">Choose Segment</option>

                                                        @if(isset($images))
                                                            @foreach($images as $data)
                                                                <option  value="{{$data->id}}">{{ $data->name }}</option>
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
                                        </div>
                                    </td> --}}

                                    {{-- PAYMENT PLAN --}}
                                    <td>
                                        <a class="my-auto " type="button" id="dropdownMenuButton" data-toggle="modal" data-target="#ppModal-{{$value->id}}">
                                            @if($value->unit_paymentplan != null)
                                                View
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div id="ppModal-{{$value->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg"">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">Payment Plan: Unit {{$value->name}}</h5>
                                                        <button type="button" class="btn btn-white" data-dismiss="modal" aria-label="Close">X</button>
                                                    </div>
                                                    <div class="modal-header">
                                                        <table class="table "> 
                                                            <tr>
                                                                <th style="width: 0px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px; text-align:left">Installment</span>
                                                                </th>
                                                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Milestone</span>
                                                                </th>
                                                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Percentage</span>
                                                                </th>
                                                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Due Date</span>
                                                                </th>
                                                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Amount (AED)</span>
                                                                </th>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">1</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">Downpayment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">20%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">On Booking</span>
                                                                </td>
                                                                
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.2) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">2</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">1st Installment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">5%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">
                                                                        @foreach($units_paymentplans as $pp)
                                                                            @if($pp[0] == $value->id)
                                                                                @isset($pp[1])
                                                                                    {{$pp[1]}}
                                                                                @endisset
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.05) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">3</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">2nd Installment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">10%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">
                                                                        @foreach($units_paymentplans as $pp)
                                                                            @if($pp[0] == $value->id)
                                                                                @isset($pp[2])
                                                                                    {{$pp[2]}}
                                                                                @endisset
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.1) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">4</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">3rd Installment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">10%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">
                                                                        @foreach($units_paymentplans as $pp)
                                                                            @if($pp[0] == $value->id)
                                                                                @isset($pp[3])
                                                                                    {{$pp[3]}}
                                                                                @endisset
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.1) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">5</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">4th Installment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">5%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">
                                                                        @foreach($units_paymentplans as $pp)
                                                                            @if($pp[0] == $value->id)
                                                                                @isset($pp[4])
                                                                                    {{$pp[4]}}
                                                                                @endisset
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.05) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">6</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">5th Installment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">10%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">
                                                                        @foreach($units_paymentplans as $pp)
                                                                            @if($pp[0] == $value->id)
                                                                                @isset($pp[5])
                                                                                    {{$pp[5]}}
                                                                                @endisset
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.1) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">7</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">6th Installment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">10%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">
                                                                        @foreach($units_paymentplans as $pp)
                                                                            @if($pp[0] == $value->id)
                                                                                @isset($pp[6])
                                                                                    {{$pp[6]}}
                                                                                @endisset
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.1) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                            <tr>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">8</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">Final Payment</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">30%</span>
                                                                </td>
                            
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p">On Completion</span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format( $value->unit_price * 0.3) }}</span>
                                                                </td>
                                                            </tr>
                            
                            
                            
                            
                            
                                                            <tr>
                                                                <td style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                </td>
                                                                <td style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                </td>
                                                                <td style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                                                    <span class="body-table-p ">Purchase Price</span>
                                                                </td>
                                                                <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important; text-align:;">
                                                                    <span class="body-table-p" style="color: #095edb;">{{ number_format($value->unit_price) }}</span>
                                                                </td>
                                                            </tr>
                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- ACTION --}}
                                    <td>
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-light rounded" type="button">
                                                <a class="dropdown-item" href="{{ route('units.sales.offer', ['id' => $value->id]) }}" target="_blank"><i class="bx bx-spreadsheet text-dark"></i> &nbsp; Print</a>
                                            </button>
                                        </div> --}}
                                        <div>
                                            <button type="button" class="btn btn-sm btn-white rounded-0 waves-effect waves-light" data-toggle="modal" data-target="#myModal-{{$value->id}}"><i class="bx bx-spreadsheet text-dark"></i> &nbsp; Print</button>
                                            <div id="myModal-{{$value->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ url('/sales-offer-print')}}" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Date of Sales Offer</h5>
                                                                <button type="button" class="btn btn-white " data-dismiss="modal" aria-label="Close">X</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                <p>Please enter start date for Booking</p>
                                                                <input class="form-control" name="date" type="date" value="2024-03-01" min="2024-03-01" id="example-date-input">
                                                                <input type="hidden" name="unit" value="{{$value->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Proceed</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="bg-dark">
                                <td colspan='13' class="text-white">*** End of the Line ***</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan='13' class="text-muted">{{$count_status}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@elseif( Auth::user()->roles[0]->name == "Real Estate Agent")
    <div class="card w-100" style="min-height: 100vh">
        <div class="card-body">
            <h4 class="card-title">Active Units Table</h4>
            <p class="card-title-desc">The table consists of Active Units on the ESNAAD website</p>
            <div class="table-responsive">
                <table class="table table-bordered border-dark mb-0">

                    <thead>
                        <tr class="bg-dark text-white">
                            <th>#</th>
                            <th >Unit Reference</th>
                            <th style="width: 200px;">Price (AED)</th>
                            <th style="width: 150px;">Area</th> 
                            <th style="width: 150px;">Bedrooms</th>
                            <th style="width: 150px;">Project Name</th>
                            <th style="width: 150px;">Sales Offer</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(!isset($count_status))
                            @foreach($units as $key => $value)
                                @if($value->state == '1')

                                <?php $status = $value->status; ?>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    
                                    

                                    <td>{{ $value->name }}</td>

                                    <td>{{ number_format($value->unit_price, 1) }}</td>

                                    <td>{{ $value->unit_size_range }}</td>

                                    <td>{{ $value->bedroom }}</td>
                                    

                                    {{-- PROJECT --}}
                                    <td class="text-left">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"                                        >
                                                {{-- {{$value->project_id}} --}}
                                                @if($value->project != null)
                                                    @if($value->project->id == $value->project_id)
                                                        <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project->name }}
                                                    @else
                                                        <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                    @endif
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            </a>
                                            {{-- {{$projects}} --}}
                                            <div class="dropdown-menu w-100 " aria-labelledby="dropdownMenuButton">
                                                {{-- <button class="dropdown-item" data-toggle="modal" data-target="#project-brochure-connect"><i class="bx bx-plus-circle"></i> &nbsp;Add</button> --}}
                                                <a class="dropdown-item" href="{{ url('unit-project/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                                <hr class="my-2">
                                                <form class="contact-form px-3" id="getInTouch" method="post" action="{{ route('unit-project.connect') }}">
                                                @csrf
                                                    <input name="unit_id" value="{{$value->id}}" hidden>
                                                    <select
                                                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                        @error('project_id') border border-solid border-danger  @enderror"
                                                        data-select2-id="basicpill-status-input"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        name="project_id"
                                                        >
                                                        <option selected value="">Choose Segment...</option>

                                                        @if(isset($projects))
                                                            @foreach($projects as $data)
                                                                <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>

                                                    <div class="my-2 w-100 text-right">
                                                        <button class="btn btn-outline-dark btn-sm btn-block  ">
                                                            Connect
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </td>

                                    {{-- ACTION --}}
                                    <td>
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-light rounded" type="button">
                                                <a class="dropdown-item" href="{{ route('units.sales.offer', ['id' => $value->id]) }}" target="_blank"><i class="bx bx-spreadsheet text-dark"></i> &nbsp; Print</a>
                                            </button>
                                        </div> --}}
                                        <div>
                                            <button type="button" class="btn btn-sm btn-white rounded-0 waves-effect waves-light" data-toggle="modal" data-target="#myModal-{{$value->id}}"><i class="bx bx-spreadsheet text-dark"></i> &nbsp; Print</button>
                                            <div id="myModal-{{$value->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ url('/sales-offer-print')}}" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Date of Sales Offer</h5>
                                                                <button type="button" class="btn btn-white " data-dismiss="modal" aria-label="Close">X</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                <p>Please enter start date for Booking</p>
                                                                <input class="form-control" name="date" type="date" value="2024-03-01" min="2024-03-01" id="example-date-input">
                                                                <input type="hidden" name="unit" value="{{$value->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Proceed</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @endif
                            @endforeach

                            <tr class="bg-dark">
                                <td colspan='13' class="text-white">*** End of the Line ***</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan='13' class="text-muted">{{$count_status}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@elseif( Auth::user()->roles[0]->name == "Master Administrator")
<div class="card w-100" style="min-height: 100vh">
    <div class="card-body">
        <h4 class="card-title">Active Units Table</h4>
        <p class="card-title-desc">The table consists of Active Units on the ESNAAD website</p>
        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Operation</th>
                        <th style="width: 100px;">Unit Status</th>
                        <th >Unit Reference</th>
                        <th style="width: 200px;">Price (AED)</th>
                        <th style="width: 150px;">Area</th>
                        <th style="width: 150px;">Bedrooms</th>
                        <th style="width: 150px;">Project Name</th>
                        <th style="width: 150px;">Floor Plans</th>
                        <th style="width: 150px;">Gallery</th>
                        <th style="width: 150px;">Sales Offer</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($units as $key => $value)

                            <?php $status = $value->status; ?>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                
                                {{-- OPERATION --}}
                                <td class="d-inline-flex">
                                    <?php
                                        /**
                                         * UNIT STATES
                                         * 1 == ACTIVE
                                         * 2 == DRAFT
                                         * 3 == TRASH
                                        */
                                    ?>
                                    
                                    <a class="btn btn-sm btn-outline-light rounded " title="view details" href="{{ route('units.show', ['unit' => $value->id]) }}"><i class="bx bx-show-alt text-dark font-size-18"></i></a>

                                    <div class="dropdown mx-1">
                                        <a class="dropdown-toggle btn btn-sm btn-outline-light rounded dropdown-toggle" title="active/draft" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->status == '1')
                                                <i class="bx bx-check-shield text-success font-size-18" ></i>
                                            @elseif($value->status == '2')
                                                <i class="bx bx-cloud-download text-dark font-size-18" ></i>
                                            @else
                                                <i class="bx bx-trash text-danger font-size-18" ></i>
                                            @endif
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($value->status == '1')
                                                <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @elseif($value->status == 2)
                                                <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" title="active/draft" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @else
                                                <a class="dropdown-item" title="Active/Draft" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" title="Active/Draft" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" title="Active/Draft" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @endif
                                        </div>
                                    </div>

                                    <a class="btn btn-sm btn-outline-light rounded" title="Edit Unit" href="{{ route('units.edit', ['unit' => $value->id]) }}"><i class="bx bx-edit text-dark font-size-18"></i></a>
                                    {{-- <a class="btn btn-sm btn-outline-light rounded" title="duplicate" href="{{ route('units.duplicate', ['id' => $value->id]) }}"><i class="bx bx-duplicate text-dark font-size-18"></i></a> --}}

                                    
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    <?php
                                        /**
                                         * UNIT STATES
                                         * 1 == LISTED
                                         * 2 == BOOKED
                                         * 3 == AMORTIZING
                                         * 4 == SOLD
                                         * 5 == RESALE
                                        */
                                    ?>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->state == '1')
                                                <span class="bg-info text-white p-1">Listed</span>
                                            @elseif($value->state == '2')
                                                <span class="bg-warning text-white p-1">Booked</span>                                                
                                            @elseif($value->state == '3')
                                                <span class="bg-primary text-white p-1">Amortizing</span>                                         
                                            @elseif($value->state == '4')
                                                <span class="bg-success text-white p-1">Sold</span>                                                                                               
                                            @elseif($value->state == '5')
                                                <span class="bg-danger text-white p-1">Resale</span>                                                                                               
                                            @else
                                                N/A
                                            @endif
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($value->state == '1')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '2')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '3')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '4')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @elseif($value->state == '5')
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                @else
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/0') }}">N/A</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                    <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                                @endif
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $value->name }}</td>

                                <td>{{ number_format($value->unit_price, 1) }}</td>

                                <td>{{ $value->unit_size_range }}</td>

                                <td>{{ $value->bedroom }}</td>
                                

                                {{-- PROJECT --}}
                                <td class="text-left">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"                                        >
                                            {{-- {{$value->project_id}} --}}
                                            @if($value->project != null)
                                                @if($value->project->id == $value->project_id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        {{-- {{$projects}} --}}
                                        <div class="dropdown-menu w-100 " aria-labelledby="dropdownMenuButton">
                                            {{-- <button class="dropdown-item" data-toggle="modal" data-target="#project-brochure-connect"><i class="bx bx-plus-circle"></i> &nbsp;Add</button> --}}
                                            <a class="dropdown-item" href="{{ url('unit-project/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" id="getInTouch" method="post" action="{{ route('unit-project.connect') }}">
                                            @csrf
                                                <input name="unit_id" value="{{$value->id}}" hidden>
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('project_id') border border-solid border-danger  @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="project_id"
                                                    >
                                                    <option selected value="">Choose Segment...</option>

                                                    @if(isset($projects))
                                                        @foreach($projects as $data)
                                                            <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>

                                                <div class="my-2 w-100 text-right">
                                                    <button class="btn btn-outline-dark btn-sm btn-block  ">
                                                        Connect
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </td>


                                {{-- FLOOR PLANS --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->unit_floorplan_id != null)
                                                <i class="bx bx-check-circle text-success " style="font-size: 18px"></i> {{ $value->unit_floorplan->name }}
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                            
                                            
                                            {{-- @if($value->unit_floorplan != null)
                                                @if($value->unit_floorplan->unit_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->unit_floorplan->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif --}}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('unit/floorplan/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" method="post" action="{{ route('unit.connect.floorplan') }}">
                                                @csrf
                                                <input name="project_id" value="{{$value->id}}" hidden >
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('factsheet_id') border border-solid border-danger @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="floorplan_id"
                                                    >
                                                    <option selected value="">Choose Segment</option>

                                                    @if(isset($floorplans))
                                                        @foreach($floorplans as $data)
                                                            <option  value="{{$data->id}}">{{ $data->name }}</option>
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
                                    </div>
                                </td>

                                {{-- IMAGES --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->unit_image != null)
                                                @if($value->unit_image->unit_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->unit_image->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('unit/images/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" method="post" action="{{ route('unit.connect.image') }}">
                                                @csrf
                                                <input name="project_id" value="{{$value->id}}" hidden >
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('brochure_id') border border-solid border-danger @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="image_id"
                                                    >
                                                    <option selected value="">Choose Segment</option>

                                                    @if(isset($images))
                                                        @foreach($images as $data)
                                                            <option  value="{{$data->id}}">{{ $data->name }}</option>
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
                                    </div>
                                </td>

                                {{-- ACTION --}}
                                <td>
                                    {{-- <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded" type="button">
                                            <a class="dropdown-item" href="{{ route('units.sales.offer', ['id' => $value->id]) }}" target="_blank"><i class="bx bx-spreadsheet text-dark"></i> &nbsp; Print</a>
                                        </button>
                                    </div> --}}
                                    <div>
                                        <button type="button" class="btn btn-sm btn-white rounded-0 waves-effect waves-light" data-toggle="modal" data-target="#myModal-{{$value->id}}"><i class="bx bx-spreadsheet text-dark"></i> &nbsp; Print</button>
                                        <div id="myModal-{{$value->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ url('/sales-offer-print')}}" method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Date of Sales Offer</h5>
                                                            <button type="button" class="btn btn-white " data-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <p>Please enter start date for Booking</p>
                                                            <input class="form-control" name="date" type="date" value="2024-03-01" min="2024-03-01" id="example-date-input">
                                                            <input type="hidden" name="unit" value="{{$value->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Proceed</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr class="bg-dark">
                            <td colspan='13' class="text-white">*** End of the Line ***</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan='13' class="text-muted">{{$count_status}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
@endif
