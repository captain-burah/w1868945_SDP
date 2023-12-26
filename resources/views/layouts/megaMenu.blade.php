<style>
    .mega-menu-li {
        font-size: 14px;
        font-weight:300;
    }
</style>
<div class="dropdown dropdown-mega d-none d-lg-block ml-2">
    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <span class="font-weight-bold text-white">MORE</span>
        <i class="mdi mdi-chevron-down"></i>
    </button>
    <div class="dropdown-menu dropdown-megamenu shadow-sm">
        <div class="row">
            <div class="col-sm-10">
                <div class="row">
                    @can('booking-list')
                    <div class="col-md-3">
                        <h5 class="font-size-16 font-weight-bold mt-0"><u>Amortization</u></h5>
                        <ul class="list-unstyled megamenu-list">
                            <li class="my-3">
                                <a class="font-weight-bold " href="{{ route('bookings.index') }}">
                                    <span class="mega-menu-li">Bookings</span>
                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Remittances</span>
                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javasc   ript:void(0);">
                                    <span class="mega-menu-li">Buyers with SPA</span>
                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Owners</span>
                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Cancelled</span>
                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Trash</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endcan

                    @can('meeting-list')
                    <div class="col-md-3">
                        <h5 class="font-size-16 font-weight-bold mt-0"><u>Meetings</u></h5>
                        <ul class="list-unstyled megamenu-list">
                            <li class="my-3">
                                <a class="font-weight-bold " href="{{ route('meetings.index') }}">
                                    <span class="mega-menu-li">Schedules</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Attended</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Post-poned</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Cancelled</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Trash</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                    @endcan

                    @can('project-list')
                    <div class="col-md-3">
                        <h5 class="font-size-16 font-weight-bold mt-0"><u>Developments</u></h5>
                        <ul class="list-unstyled megamenu-list">
                            <li class="my-3">
                                <a class="font-weight-bold " href="{{ route('projects.index') }}">
                                    <span class="mega-menu-li">Active Projects</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">In-active Projects</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Development Types</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Create</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Trash</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                    @endcan

                    @can('listing-list')
                    <div class="col-md-3">
                        <h5 class="font-size-16 font-weight-bold mt-0"><u>Units</u></h5>
                        <ul class="list-unstyled megamenu-list">
                            <li class="my-3">
                                <a class="font-weight-bold " href="{{ route('units.index') }}">
                                    <span class="mega-menu-li">Active Units</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">In-active Units</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Payment Milestones</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Uploads</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Trash</span>

                                </a>
                            </li>

                        </ul>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="col-sm-2">
                <div class="row">
                    @can('clientele-list')
                    <div class="col-sm-6">
                        <h5 class="font-size-16 font-weight-bold mt-0"><u>Clientele</u></h5>
                        <ul class="list-unstyled megamenu-list">
                            <li class="my-3">
                                <a class="font-weight-bold " href="{{ route('clienteles.index') }}">
                                    <span class="mega-menu-li">All Clientele</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Paying Clients</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Uploads</span>

                                </a>
                            </li>
                            <li class="my-3">
                                <a class="font-weight-bold " href="javascript:void(0);">
                                    <span class="mega-menu-li">Countries</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                    @endcan

                    <div class="col-sm-5">
                        <div>
                            <img src="/public/images/megamenu-img.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
