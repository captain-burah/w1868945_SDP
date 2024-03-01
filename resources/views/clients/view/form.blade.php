<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Clientele View</h3>

        {{-- <form class="contact-form" id="getInTouch" method="post" action="{{ route('clientele.store_only ') }}" enctype="multipart/form-data"> --}}
            {{-- @csrf --}}
            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('clienteles.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>
            </div>
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#general" type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-4" id="general" role="tabpanel" aria-labelledby="home-tab">
                    @include('clients.view.form.general')
                </div>
            </div>
        {{-- </form> --}}

    </div>
    <!-- end card body -->
</div>
