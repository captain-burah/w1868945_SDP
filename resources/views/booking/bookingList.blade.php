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
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Status</th>
                        <th >Project Name</th>
                        <th style="width: 150px;">Unit</th>
                        <th style="width: 150px;">Client Name</th>
                        <th style="width: 150px;">Client Contact</th>
                        <th style="width: 150px;">Payment</th>
                        <th style="width: 150px;">PCD*</th>
                        <th style="width: 150px;">RA*</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($result as $key => $value)

                            <?php $status = $value->status; ?>
                            <tr>
                                {{-- <td>{{$value->id}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{$value->}}</td> --}}
                            </tr>
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
