<style>
    @media print {
        .hide-from-print {
            display: none !important;
        }
    }
</style>
<div class="card shadow-sm hide-from-print">
    <div class="card-body">
        <h3 class="text-muted">Booking Application</h3>
        <nav aria-label="breadcrumb " >
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a>project selection</a></li>
                <li class="breadcrumb-item"><a>unit selection</a></li>
                <li class="breadcrumb-item"><a>client details</a></li>
                <li class="breadcrumb-item"><a>client documents</a></li>
                <li class="breadcrumb-item"><a>reservation agreement</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body">

        <form class="contact-form" method="post" action="{{ route('bookings.store.form3') }}">
            @csrf

            {{-- <input type="hidden" name="booking_id" value="{{$request->booking_id}}"> --}}
            <input type="hidden" name="unit_id" value="{{$request->unit_id}}">
            <input type="hidden" name="project_id" value="{{$request->project_id}}">
            <input type="hidden" name="client_id" value="{{$request->client_id}}">

            <div class="row hide-from-print">
                <div class="card-body px-3 py-0">
                    <h4 class="text-muted">
                        Reservation Agreement Form
                    </h4>
                    <p class="text-muted">Collecting data for a "Reservation Agreement" is a crucial step in various industries and contexts, such as real estate, hospitality, and event planning. A Reservation Agreement is a legally binding contract that outlines the terms and conditions of reserving a specific asset or service for a future date. </p>
                </div>
            </div>

            <hr class="my-1">

            <div class="row">
                @include('booking.create.form3_components.booking')
            </div>


            {{-- <div class="row"> --}}
            @include('booking.create.form3_components.clientele')
            {{-- </div> --}}


            <div class="row">
                @include('booking.create.form3_components.paymentplan')
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

            <div class="row">
                <div class="col-md-12 float-right">
                    <button type="submit" class="btn btn-dark btn-block float-right">Download form and go next</button>
                </div>
            </div>


        </form>

    </div>
    <!-- end card body -->
</div>
