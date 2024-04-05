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
        <h4 class="card-title">BROKER MANAGEMENT</h4>
        <p>
            Real estate brokers are the architects of dreams, the facilitators of aspirations, and the guardians of investments. They navigate the intricate landscapes of property markets, bridging the chasm between buyers and sellers with expertise, integrity, and unwavering dedication. 
        </p>
        
        <a class="btn btn-outline-dark w-25 my-3" href="{{ url('brokers-create') }}">Add a New Broker Company</a>
        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th >Company Name</th>
                        <th style="width: 150px;">Authorized Person</th>
                        <th style="width: 150px;">Contact</th>
                        <th style="width: 150px;">Email</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($resource_status))
                        @foreach($resource as $key => $value)
                            <?php $status = $value->status; ?>
                            
                            @if($value->status == '0')                            
                            <tr class="bg-warning text-white">
                            @else
                            <tr>
                            @endif

                                <td>{{$value->id}}</td>
                                
                                <td>{{ $value->company_name }}</td>
                                
                                <td>
                                    {{ $value->authorized_p_name}}    
                                </td>

                                <td>
                                    {{ $value->authorized_p_contact}}    
                                </td>

                                <td>
                                    {{ $value->authorized_p_email}}    
                                </td>

                                <td>
                                    <div class="d-flex justify-contents-start">
                                        <a title="Delete Record" class="btn btn-outline-dark mr-1" href="{{ route('brokers.delete', ['id' => $value->id]) }}"><i class="bx bx-trash"></i></a>
                                        <a title="Update Record" class="btn btn-outline-dark mr-1" href="{{ route('brokers.update', ['id' => $value->id]) }}"><i class="bx bx-pencil"></i></a>
                                    </div>                                    
                                </td>

                            </tr>
                        @endforeach

                        <tr>
                            <td colspan='11' class="text-muted">*** End of the Line ***</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan='11' class="text-muted">{{$resource_status}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
