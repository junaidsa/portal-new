@if (Auth::check())
<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar"
>
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
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
      <a
        class="nav-link dropdown-toggle hide-arrow"
        href="javascript:void(0);"
        data-bs-toggle="dropdown"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <i class="ti ti-bell ti-md"></i>
        <span class="badge bg-danger rounded-pill badge-notifications">5</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
          <div class="dropdown-header d-flex align-items-center py-3">
            <h5 class="text-body mb-0 me-auto">Notification</h5>
            <a
              href="javascript:void(0)"
              class="dropdown-notifications-all text-body"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Mark all as read"
              ><i class="ti ti-mail-opened fs-4"></i
            ></a>
          </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container">
          <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="{{asset('public')}}/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                  <p class="mb-0">Won the monthly best seller gold badge</p>
                  <small class="text-muted">1h ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Charles Franklin</h6>
                  <p class="mb-0">Accepted your connection</p>
                  <small class="text-muted">12hr ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="{{asset('public')}}/assets/img/avatars/2.png" alt class="h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">New Message ✉️</h6>
                  <p class="mb-0">You have new message from Natalie</p>
                  <small class="text-muted">1h ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <span class="avatar-initial rounded-circle bg-label-success"
                      ><i class="ti ti-shopping-cart"></i
                    ></span>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                  <p class="mb-0">ACME Inc. made new order $1,154</p>
                  <small class="text-muted">1 day ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="{{asset('public')}}/assets/img/avatars/9.png" alt class="h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Application has been approved 🚀</h6>
                  <p class="mb-0">Your ABC project application has been approved.</p>
                  <small class="text-muted">2 days ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <span class="avatar-initial rounded-circle bg-label-success"
                      ><i class="ti ti-chart-pie"></i
                    ></span>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Monthly report is generated</h6>
                  <p class="mb-0">July monthly financial report is generated</p>
                  <small class="text-muted">3 days ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="{{asset('public')}}/assets/img/avatars/5.png" alt class="h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Send connection request</h6>
                  <p class="mb-0">Peter sent you connection request</p>
                  <small class="text-muted">4 days ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="{{asset('public')}}/assets/img/avatars/6.png" alt class="h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">New message from Jane</h6>
                  <p class="mb-0">Your have new message from Jane</p>
                  <small class="text-muted">5 days ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <span class="avatar-initial rounded-circle bg-label-warning"
                      ><i class="ti ti-alert-triangle"></i
                    ></span>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">CPU is running high</h6>
                  <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                  <small class="text-muted">5 days ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"
                    ><span class="badge badge-dot"></span
                  ></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"
                    ><span class="ti ti-x"></span
                  ></a>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li class="dropdown-menu-footer border-top">
          <a
            href="javascript:void(0);"
            class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center"
          >
            View all notifications
          </a>
        </li>
      </ul>
    </li>
    <!--/ Notification -->

    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="{{asset('public')}}/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="pages-account-settings-account.html">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="{{asset('public')}}/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                </div>
              </div>
              <div class="flex-grow-1">
                <span class="fw-semibold d-block">{{Auth::user()->name }}</span>
                <small class="text-muted">{{Auth::user()->role }}</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="pages-profile-user.html">
            <i class="ti ti-user-check me-2 ti-sm"></i>
            <span class="align-middle">My Profile</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="pages-account-settings-account.html">
            <i class="ti ti-settings me-2 ti-sm"></i>
            <span class="align-middle">Settings</span>
          </a>
        </li>
        <li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logoutForm').submit();">
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
  <input
    type="text"
    class="form-control search-input container-xxl border-0"
    placeholder="Search..."
    aria-label="Search..."
  />
  <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
</div>
</nav>
@else
<nav class="layout-navbar container-xxl navbar navbar-detached  bg-navbar-theme">
    <div class="navbar-brand-box">
      <a href="" class="logo logo-dark">
        <span class="logo-lg">
          <img src="{{asset('public')}}/assets/img/branding/logo.png" alt="" height="40">
        </span>
      </a>
    </div>
    <form class="form-inline">
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">SMART EDU</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="#"> <span key="t-profile">About Us </span></a>
          <a class="dropdown-item" href="#"> <span key="t-my-wallet">Blog</span></a>
          <a class="dropdown-item d-block" href="#"> <span key="t-settings">Event</span></a>
          <a class="dropdown-item" href="#"> <span key="t-lock-screen">FAQ's</span></a>
          <a class="dropdown-item" href="#"> <span key="t-lock-screen">Privacy Policy</span></a>
          <a class="dropdown-item" href="#"> <span key="t-lock-screen">Terms of Service</span></a>
        </div>
      </div>
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">FIND</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="#"> <span key="t-profile">Find Courses</span></a>
          <a class="dropdown-item" href="#"> <span key="t-my-wallet">Find Tutor | 1-1 class</span></a>
          <a class="dropdown-item d-block" href="#"> <span key="t-settings">Find Book</span></a>
          <a class="dropdown-item" href="#"> <span key="t-lock-screen">Join Group Class</span></a>
        </div>
      </div>
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
          data-hover="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">PROGRAMMES</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="#"> <span key="t-profile">Tuition</span></a>
          <a class="dropdown-item" href="#"> <span key="t-my-wallet">Lunguages</span></a>
          <a class="dropdown-item d-block" href="#"> <span key="t-settings">Exam Preps</span></a>
          <a class="dropdown-item" href="#"> <span key="t-lock-screen">IGCSE EXAM REGISTRATION</span></a>
          <a class="dropdown-item" href="#"> <span key="t-lock-screen">Partner with Smart
              Education</span></a>
        </div>
      </div>
      <div class="dropdown d-inline-block hstack gap-3">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown">
          <a href="" class="text-black ">CONTACT US</a>
        </button>
      </div>
      <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-outline-info header-item waves-effect" id="page-header-user-dropdown">
          <a href="{{url('/')}}" class="text-black">Log In</a>
        </button>
      </div>
      <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-info header-item waves-effect" id="page-header-user-dropdown">
          <a href="javascript:;" class="text-white">Sign Up</a>
        </button>
      </div>
    </form>
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
        border-top: 1px solid #ddd; /* Adjust color and style as needed */
        margin: 20px 0; /* Adjust spacing before and after the line */
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
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
