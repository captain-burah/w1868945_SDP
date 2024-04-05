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



<div class="card w-100" style="min-height: 100vh">
    <div class="card-body">
        <h2 class="card-title mb-2">REAL ESTATE AGENT MANAGEMENT</h2>
        <p>
            Real estate agents are the architects of possibilities, the conduits of aspirations, and the custodians of dreams. They navigate the labyrinthine corridors of the property market with an expert blend of market knowledge, negotiation finesse, and unwavering dedication to their clients' needs. Beyond mere transactions, they serve as trusted advisors, guiding individuals and families through one of the most significant decisions of their lives – finding a place to call home.
        </p>

        <a class="btn btn-outline-dark w-25 my-3" href="{{ route('brokers.agent.create') }}">Add a New Real Estate Agent</a>
        <div class="table-responsive mt-2">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th >Agent Name</th>
                        <th >Authorized Broker Company</th>
                        <th style="width: 150px;">Primary Contact</th>
                        <th style="width: 150px;">Secondary Contact</th>
                        <th style="width: 150px;">Email</th>
                        <th style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($resource as $key => $value)
                            <?php $status = $value->status; ?>
                            
                            @if($value->status == '0')                            
                                <tr class="bg-warning text-white">
                            @else
                                <tr>
                            @endif

                                <td>{{$value->id}}</td>
                                
                                <td>{{ $value->name }}</td>

                                <td>
                                    {{ $value->broker->company_name}}    
                                </td>
                                
                                <td>
                                    {{ $value->contact1}}    
                                </td>

                                <td>
                                    {{ $value->contact2}}    
                                </td>

                                <td>
                                    {{ $value->email}}    
                                </td>

                                <td>
                                    <div class="d-flex inline">
                                        <a title="Update" class="btn btn-sm btn-outline-dark mr-1" href="{{ route('brokers.agent.edit', ['id' => $value->id]) }}"><i class="bx bx-edit"></i></a>
                                        @if($value->status == '1')
                                            <a title="Deactivate Agent" class="btn btn-sm btn-outline-dark mr-1" href="{{ route('brokers.agents.status', ['status_id' => '0', 'agent_id' => $value->id]) }}"><i class="bx bx-no-entry"></i></a>
                                        @else
                                            <a title="Activate Agent" class="btn btn-sm btn-outline-dark mr-1" href="{{ route('brokers.agents.status', ['status_id' => '1', 'agent_id' => $value->id]) }}"><i class="bx bx-check"></i></a>
                                        @endif
                                    </div>
                                </td>

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
