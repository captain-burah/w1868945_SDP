<div class="topnav mb-5">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('dashboard') }}" id="topnav-dashboard" aria-label="admin-dashboard" role="button">
                            <i class="bx bx-home-circle mr-2"></i>Dashboards
                        </a>
                    </li>


                    {{-- @can('booking-list') --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="bookings-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-calendar-check mr-2"></i>Bookings <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="bookings-pages">

                            <a href="calendar.html" class="dropdown-item">Open Bookings</a>
                            <a href="chat.html" class="dropdown-item">Completed</a>
                            <a href="chat.html" class="dropdown-item">Cancelled</a>
                            <a href="chat.html" class="dropdown-item">Trash</a>


                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="bookings-uploads"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Settings <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="bookings-contact">
                                    <a href="chat.html" class="dropdown-item">Booking Status</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('project-list') --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="developments-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-building mr-2"></i>Developments <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="developments-pages">

                            <a href="calendar.html" class="dropdown-item">All Projects</a>
                            <a href="chat.html" class="dropdown-item">Development Types</a>


                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="developments-uploads"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Uploads <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="developments-uploads">
                                    <a href="chat.html" class="dropdown-item">Floor Plans</a>
                                    <a href="chat.html" class="dropdown-item">Images</a>
                                    <a href="chat.html" class="dropdown-item">Videos</a>
                                    <a href="chat.html" class="dropdown-item">Brochures</a>
                                    <a href="chat.html" class="dropdown-item">Fact Sheets</a>
                                    <a href="chat.html" class="dropdown-item">Payment Plans</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('listing-list') --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="units-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-building-house mr-2"></i>Units <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="units-pages">

                            <a href="calendar.html" class="dropdown-item">All Units</a>
                            <a href="chat.html" class="dropdown-item">Payment milestones</a>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="units-contact"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Uploads <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="units-contact">
                                    <a href="chat.html" class="dropdown-item">Floor plans</a>
                                    <a href="chat.html" class="dropdown-item">Payment Plans</a>
                                    <a href="chat.html" class="dropdown-item">Images</a>
                                    <a href="chat.html" class="dropdown-item">Videos</a>
                                    <a href="chat.html" class="dropdown-item">Brochures</a>
                                    <a href="chat.html" class="dropdown-item">Fact Sheets</a>
                                    <a href="chat.html" class="dropdown-item">Other Docs</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-settings"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Settings <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="contacts-grid.html" class="dropdown-item">Availability</a>
                                    <a href="contacts-grid.html" class="dropdown-item">Bedrooms</a>
                                    <a href="contacts-list.html" class="dropdown-item">Bathrooms</a>
                                    <a href="contacts-profile.html" class="dropdown-item">Parking</a>
                                    <a href="contacts-profile.html" class="dropdown-item">Amenities</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('clientele-list') --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="clientele-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bxs-contact mr-2"></i>Clientele <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="clientele-pages">

                            <a href="calendar.html" class="dropdown-item">All Clients</a>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="clientele-contact"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Uploads <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="clientele-contact">
                                    <a href="chat.html" class="dropdown-item">Passport</a>
                                    <a href="chat.html" class="dropdown-item">Other Docs</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-settings"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Settings <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="contacts-grid.html" class="dropdown-item">Countries</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- @endcan --}}

                </ul>
            </div>
        </nav>
    </div>
</div>
