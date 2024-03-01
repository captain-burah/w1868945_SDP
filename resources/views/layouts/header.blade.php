<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <div class="d-flex flex-row ">
                <a href="{{ asset('/')}}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('2.png')}}" alt="" height="22">
                    </span>
                </a>

                <a href="{{ asset('/')}}" class="logo logo-light ">
                    <span class="logo-lg border p-3">
                        <img src="{{ asset('2.png')}}" alt="" height="30">
                    </span>
                </a>
                {{-- <p class="text-white my-auto">Property Management System</p> --}}
                </div>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="d-flex flex-row ">
                <a href="{{ route('dashboard')}}" class="mr-5 my-auto MX-AUTO">
                    <span class="text-white font-weight-bold  my-auto ">HOME </span>
                </a>
                
                {{-- @can('project-list') --}}
                <div class="dropdown d-inline-block mr-5">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-xl-inline-block ml-1 text-white font-weight-bold">INVENTORY </span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right">
                    @can('project-list')
                        <a href="{{ route('projects.index')}}" class="dropdown-item">
                            <span class="font-weight-bold  my-auto ">PROJECT MGT</span>
                        </a>
                    @endcan
                    @can('listing-list')
                        <a href="{{ route('units.index')}}" class="dropdown-item">
                            <span class="font-weight-bold  my-auto ">UNIT MGT</span>
                        </a>
                    @endcan
                    </div>
                </div>
                {{-- @endcan --}}

                {{-- @can('project-list')
                <a href="{{ route('projects.index')}}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">PROJECTS</span>
                </a>
                @endcan

                @can('listing-list')
                <a href="{{ route('units.index')}}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">UNITS </span>
                </a>
                @endcan --}}

                @can('booking-list')
                <a href="{{ route('bookings.index')}}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">BOOKINGS </span>
                </a>
                @endcan

                {{-- @can('meeting-list')
                <a href="{{ route('leads.index')}}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">LEADS</span>
                </a>
                @endcan --}}

                @can('website-list')
                <a href="{{ route('website.index')}}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">WEBSITE</span>
                </a>
                @endcan


                {{-- @can('clientele-list')
                <a href="{{ route('clienteles.index')}}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">CLIENTS</span>
                </a>
                @endcan

                @can('broker-list')
                <a href="{{ route('brokers.index') }}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">BROKERS</span>
                </a>
                @endcan --}}

                {{-- @can('agent-list')
                <a href="{{ route('brokers.agent.list') }}" class="mr-5 my-auto">
                    <span class="text-white font-weight-bold  my-auto ">AGENTS</span>
                </a>
                @endcan --}}

            </div>


            {{-- @include('layouts.megaMenu') --}}

        </div>

        <div class="d-flex">

            {{-- <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

            @if(Auth::user()->id == '1' || Auth::user()->id == '2')
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('roles.index') }}">
                                    <span>Roles</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('users.index') }}">
                                    <span>Users</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge badge-danger badge-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="/public/images/users/avatar-3.jpg"
                                    class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="/public/images/users/avatar-4.jpg"
                                    class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('images/users/finance.png')}}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i> {{Auth::user()->name}}</a>
                    <div class="dropdown-divider"></div> --}}

                    <a class="dropdown-item text-danger" href="{{ route('logout.get') }}">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout
                    </a>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="bx bx-cog bx-spin"></i>
                    </button>
                </div>
            --}}

        </div>
    </div>
</header>
