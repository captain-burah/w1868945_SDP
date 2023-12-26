<div class="card">
    <div class="card-body">
        <h3 class="mb-1">New Booking</h3>
        <p class="mb-0 text-justify text-muted font-italic">
            "Real estate booking is the key that opens the door to your future home or investment   "
        </p>



        <form class="contact-form" id="getInTouch" method="post" action="{{ route('bookings.store') }}">
            @csrf
            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>
                <button
                    type="submit"
                    class="btn btn-sm btn-dark my-auto">
                    Submit to Draft
                </button>
            </div>
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#clientele" type="button" role="tab" aria-controls="home" aria-selected="true">Clientele</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="details-tab" data-toggle="tab" data-target="#reservation_agreement" type="button" role="tab" aria-controls="profile" aria-selected="false">Reservation Agreement</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="description-tab" data-toggle="tab" data-target="#description" type="button" role="tab" aria-controls="contact" aria-selected="false">Description</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="location-tab" data-toggle="tab" data-target="#seo" type="button" role="tab" aria-controls="contact" aria-selected="false">SEO</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-4" id="clientele" role="tabpanel" aria-labelledby="home-tab">
                    @include('booking.create.form.clientele')
                </div>

                <div class="tab-pane fade p-4" id="reservation_agreement    " role="tabpanel" aria-labelledby="details-tab">
                    @include('booking.create.form.ra')
                </div>

                <div class="tab-pane fade p-4" id="description" role="tabpanel" aria-labelledby="description-tab">
                    @include('booking.create.form.description')
                </div>

                <div class="tab-pane fade p-4" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                    @include('booking.create.form.seo')
                </div>
            </div>
        </form>

    </div>
    <!-- end card body -->
</div>
