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
        <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
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
        <li class="menu-item {{ Request::is('chat') ? 'active' : '' }}" hidden>
            <a href="{{ url('chat') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-messages"></i>
                <div data-i18n="Chat Box">Chat Box</div>
            </a>
        </li>

        @if (Auth::user()->role == 'super' || Auth::user()->role == 'teacher')
            <li class="menu-item {{ Request::is('jobreminder') || Request::is('jobreminder/create') ? 'active' : '' }}">
                <a href="{{ route('jobreminder.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-world"></i>
                    <div data-i18n="Job Reminder">Job Reminder</div>
                </a>
            </li>
        @endif
        @module('view_setting')
            <li
                class="menu-item {{ Request::is('payment') || Request::is('payment/create') || Request::is('bank/edit/*') ? 'active' : '' }}">
                <a href="{{ route('payment.index') }}" class="menu-link">
                    <i class="ti ti-building-bank cursor-pointer menu-icon"></i>

                    <div data-i18n="Bank Payment">Bank Payment</div>
                </a>
            </li>
        @endmodule

        @module('view_schedule')
            <li class="menu-item {{ Request::is('schedule') ? 'active' : '' }}">
                <a href="{{ url('schedule') }}" class="menu-link">
                    <i class="fa-regular fa-calendar-days cursor-pointer menu-icon"></i>
                    <div data-i18n="Schedule">Schedule</div>
                </a>
            </li>
        @endmodule
        @module('view_reports')
            <li class="menu-item {{ Request::is('students') || Request::is('teacher/details/*') || Request::is('teacher/trancsaction') || Request::is('/students/report') ? 'open' : '' }}">

            </li>

            <li class="menu-item {{ Request::is('teacher/report') ||
                Request::is('student/report') ||
                Request::is('student/report/create') ||
                Request::is('student/report/edit/*')
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon fa-regular fa-file"></i>
                    <div data-i18n="Report">Report</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('teacher/report') ? 'active' : '' }}">
                        <a href="{{ url('teacher/report') }}" class="menu-link">
                            <i class="menu-icon fa-regular fa-file"></i>
                            <div data-i18n="Teacher Report">Teacher Report</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('student/report') ? 'active' : '' }}">
                        <a href="{{ url('student/report') }}" class="menu-link">
                            <div data-i18n="Student Report">Student Report</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endmodule
        @module('view_reports')
            <li class="menu-item {{ Request::is('library') ||
                Request::is('products') ||
                Request::is('products/create') ||
                Request::is('products/edit/*') ||
                Request::is('order/my') ||
                Request::is('order') ||
                Request::is('order/edit/*') ||
                Request::is('order/create')
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-books"></i>
                    <div data-i18n="Library">Library</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('library') ? 'active' : '' }}">
                        <a href="{{ url('library') }}" class="menu-link ">
                            <i class="menu-icon tf-icons ti ti-book"></i>
                            <div data-i18n="Books Library">Books Library</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('products') || Request::is('products/create') || Request::is('products/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('products') }}" class="menu-link">
                            <div data-i18n="Products">Products</div>
                        </a>
                    </li>
                    @module('view_order')
                        <li class="menu-item {{ Request::is('order/my') || Request::is('order/my/create') || Request::is('order/my/edit/*') ? 'active' : '' }}">
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
                </ul>
            </li>
        @endmodule

        @module('view_reports')
            <li
                class="menu-item {{ Request::is('admin') ||
                Request::is('students') ||
                Request::is('students/create') ||
                Request::is('students/edit/*') ||
                Request::is('teacher') ||
                Request::is('admin') ||
                Request::is('admin/edit/*') ||
                Request::is('admin/create') ||
                Request::is('staffs') ||
                Request::is('staffs/create') ||
                Request::is('staffs/edit/*') ||
                Request::is('branch') ||
                Request::is('branch/create') ||
                Request::is('branch/edit/*')
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon fa-regular fa-user"></i>
                    <div data-i18n="User">User</div>
                </a>
                <ul class="menu-sub">
                    @module('view_student')
                        <li class="menu-item {{ Request::is('students') ? 'active' : '' }}">
                            <a href="{{ url('students') }}" class="menu-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                </svg>
                                <div data-i18n="Student">Student</div>
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
                    @module('view_admin')
                        <li
                            class="menu-item {{ Request::is('admin') || Request::is('admin/register') || Request::is('admin/edit/*') ? 'active' : '' }}">
                            <a href="{{ url('admin') }}" class="menu-link">
                                {{-- <i class="ti ti-user-check me-2 ti-sm"></i> --}}
                                <div data-i18n="Admin">Admin</div>
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
                    @module('view_setting')
                        <li
                            class="menu-item {{ Request::is('branch') || Request::is('branch/create') || Request::is('branch/edit/*') ? 'active' : '' }}">
                            <a href="{{ url('branch') }}" class="menu-link">
                                <div data-i18n="Branch">Branch</div>
                            </a>
                        </li>
                    @endmodule
                </ul>
            </li>
        @endmodule


        @if (Auth::user()->role == 'teacher')
            <li class="menu-item {{ Request::is('assign/classes') ? 'active' : '' }}">
                <a href="{{ url('assign/classes') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-school"></i>
                    <div data-i18n="Classes"> Classes</div>
                </a>
            </li>
        @endif
        @module('view_schedule_classes')
            <li class="menu-item {{ Request::is('student/classes') ? 'active' : '' }}">
                <a href="{{ url('student/classes') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-school"></i>
                    <div data-i18n="My Enrolled Classes">My Enrolled Classes</div>
                </a>
            </li>
        @endmodule



        {{-- @endmodule --}}


        @if (Auth::check() && Auth::user()->role == 'student')
            <li class="menu-item {{ Request::is('students/') }}">
                <a href="{{ url('students') . '/' . 'step-2?student_id=' . Auth::user()->id }}" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <div data-i18n="Add New Classes">Add New Classes</div>
                </a>
            </li>
        @endif


        @module('view_setting')
            <li
                class="menu-item {{ Request::is('subject') ||
                Request::is('level') ||
                Request::is('level/create') ||
                Request::is('level/edit/*') ||
                Request::is('bank') ||
                Request::is('bank') ||
                Request::is('bank/edit/*') ||
                Request::is('bank/create') ||
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
                        class="menu-item {{ Request::is('bank') || Request::is('bank/create') || Request::is('bank/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('bank/create') }}" class="menu-link">
                            <div data-i18n="Bank">Bank</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::is('enquiry') || Request::is('enquiry/create') || Request::is('enquiry/edit/*') ? 'active' : '' }}">
                        <a href="{{ url('enquiry') }}" class="menu-link">
                            <div data-i18n="Enquiry">Enquiry</div>
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
