<!-- Main Header-->
<div class="main-header side-header sticky">
    <div class="container-fluid">
        <div class="main-header-left">
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        <div class="main-header-right">
            <div class="dropdown main-header-notification mr-2">
                @if (Auth::user()->premium_status == 0)
                    <a class="nav-link icon" href="">
                        <i class="fe fe-bell header-icons"></i>
                        <span class="badge badge-danger nav-link-badge">&nbsp;</span>
                    </a>
                @endif
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <p class="main-notification-text">You have unread notification<span
                                class="badge badge-pill badge-primary ml-3">View all</span></p>
                    </div>
                    <div class="main-notification-list">
                        <div class="media">
                            <div class="main-img-user online"><img alt="avatar" src="{{ asset('dashboard/assets/img/media/project-logo.png') }}">
                            </div>
                            <div class="media-body">
                                <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 1512:32pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-footer">
                        <a href="#">View All Notifications</a>
                    </div>
                </div>
            </div>
            <div class="dropdown main-profile-menu">
                <a class="d-flex" href="">
                    <span class="main-img-user"><img alt="avatar" src="{{ Auth::user()->image == null ? asset('dashboard/assets/img/users/1.jpg') : asset(Auth::user()->image) }}"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                        <p class="main-notification-text">{{ ucfirst(Auth::user()->roles->first()->name) }}</p>
                    </div>
                    <a class="dropdown-item border-top" href="profile.html">
                        <i class="fe fe-user"></i> My Profile
                    </a>
                    <a class="dropdown-item" href="profile.html">
                        <i class="fe fe-edit"></i> Edit Profile
                    </a>
                    <a class="dropdown-item" href="profile.html">
                        <i class="fe fe-settings"></i> Account Settings
                    </a>
                    <a class="dropdown-item" href="profile.html">
                        <i class="fe fe-settings"></i> Support
                    </a>
                    <a class="dropdown-item" href="profile.html">
                        <i class="fe fe-compass"></i> Activity
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe fe-power"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
            </button><!-- Navresponsive closed -->
        </div>
    </div>
</div>
<!-- End Main Header-->

<!-- Mobile-header -->
<div class="mobile-main-header">
    <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown main-header-notification">
                    <a class="nav-link icon" href="">
                        <i class="fe fe-bell header-icons"></i>
                        <span class="badge badge-danger nav-link-badge">&nbsp;</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <p class="main-notification-text">You have unread notification<span
                                    class="badge badge-pill badge-primary ml-3">View all</span></p>
                        </div>
                        <div class="main-notification-list">
                            <div class="media">
                                <div class="main-img-user online"><img alt="avatar" src="{{ asset('dashboard/assets/img/media/project-logo.png') }}">
                                </div>
                                <div class="media-body">
                                    <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 1512:32pm</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-footer">
                            <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
                <div class="main-header-notification mt-2">
                    <a class="nav-link icon" href="chat.html">
                        <i class="fe fe-message-square header-icons"></i>
                        <span class="badge badge-success nav-link-badge">6</span>
                    </a>
                </div>
                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="">
                        <span class="main-img-user"><img alt="avatar" src="{{ Auth::user()->image == null ? asset('dashboard/assets/img/users/1.jpg') : asset(Auth::user()->image) }}"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                            <p class="main-notification-text">{{ ucfirst(Auth::user()->roles->first()->name) }}</p>
                        </div>
                        <a class="dropdown-item border-top" href="profile.html">
                            <i class="fe fe-user"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="profile.html">
                            <i class="fe fe-edit"></i> Edit Profile
                        </a>
                        <a class="dropdown-item" href="profile.html">
                            <i class="fe fe-settings"></i> Account Settings
                        </a>
                        <a class="dropdown-item" href="profile.html">
                            <i class="fe fe-settings"></i> Support
                        </a>
                        <a class="dropdown-item" href="profile.html">
                            <i class="fe fe-compass"></i> Activity
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fe fe-power"></i> Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="dropdown  header-settings">
                    <a href="#" class="nav-link icon" data-toggle="sidebar-right"
                        data-target=".sidebar-right">
                        <i class="fe fe-align-right header-icons"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile-header closed -->
