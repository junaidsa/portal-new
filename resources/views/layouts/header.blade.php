@if (Auth::check())
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Style Switcher -->
                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                        <i class="ti ti-md"></i>
                    </a>
                </li>
                <!--/ Style Switcher -->
                <!-- Notification -->
       @if (Auth::user()->role == 'super')
       <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
            data-bs-auto-close="outside" aria-expanded="false">
            <i class="ti ti-bell ti-md"></i>
            <span class="badge bg-danger rounded-pill badge-notifications"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0">
            <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">Notification</h5>
                    <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                            class="ti ti-mail-opened fs-4"></i></a>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush" id="notification-list">
                </ul>
            </li>
            <li class="dropdown-menu-footer border-top">
                <a href="{{ url('notification/list') }}"
                    class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                    View all notifications
                </a>
            </li>
        </ul>
    </li>
       @endif
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        @if (Auth::user()->profile_pic)
                            <div class="avatar avatar-online">
                                <img src="{{ asset('public') }}/profile/{{ Auth::user()->profile_pic }}" alt
                                    class="h-auto rounded-circle" />
                            </div>
                        @else
                            <div class="avatar avatar-online">
                                <img src="{{ asset('public') }}/profile/demo.png" alt class="h-auto rounded-circle" />
                            </div>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        @if (Auth::user()->profile_pic)
                                            <div class="avatar avatar-online">
                                                <img src="{{ asset('public') }}/profile/{{ Auth::user()->profile_pic }}"
                                                    alt class="h-auto rounded-circle" />
                                            </div>
                                        @else
                                            <div class="avatar avatar-online">
                                                <img src="{{ asset('public') }}/profile/demo.png" alt
                                                    class="h-auto rounded-circle" />
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                        <small class="text-muted">{{ Auth::user()->role }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('profile/' . Auth::id()) }}">
                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('profile/update-about/' . Auth::id()) }}">
                                <i class="ti ti-settings me-2 ti-sm"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);"
                                onclick="document.getElementById('logoutForm').submit();">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                            <form id="logoutForm" method="POST" action="{{ url('/logout') }}">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>

        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper d-none">
            <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
                aria-label="Search..." />
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
        </div>
    </nav>
@else
    <nav class="layout-navbar container-xxl navbar navbar-detached  bg-navbar-theme">
        <div class="navbar-brand-box">
            <a href="" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('public') }}/assets/img/branding/logo.png" alt="" height="40">
                </span>
            </a>
        </div>
    </nav>
    <style>
        .datepicker-dropdown {
            position: absolute !important;
            top: auto !important;
            bottom: 100% !important;
            transform: translateY(-10px);
        }

        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .hidden {
            display: none;
        }

        .tags-container {
            position: relative;
            margin-top: 10px;
        }

        .tags-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dismiss-icon {
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
            float: right;
            margin-left: 10px;
        }

        .form-control {
            width: calc(100% - 30px);
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        p {
            margin: 0;
            color: #333;
            font-size: 14px;
        }

        .bx-chevron-down {
            font-size: 24px;
        }
    </style>
@endif
