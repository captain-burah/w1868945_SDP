<div class="topnav mb-5">
    <div class="container-fluid ">
        <div class="d-flex justify-content-between my-3">
            <div>
                <h3>Broker Registration - Verification</h3>
            </div>

            <div>
                <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#verification-accept">Accept Verification</button>   
                <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#verification-deny">Deny Verification</button>   
            </div>
            
            
            <div class="modal fade" id="verification-deny" tabindex="-1" role="dialog" aria-modal="true" style="display: hidden;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Deny Verification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('brokers.verification.deny') }}">
                            @csrf
                                <h5>Please State Your Reasons for the Denial</h5>
                                <input type="hidden" name="broker_id" value="{{$resource->id}}" >
                                <textarea id="textarea" name="message" class="form-control my-4" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="verification-accept" tabindex="-1" role="dialog" aria-modal="true" style="display: hidden;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Accept Verification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            

                            <form method="POST" action="{{ route('brokers.verification.accept') }}">
                            @csrf
                                <h5>Please confirm to proceed!</h5>
                                <p>You are about to confirm the verification process for this brokerage application complete.</p>
                                <input type="hidden" name="broker_id" value="{{$resource->id}}" >
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            
        </div>
    </div>
</div>
