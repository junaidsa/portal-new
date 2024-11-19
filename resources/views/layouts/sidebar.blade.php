<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <img src="{{ asset('public') }}/assets/img/branding/logo.png" style="height: 40px" class="app-brand-logo ms-3">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M13.45 11.55l2.05 -2.05" />
                    <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                </svg>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('chat') ? 'active' : '' }}">
            <a href="{{ url('chat') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-messages"></i>
                <div data-i18n="Chat Box">Chat Box</div>
            </a>
        </li>
        @module('view_admin')
            <li
                class="menu-item {{ Request::is('admin') || Request::is('admin/register') || Request::is('admin/edit/*') ? 'active' : '' }}">
                <a href="{{ url('admin') }}" class="menu-link">
                    <i class="ti ti-user-check me-2 ti-sm"></i>
                    <div data-i18n="Admin">Admin</div>
                </a>
            </li>
        @endmodule
        @module('view_teacher')
            <li
                class="menu-item {{ Request::is('teacher') || Request::is('teacher/create') || Request::is('teacher/edit/*') ? 'active' : '' }}">
                <a href="{{ url('teacher') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Teacher">Teacher</div>
                </a>
            </li>
        @endmodule
        @module('view_classes')
            <li class="menu-item {{ Request::is('assign/classes') ? 'active' : '' }}">
                <a href="{{ url('assign/classes') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-school"></i>
                    <div data-i18n="Classes"> Classes</div>
                </a>
            </li>
        @endmodule
        @module('view_schedule_classes')
            <li class="menu-item {{ Request::is('student/classes') ? 'active' : '' }}">
                <a href="{{ url('student/classes') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-school"></i>
                    <div data-i18n="Your Classes">Your Classes</div>
                </a>
            </li>
        @endmodule
        @module('view_staff')
            <li
                class="menu-item {{ Request::is('staffs') || Request::is('staff/create') || Request::is('staff/edit/*') ? 'active' : '' }}">
                <a href="{{ url('staffs') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Staff">Staff</div>
                </a>
            </li>
        @endmodule
        @module('view_student')
            <li
                class="menu-item {{ Request::is('students') || Request::is('student/create') || Request::is('subject/edit/*') ? 'active' : '' }}">
                <a href="{{ url('students') }}" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <div data-i18n="Student">Student</div>
                </a>
            </li>
        @endmodule
        @module('view_library')
            <li class="menu-item {{ Request::is('library') ? 'active' : '' }}">
                <a href="{{ url('library') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Book Library">Book Library</div>
                </a>
            </li>
        @endmodule
        {{-- <li
            class="menu-item {{
                ? 'active'
                : '' }}">
            <a href="{{ url('categories') }}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-category">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4h6v6h-6z" />
                    <path d="M14 4h6v6h-6z" />
                    <path d="M4 14h6v6h-6z" />
                    <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                </svg>
                <div data-i18n="Category">Category</div>
            </a>
        </li> --}}
        {{-- <li
            class="menu-item {{ Request::is('products') || Request::is('products/create') || Request::is('products/edit/*') ? 'active' : '' }}">
            <a href="{{ url('products') }}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-brand-producthunt">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                </svg>
                <div data-i18n="Products">Products</div>
            </a>
        </li> --}}
        @module('view_schedule')
            <li class="menu-item {{ Request::is('schedule') ? 'active' : '' }}">
                <a href="{{ url('schedule') }}" class="menu-link">
                    <i class="ti ti-folder cursor-pointer menu-icon"></i>
                    <div data-i18n="Schedule">Schedule</div>
                </a>
            </li>
        @endmodule
        @module('view_confirm_order')
            <li
                class="menu-item {{ Request::is('order') || Request::is('order/create') || Request::is('order/edit/*') ? 'active' : '' }}">
                <a href="{{ url('order') }}" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                    <div data-i18n="Confirm Orders">Confirm Orders</div>
                </a>
            </li>
        @endmodule
        {{-- @module('') --}}
        @if (Auth::check() && Auth::user()->role == 'student')
        <li class="menu-item {{ Request::is('students/') }}">
            <a href="{{ url('students').'/'. 'step-2?student_id=' . Auth::user()->id }}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
            </svg>
                <div data-i18n="New Classes">New Classes</div>
            </a>
        </li>
    @endif
        {{-- @endmodule --}}
        @module('view_order')
            <li class="menu-item {{ Request::is('order/my') }}">
                <a href="{{ url('order/my') }}" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                    <div data-i18n="My Orders">My Orders</div>
                </a>
            </li>
        @endmodule
        @module('view_order')
            <li class="menu-item {{ Request::is('teacher/trancsaction') }}">
                <a href="{{ url('teacher/trancsaction') }}" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                    <div data-i18n="Teacher Transaction">Teacher Transacton</div>
                </a>
            </li>
        @endmodule
        @module('view_setting')
            <li
                class="menu-item {{ Request::is('admin') ||
                Request::is('products') ||
                Request::is('products/create') ||
                Request::is('products/edit/*') ||
                Request::is('categories') ||
                Request::is('category/create') ||
                Request::is('category/edit/*') ||
                Request::is('admin/register') ||
                Request::is('branch') ||
                Request::is('branch/create') ||
                Request::is('tuition/edit/*') ||
                Request::is('tuition/create') ||
                Request::is('tuitions') ||
                Request::is('subject') ||
                Request::is('subject/edit/*') ||
                Request::is('subject/create') ||
                Request::is('level') ||
                Request::is('level/create') ||
                Request::is('level/edit/*') ||
                Request::is('enquiry') ||
                Request::is('enquiry/create') ||
                Request::is('enquiry/edit/*')
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Setting">Setting</div>
                </a>
                <ul class="menu-sub">
                    <li
                        class="menu-item {{ Request::is('branch') || Request::is('branch/create') || Request::is('branch/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('branch') }}" class="menu-link">
                            <div data-i18n="Branch">Branch</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('payment') || Request::is('payment/create') || Request::is('bank/edit/*') ? 'active' : '' }}">
                        <a href="{{ route('payment.index') }}" class="menu-link">
                            <div data-i18n="Bank Payment">Bank Payment</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('subject') || Request::is('subject/create') || Request::is('subject/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('subject') }}" class="menu-link">
                            <div data-i18n="Subject">Subject</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('level') || Request::is('level/create') || Request::is('level/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('level') }}" class="menu-link">
                            <div data-i18n="Level">Level</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('enquiry') || Request::is('enquiry/create') || Request::is('enquiry/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('enquiry') }}" class="menu-link">
                            <div data-i18n="Enquiry">Enquiry</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('bank') || Request::is('bank/create') || Request::is('bank/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('/bank/create') }}" class="menu-link">
                            <div data-i18n="Bank">Bank</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('products') || Request::is('products/create') || Request::is('products/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('products') }}" class="menu-link">
                            <div data-i18n="Products">Products</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('categories') || Request::is('category/create') || Request::is('category/edit/*')
                            ? 'active'
                            : '' }}">
                        <a href="{{ url('categories') }}" class="menu-link">
                            <div data-i18n="Category">Category</div>
                        </a>
                    </li>

                </ul>
            </li>
            @endmodule
            <li
                class="menu-item {{ Request::is('supports') || Request::is('support/details/*') || Request::is('support/create') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="ti ti-message-dots me-2 ti-sm"></i>
                    <div data-i18n="Support">Support</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('support/create') ? 'active' : '' }}">
                        <a href="{{ url('support/create') }}" class="menu-link">
                            <div data-i18n="Create">Create</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('supports') ? 'active' : '' }}">
                        <a href="{{ url('supports') }}" class="menu-link">
                            <div data-i18n="Tickets">Tickets</div>
                        </a>
                    </li>

                </ul>
            </li>
    </ul>
</aside>
