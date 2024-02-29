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
    <div class="card w-100" style="height: 100vh">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-6">
                    <div class="d-flex">
                        <div class="flex-grow-1 align-self-center">
                            <div class="text-muted">
                                <h3 class="mb-1"><i class="bx bx-pen text-dark font-size-24"></i> Bookings</h3>
                                {{-- <p class="mb-0 text-justify text-muted">
                                    As a project takes shape, it not only brings new homes but also injects vitality and economic growth into the area, fostering a sense of community and prosperity.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 d-none d-lg-block my-auto">
                    <div class="clearfix mt-4 mt-lg-0 my-auto">
                        <div class="my-auto float-right">
                            <a href="{{ route('bookings.create') }}" class="btn btn-dark">
                                <i class="bx bx-bookmark-plus mr-2"></i>New Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr class="bg-dark text-white">
                            <th style="width: 150px;">#</th>
                            <th style="width: 150px;">Status</th>
                            <th style="width: 150px;">Booking_Ref</th>
                            <th style="width: 150px;">Project</th>
                            <th style="width: 150px;">Unit</th>
                            <th style="width: 150px;">Agency</th>
                            <th style="width: 150px;">Agent Name</th>
                            <th style="width: 150px;">Agent Contact</th>
                            <th style="width: 150px;">Unit Price</th>
                            <th style="width: 150px;">Created At*</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!isset($count_status))
                            @foreach($result as $key => $value)
                                @if($value->status == '1' || $value->status == '3')
                                    <?php $status = $value->status; ?>
                                    <tr>
                                        
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @if($value->status == '1')
                                            <span class="bg-success text-white p-1">Booked</span>
                                            @elseif($value->status == '3')
                                            <span class="bg-warning text-white p-1">Processing</span>
                                            @endif
                                        </td>
                                        <td>{{$value->ref_no}}</td>
                                        <td>{{$value->unit->project->name}}</td>
                                        <td>{{$value->unit->name}}</td>
                                        <td>{{$value->bookingbrokers[0]->broker->company_name}}</td>
                                        <td>{{$value->salesperson_name}}</td>
                                        <td>{{$value->bookingbrokers[0]->broker->authorized_p_contact}}</td>
                                        <td>AED {{ number_format($value->unit->unit_price, 2)}}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td class="d-inline-flex">
                                            <a class="btn btn-sm btn-outline-light rounded" href="{{ url('approve/'.$value->id)}}">Approve</a>
                                            <a class="btn btn-sm btn-outline-light rounded" href="{{ url('view_booking/'.$value->id)}}">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr>
                                <td colspan='11' class="text-muted">*** End of the Line ***</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan='11' class="text-muted">{{$count_status}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@elseif( Auth::user()->roles[0]->name == "Real Estate Agent")
    <div class="card w-100" style="height: 100vh">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-6">
                    <div class="d-flex">
                        <div class="flex-grow-1 align-self-center">
                            <div class="text-muted">
                                <h3 class="mb-1"><i class="bx bx-pen text-dark font-size-24"></i> Bookings</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-none d-lg-block my-auto">
                    <div class="clearfix mt-4 mt-lg-0 my-auto">
                        <div class="my-auto float-right">
                            <a href="{{ route('bookings.create') }}" class="btn btn-dark">
                                <i class="bx bx-bookmark-plus mr-2"></i>New Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr class="bg-dark text-white">
                            <th style="width: 150px;">#</th>
                            <th style="width: 150px;">Status</th>
                            <th style="width: 150px;">Booking_Ref</th>
                            <th style="width: 150px;">Project</th>
                            <th style="width: 150px;">Unit</th>
                            <th style="width: 150px;">Agency</th>
                            <th style="width: 150px;">Agent Name</th>
                            <th style="width: 150px;">Agent Contact</th>
                            <th style="width: 150px;">Unit Price</th>
                            <th style="width: 150px;">Created At*</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!isset($count_status))
                            @foreach($result as $key => $value)
                                @if($value->status == '1' || $value->status == '3')
                                    <?php $status = $value->status; ?>
                                    <tr>
                                        
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @if($value->status == '1')
                                            <span class="bg-success text-white p-1">Booked</span>
                                            @elseif($value->status == '3')
                                            <span class="bg-warning text-white p-1">Processing</span>
                                            @endif
                                        </td>
                                        <td>{{$value->ref_no}}</td>
                                        <td>{{$value->unit->project->name}}</td>
                                        <td>{{$value->unit->name}}</td>
                                        <td>{{$value->bookingbrokers[0]->broker->company_name}}</td>
                                        <td>{{$value->salesperson_name}}</td>
                                        <td>{{$value->bookingbrokers[0]->broker->authorized_p_contact}}</td>
                                        <td>AED {{ number_format($value->unit->unit_price, 2)}}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            
                                            <a class="btn btn-sm btn-outline-light rounded" href="{{ url('view_booking/'.$value->id)}}">View</a>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr>
                                <td colspan='11' class="text-muted">*** End of the Line ***</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan='11' class="text-muted">{{$count_status}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@elseif( Auth::user()->roles[0]->name == "Master Administrator")
    <div class="card w-100" style="height: 100vh">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-6">
                    <div class="d-flex">
                        <div class="flex-grow-1 align-self-center">
                            <div class="text-muted">
                                <h3 class="mb-1"><i class="bx bx-pen text-dark font-size-24"></i> Bookings</h3>
                                {{-- <p class="mb-0 text-justify text-muted">
                                    As a project takes shape, it not only brings new homes but also injects vitality and economic growth into the area, fostering a sense of community and prosperity.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 d-none d-lg-block my-auto">
                    <div class="clearfix mt-4 mt-lg-0 my-auto">
                        <div class="my-auto float-right">
                            <a href="{{ route('bookings.create') }}" class="btn btn-dark">
                                <i class="bx bx-bookmark-plus mr-2"></i>New Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <small class="font-italic">PCD* - Payment Confirmation Document</small> |
            <small class="font-italic">RA* - Registration Agreement</small>
            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr class="bg-dark text-white">
                            <th style="width: 150px;">#</th>
                            <th style="width: 150px;">Status</th>
                            <th style="width: 150px;">Booking_Ref</th>
                            <th style="width: 150px;">Project</th>
                            <th style="width: 150px;">Unit</th>
                            <th style="width: 150px;">Agency</th>
                            <th style="width: 150px;">Agent Name</th>
                            <th style="width: 150px;">Agent Contact</th>
                            <th style="width: 150px;">Unit Price</th>
                            <th style="width: 150px;">Created At*</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!isset($count_status))
                            @foreach($result as $key => $value)
                                @if($value->status == '1' || $value->status == '3')
                                    <?php $status = $value->status; ?>
                                    <tr>
                                        
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @if($value->status == '1')
                                            <span class="bg-success text-white p-1">Booked</span>
                                            @elseif($value->status == '3')
                                            <span class="bg-warning text-white p-1">Processing</span>
                                            @endif
                                        </td>
                                        <td>{{$value->ref_no}}</td>
                                        <td>{{$value->unit->project->name}}</td>
                                        <td>{{$value->unit->name}}</td>
                                        <td>{{$value->bookingbrokers[0]->broker->company_name}}</td>
                                        <td>{{$value->salesperson_name}}</td>
                                        <td>{{$value->bookingbrokers[0]->broker->authorized_p_contact}}</td>
                                        <td>AED {{ number_format($value->unit->unit_price, 2)}}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td class="d-inline-flex">
                                            <a class="btn btn-sm btn-outline-light rounded" href="{{ url('approve/'.$value->id)}}">Approve</a>
                                            <a class="btn btn-sm btn-outline-light rounded" href="{{ url('view_booking/'.$value->id)}}">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr>
                                <td colspan='11' class="text-muted">*** End of the Line ***</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan='11' class="text-muted">{{$count_status}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>`
@endif

