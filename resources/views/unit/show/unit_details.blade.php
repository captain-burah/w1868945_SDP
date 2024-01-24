<div class="card">
    <div class="card-body">
        <div class="row my-2">
            <div class="col-lg-4">
                <h1>
                    Unit Details
                </h1>
            </div>

            <div class="col-lg-4 align-self-center">
            </div>

            <div class="col-lg-4 d-none d-lg-block my-auto">
                <a class="btn btn-dark float-right" href="{{ route('units.edit', ['unit' => $results->id]) }}"><i class="bx bx-edit"></i> &nbsp;Update Unit</a>
                <a class="btn btn-outline-dark float-right mr-2" href="{{ URL::previous() }}">Back</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th>Unit Status</th>
                    <td colspan="4">{{ $results->unit_status->name }}</td>
                </tr>
                <tr>
                    <th>Unit Ref</th>
                    <td>{{$results->name}}</td>
                    <td></td>
                    <th>Building Name</th>
                    <td>{{$results->building_name}}</td>
                </tr>

                <tr>
                    <th>Unit Price</th>
                    <td><b>AED</b> {{ number_format($results->unit_price, 2)}}</td>
                    <td></td>
                    <th>Project Name</th>
                    <td>{{$results->project->name}}</td>
                </tr>

                <tr>
                    <th>Bathrooms</th>
                    <td>{{$results->bathroom}}</td>
                    <td></td>
                    <th>Bedrooms</th>
                    <td>{{$results->bedroom}}</td>
                </tr>

                <tr>
                    <th>Floor Size</th>
                    <td>{{$results->floor}}</td>
                    <td></td>
                    <th>Unit Area</th>
                    <td> {{ $results->unit_size_range}}</td>
                </tr>

                <tr>
                    <th>Outdoor Area</th>
                    <td> {{ number_format($results->outdoor_area, 0)}} <b>sq.ft.</b></td>
                    <td></td>
                    <th>Terrace Area</th>
                    <td> {{ number_format($results->terrace_area, 0)}} <b>sq.ft.</b></td>
                </tr>

                <tr>
                    <th>Oqood Fee</th>
                    <td>{{ number_format($results->oqood_amount, 2)}}</td>
                    <td></td>
                    <th>DLD Fee</th>
                    <td>{{ number_format($results->dld_fees, 2)}}</td>
                </tr>

                <tr>
                    <th>Description</th>    
                    <td colspan="4">{!! $results->description  !!}</td>
                </tr>

                <tr>
                    <th>Payment Plan</th>    
                    <td colspan="4">
                        <div class="row">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Installment</th>
                                    <th>Percentage (%)</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                @if($results->unit_paymentplan != null)
                                    @foreach($results->unit_paymentplan->unit_paymentplan_files as $data)  
                                            <tr>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->percentage}}</td>
                                                <td>{{$data->amount}}</td>
                                                <td>{{$data->date}}</td>
                                            </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th>Images</th>    
                    <td colspan="4">
                        <div class="row">
                                @if($results->unit_image != null)
                                    @foreach($results->unit_image->unit_image_files as $data)  
                                        <div class="col-3 p-2">
                                            <img src="{{ url('storage/units/images/'.$data->unit_image->id.'/'.$data->name) }}" width="100%" height="150">
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                    </td>
                </tr>


                <tr>
                    <th>Unit Floorplan</th>    
                    <td colspan="4">
                        <div class="row">
                                @if($results->unit_floorplan != null)
                                    @foreach($results->unit_floorplan->unit_floorplan_files as $floorplan)
                                        <div style="width: 100%; text-align: center;">
                                            <img src="{{ asset('uploads/units/floorplans/'.$results->unit_floorplan->id.'/'.$floorplan->name)}}" class="mx-auto text-center" style="width: 80%; padding: 35px; margin-bottom: 10px; height: 100%; z-index: -19;">
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                    </td>
                </tr>

            </table>
        </div>
        
        


    </div>
    <!-- end card body -->
</div>
