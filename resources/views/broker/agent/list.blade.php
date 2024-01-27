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
        <h2 class="card-title mb-2">Agents</h2>
        <a class="btn btn-dark" href="{{ route('brokers.agent.create') }}">Add Agent</a>
        <div class="table-responsive mt-2">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Status</th>
                        <th >Agent Name</th>
                        <th >Broker</th>
                        <th style="width: 150px;">Primary Contact</th>
                        <th style="width: 150px;">Secondary Contact</th>
                        <th style="width: 150px;">Email</th>
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

                                <td>
                                    <a class="btn btn-outline-dark" href="{{ route('brokers.agent.edit', ['id' => $value->id]) }}"><i class="bx bx-edit"></i></a>
                                </td>
                                
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
