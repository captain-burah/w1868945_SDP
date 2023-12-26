<div class="row">
    <div class="card-body p-0">
    <h3>
        Client Information
    </h3>
    <p>Gathering client information is an essential and purposeful practice for various reasons, each of which contributes to the successful functioning and growth of a business or service provider. </p>
    </div>
</div>

<div class="row mb-5 mt-4">

    {{-- PREFIX --}}
    <div class="col-md-2">
        <div data-select2-id="15">
            <label class="form-label">Prefix Title</label>


            <select
                class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                @error('title') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="title"
            >
                <option selected value="">Choose ...</option>
                @if(isset($honorifics))
                    @foreach($honorifics as $data)
                        <option value="{{$data->id}}">{{ $data->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('title')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror


        </div>
    </div>


    {{-- NAME --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Full Name</label>
            <input
                type="text"
                name="name"
                class="form-control form-control-sm
                @error('name') border border-solid border-danger  @enderror"
                id="name"
                placeholder="John Carter"
                value="{{ old('name') }}"
            >
            @error('name')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>


    {{-- EMAIL --}}
    <div class="col-md-4">
        <div data-select2-id="15">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control form-control-sm
                @error('email') border border-solid border-danger  @enderror"
                id="email"
                placeholder="someone@email.com"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>


<div class="row my-5">

    {{-- DIAL CODES 01 --}}
    <div class="col-md-4">
        <div data-select2-id="15">
            <label class="form-label">Primary Contact </label>

            <div class="row">
                <div class="col-md-6">
                    <select
                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                        @error('country_code1') border border-solid border-danger  @enderror"
                        data-select2-id="basicpill-status-input"
                        tabindex="-1"
                        aria-hidden="country_code1"
                        name="country_code1"
                    >
                        <option selected value="">Country Code</option>
                        @if(isset($country))
                            @foreach($country as $data)
                                <option value="{{$data->id}}">{{ $data->name }} : ({{$data->dial_code}})</option>
                            @endforeach
                        @endif
                    </select>
                    @error('country_code1')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <input
                        type="number"
                        name="contact1"
                        class="form-control form-control-sm
                        @error('contact1') border border-solid border-danger  @enderror"
                        id="contact1"
                        placeholder="501234567"
                        value="{{ old('contact1') }}"
                    >
                    @error('contact1')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>




    {{-- DIAL CODES 02 --}}
    <div class="col-md-4">
        <div data-select2-id="15">
            <label class="form-label">Secondary Contact </label>

            <div class="row">
                <div class="col-md-6">
                    <select
                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                        @error('country_code2') border border-solid border-danger  @enderror"
                        data-select2-id="basicpill-status-input"
                        tabindex="-1"
                        aria-hidden="country_code2"
                        name="country_code2"
                    >
                        <option selected value="">Country Code</option>
                        @if(isset($country))
                            @foreach($country as $data)
                                <option value="{{$data->id}}">{{ $data->name }} : ({{$data->dial_code}})</option>
                            @endforeach
                        @endif
                    </select>
                    @error('country_code2')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <input
                        type="number"
                        name="contact2"
                        class="form-control form-control-sm
                        @error('contact2') border border-solid border-danger  @enderror"
                        id="contact2"
                        placeholder="501234567"
                        value="{{ old('contact2') }}"
                    >
                    @error('contact2')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>




    {{-- DIAL CODES 03 --}}
    <div class="col-md-4">
        <div data-select2-id="15">
            <label class="form-label">Landline Contact </label>

            <div class="row">
                <div class="col-md-6">
                    <select
                        class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                        @error('country_code3') border border-solid border-danger  @enderror"
                        data-select2-id="basicpill-status-input"
                        tabindex="-1"
                        aria-hidden="country_code3"
                        name="country_code3"
                    >
                        <option selected value="">Country Code</option>
                        @if(isset($country))
                            @foreach($country as $data)
                                <option value="{{$data->id}}">{{ $data->name }} : ({{$data->dial_code}})</option>
                            @endforeach
                        @endif
                    </select>
                    @error('country_code3')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <input
                        type="number"
                        name="contact3"
                        class="form-control form-control-sm
                        @error('contact3') border border-solid border-danger  @enderror"
                        id="contact3"
                        placeholder="501234567"
                        value="{{ old('contact3') }}"
                    >
                    @error('contact3')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>


</div>

<div class="row my-5">

    {{-- COUNTRY OF RESIDENCE --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Country of Residence</label>

            <select
                class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                @error('country') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="country"
                name="country"
            >
                <option selected value="">Choose ...</option>
                @if(isset($country))
                    @foreach($country as $data)
                        <option value="{{$data->id}}">{{ $data->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('country')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    {{-- NATIONALITY --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Nationality</label>

            <select
                class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                @error('nationality') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="nationality"
                name="nationality"
            >
                <option selected value="">Choose ...</option>
                @if(isset($country))
                    @foreach($country as $data)
                        <option value="{{$data->id}}">{{ $data->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('nationality')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>


<div class="row my-5">

    {{-- PASSPORT NUMBER --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Passport Number</label>
            <input
                type="text"
                name="passport"
                class="form-control form-control-sm
                @error('passport') border border-solid border-danger  @enderror"
                id="name"
                placeholder="N12345678"
                value="{{ old('passport') }}"
            >
            @error('passport')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>


    {{-- PASSPORT EXIRY --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Passport Expiry</label>
            <input
                type="date"
                name="pp_expiry"
                class="form-control form-control-sm
                @error('pp_expiry') border border-solid border-danger  @enderror"
                id="pp_expiry"
                value="{{ old('pp_expiry') }}"
            >
            @error('pp_expiry')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>


<div class="row my-5">

    {{-- ADDRESS 1 --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Residential Address 01</label>
            <input
                type="text"
                name="address1"
                class="form-control form-control-sm
                @error('address1') border border-solid border-danger  @enderror"
                id="name"
                placeholder="76425, Skye Station, South Cole, Texas, USA"
                value="{{ old('address1') }}"
            >
            @error('address1')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>


    {{-- ADDRESS 2 --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Residential Address 02</label>
            <input
                type="text"
                name="address2"
                class="form-control form-control-sm
                @error('address2') border border-solid border-danger  @enderror"
                id="name"
                placeholder="3448, Ile De France, St #242, Fort Wainwright, Alaska (AK), USA"
                value="{{ old('address2') }}"
            >
            @error('address2')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>


<div class="row my-5">
    {{-- SOURCE --}}
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Source of Information </label>

            <select
                class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                @error('source') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="source"
                name="source"
            >
                <option selected value="">Choose ..</option>
                <option value="email">Email</option>
                <option value="fb">Facebook</option>
                <option value="in">LinkedIn</option>
                <option value="ig">Instagram</option>
                <option value="snapchat">Snap Chat</option>
                <option value="re_broker">Real Estate Broker</option>
                <option value="developer_agent">Developer Agent</option>
                <option value="other">Other</option>

            </select>
            @error('source')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
