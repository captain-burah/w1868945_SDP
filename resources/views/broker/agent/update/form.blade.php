<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Broker Agent Registration</h3>
        <p class="mb-0 text-justify text-muted">
            Real estate is not just about properties; it's about turning dreams into addresses
        </p>



        <div class="my-4">
            <form class="contact-form" action="{{ route('brokers.agent.update')  }}" method="POST" enctype="multipart/form-data" id="dropzone"
            >
                @csrf
                <div class="flex-none w-100 my-4 ">
                    <a href="{{ route('brokers.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                        <i class="bx bx-arrow-back"></i>
                        Back
                    </a>
                    <button
                        type="submit"
                        class="btn btn-sm btn-dark my-auto">
                        Submit
                    </button>
                </div>

                <div class="flex flex-wrap h-full my-auto" >


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @csrf

                    <div class="mb-3 mx-auto ">
                <input type="hidden" name="agent_id" value="{{$agent->id}}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Agent Full Name
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        class="form-control @error('name') border border-solid border-danger  @enderror"

                                        value="{{ $agent->name }}"
                                    >
                                    <span class="text-muted font-size-10">Provide the name as registered in the RERA License</span>
                                    @error('name')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        RERA License Number
                                    </label>
                                    <input
                                        type="text"
                                        id="rera_number"
                                        name="rera_number"
                                        class="form-control @error('rera_number') border border-solid border-danger  @enderror"
                                        placeholder="XXXXX"
                                        value="{{ $agent->rera_number }}"
                                    >
                                    @error('rera_number')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Primary Contact
                                    </label>
                                    <input
                                        type="text"
                                        id="contact1"
                                        name="contact1"
                                        class="form-control @error('contact1') border border-solid border-danger  @enderror"
                                        placeholder="+971 XX XXX XXXX"
                                        value="{{ $agent->contact1 }}"
                                    >
                                    @error('contact1')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Secondary Contact
                                    </label>
                                    <input
                                        type="text"
                                        id="contact2"
                                        name="contact2"
                                        class="form-control @error('contact2') border border-solid border-danger  @enderror"
                                        placeholder="+971 XX XXX XXXX"
                                        value="{{ $agent->contact2 }}"
                                    >
                                    @error('contact2')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Email Address
                                    </label>
                                    <input
                                        type="text"
                                        id="email"
                                        name="email"
                                        class="form-control @error('email') border border-solid border-danger  @enderror"
                                        placeholder="email@domain.com"
                                        value="{{ $agent->email }}"
                                    >
                                    @error('email')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="fallback w-full mx-auto my-4">
                                    <label class="form-label">
                                        Real Estate Company
                                    </label>
                                    <select
                                        class="form-control select2-search-disable select2-hidden-accessible
                                        @error('broker_id') border border-solid border-danger  @enderror"
                                        data-select2-id="basicpill-status-input"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        name="broker_id"
                                    >
                                        <option selected value="">Choose ...</option>
                                        @if(isset($brokers))
                                            @foreach($brokers as $data)
                                                @if($agent->broker_id == $data->id)
                                                    <option selected value="{{$data->id}}">{{ $data->company_name }}</option>
                                                @else
                                                    <option value="{{$data->id}}">{{ $data->company_name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('broker_id')
                                        <div class="text-danger font-size-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                    </div>





                </div>

            </form>
        </div>
    </div>
    <!-- end card body -->
</div>
