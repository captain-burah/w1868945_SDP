<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex">
                                <div class="flex-grow-1 align-self-center">
                                    <div class="text-muted">
                                        <h3 class="mb-1"><i class="bx bx-briefcase text-dark font-size-24"></i> Developments</h3>
                                        <p class="mb-0 text-justify text-muted">
                                            As a project takes shape, it not only brings new homes but also injects vitality and economic growth into the area, fostering a sense of community and prosperity.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row mx-auto text-center">
                                    <div class="col-6">
                                        <div>
                                            <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-dark text-truncate mb-2">Active Projects</a>
                                            <h5 class="mb-0">{{$count_active}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <a href="{{ route('projects.drafts') }}" class="btn btn-sm btn-outline-dark text-truncate mb-2">Drafts Projects</a>
                                            <h5 class="mb-0">{{$count_draft}}</h5>
                                        </div>
                                    </div>
                                    {{-- <div class="col-4">
                                        <div>
                                            <a href="{{ route('projects.trash') }}" class="btn btn-sm btn-outline-dark text-truncate mb-2">Trash Projects</a>
                                            <h5 class="mb-0">{{$count_trash}}</h5>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-none d-lg-block my-auto">
                            <div class="clearfix mt-4 mt-lg-0 my-auto">
                                <div class="my-auto float-right">
                                    <a href="{{ route('projects.create') }}" class="btn btn-dark">
                                        <i class="bx bx-bookmark-plus mr-2"></i>Launch New Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
