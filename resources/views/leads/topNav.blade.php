<div class="topnav mb-5">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">


                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('projects.create') }}" id="topnav-dashboard" aria-label="admin-dashboard" role="button">
                            <i class="bx bx-bookmark-plus mr-2"></i>Launch Project
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('inquiry.forms') }}" id="topnav-dashboard" aria-label="admin-dashboard" role="button">
                            <i class="bx bx-phone-call mr-2"></i>Inquiry Leads
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('email.subscriptions') }}" id="topnav-dashboard" aria-label="admin-dashboard" role="button">
                            <i class="bx bx-mail-send mr-2"></i>Email Subscriptions
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
