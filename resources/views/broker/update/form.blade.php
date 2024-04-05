<div class="card">
    <div class="card-body">
        <h3 class="mb-1">BROKER MANAGEMENT - UPDATE</h3>

        <form class="contact-form" id="getInTouch" method="post" action="{{ url('/brokers-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('brokers.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
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
                    <button style="width: auto" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#general" type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="profile" aria-selected="false">Files</button>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-4" id="general" role="tabpanel" aria-labelledby="home-tab">
                    @include('broker.update.form.general')
                </div>

                <div class="tab-pane fade p-4" id="details" role="tabpanel" aria-labelledby="details-tab">
                    @include('broker.update.form.details')
                </div>

            </div>
        </form>

    </div>
    <!-- end card body -->
</div>
