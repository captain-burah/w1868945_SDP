
@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{$errors->first()}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Update Booking</h3>
        <p class="mb-0 text-justify text-muted">
            Booking Reference: {{$resource->ref_no}}
        </p>

        <form class="contact-form" id="getInTouch" method="post" action="{{ route('bookings.update', ['booking' => $resource->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>
                <button
                    type="submit"
                    class="btn btn-sm btn-dark my-auto">
                    Update to Draft
                </button>
            </div>
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#general" type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="clientbase-tab" data-toggle="tab" data-target="#clientbase" type="button" role="tab" aria-controls="contact" aria-selected="false">Client Base</button>
                </li>


            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-4" id="general" role="tabpanel" aria-labelledby="home-tab">
                    @include('booking.update.form.general')
                </div>

                
                <div class="tab-pane fade p-4" id="clientbase" role="tabpanel" aria-labelledby="clientbase-tab">
                    @include('booking.update.form.clientbase')
                </div>

            </div>
        </form>

    </div>
    <!-- end card body -->
</div>
