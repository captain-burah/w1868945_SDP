<h4 class="card-title mt-5">Documents</h4>



    @if(Empty($resource->broker_files))
        <table class="table mb-0">
            <tbody>                
                <tr>
                    <th colspan="4">No documents submitted</th>
                </tr>
            </tbody>
        </table>
    @else
        <div class="row my-4">
            <div class="col-md-6 mb-5">
                <h5>Power of Atty / MOA</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Power of Atty / MOA')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
                
            </div>

            <div class="col-md-6 mb-5">
                <h5>Bank Letter</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Bank Letter')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-6 mb-5">
                <h5>Valid Trade License</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Valid Trade License')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
                
            </div>
            
            <div class="col-md-6 mb-5">
                <h5>Rera Certificate</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Rera Certificate')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-6 mb-5">
                <h5>Broker Card</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Broker Card')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
                
            </div>
            
            <div class="col-md-6 mb-5">
                <h5>Valid VAT Certificate / VAT NOC</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Valid VAT Certificate / VAT NOC')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-6 mb-5">
                <h5>Passport, VISA and Emirates ID</h5>
                @forelse ($resource->broker_files as $file)
                    @if($file->name == 'Passport, VISA and Emirates ID')
                        <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                        @break
                    @else
                        @if ($loop->last)
                            <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p> 
                        @endif
                    @endif
                @empty
                    <p>No items found.</p>
                @endforelse
                
            </div>
            
        </div>
    @endif
