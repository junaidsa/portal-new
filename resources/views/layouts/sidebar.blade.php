  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <img src="{{asset('public')}}/assets/svg/icons/Icon 512 x 512.png" style="height: 40px" class="app-brand-logo">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            {{-- <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="index.html" class="menu-link">
                    <div data-i18n="Analytics">Analytics</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="dashboards-crm.html" class="menu-link">
                    <div data-i18n="CRM">CRM</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="dashboards-ecommerce.html" class="menu-link">
                    <div data-i18n="eCommerce">eCommerce</div>
                  </a>
                </li>
              </ul>
            </li> --}}

            <!-- Layouts -->
            {{-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Layouts">Layouts</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div data-i18n="Collapsed menu">Collapsed menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div data-i18n="Content navbar">Content navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div data-i18n="Content nav + Sidebar">Content nav + Sidebar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="../horizontal-menu-template" class="menu-link" target="_blank">
                    <div data-i18n="Horizontal">Horizontal</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li> --}}

            <!-- Apps & Pages -->
            {{-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li> --}}
            <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
              <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>
            <!-- Tables -->
            <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li>
            <li class="menu-item {{ Request::is('chat') ? 'active' : '' }}">
                <a href="{{url('chat')}}" class="menu-link">
                  <i class="menu-icon fa-regular fa-comment"></i>
                  <div data-i18n="Chat Box">Chat Box</div>
                </a>
              </li>

            <li class="menu-item {{ Request::is('admin') ||
                    Request::is('admin/register') || Request::is('branch') ||
                    Request::is('branch/create') ||
                    Request::is('teacher') ||
                    Request::is('teacher/create') ||
                    Request::is('teacher/edit/*') ||
                    Request::is('branch/edit/*')
                     ? 'open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Setting">Setting</div>
              </a>
              <ul class="menu-sub">
                @role('super')
                <li class="menu-item {{ Request::is('admin') ||
                    Request::is('admin/register') ||
                    Request::is('admin/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('admin')}}" class="menu-link">
                    <div data-i18n="Admin">Admin</div>
                  </a>
                </li>
                @endrole
                @role('super')
                <li class="menu-item {{ Request::is('staffs') ||
                Request::is('staff/create') ||
                Request::is('staff/edit/*')
                 ? 'active' : '' }}">
              <a href="{{url('staffs')}}" class="menu-link">
                <div data-i18n="Staff">Staff</div>
              </a>
            </li>
            @endrole
                <li class="menu-item {{ Request::is('teacher') ||
                    Request::is('teacher/create') ||
                    Request::is('teacher/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('teacher')}}" class="menu-link">
                    <div data-i18n="Teacher">Teacher</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('students') ||
                    Request::is('student/create') ||
                    Request::is('subject/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('students')}}" class="menu-link">
                    <div data-i18n="Student">Student</div>
                  </a>
                </li>

                @role('super')
                  <li class="menu-item {{ Request::is('branch') ||
                      Request::is('branch/create') ||
                      Request::is('branch/edit/*')
                      ? 'active' : '' }}">
                    <a href="{{url('branch')}}" class="menu-link">
                      <div data-i18n="Branch">Branch</div>
                    </a>
                  </li>
                  @endrole
                  <li class="menu-item {{ Request::is('tuitions') ||
                    Request::is('tuition/create') ||
                    Request::is('tuition/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('tuitions')}}" class="menu-link">
                    <div data-i18n="Tuition">Tuition</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('subject') ||
                    Request::is('subject/create') ||
                    Request::is('subject/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('subject')}}" class="menu-link">
                    <div data-i18n="Subject">Subject</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('level') ||
                    Request::is('level/create') ||
                    Request::is('level/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('level')}}" class="menu-link">
                    <div data-i18n="Level">Level</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('enquiry') ||
                    Request::is('enquiry/create') ||
                    Request::is('enquiry/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('enquiry')}}" class="menu-link">
                    <div data-i18n="Enquiry">Enquiry</div>
                  </a>
                </li>

            </ul>
        </li>
            <li class="menu-item {{ Request::is('library') ||
                    Request::is('product/create') ||
                    Request::is('category/create') ||
                    Request::is('product/edit/*') ||
                    Request::is('category/edit/*')
                     ? 'open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div data-i18n="Book Library">Book Library</div>
              </a>
              <ul class="menu-sub">
                @role('super')
                <li class="menu-item {{ Request::is('library')
                     ? 'active' : '' }}">
                  <a href="{{url('library')}}" class="menu-link">
                    <div data-i18n="Library">Library</div>
                  </a>
                </li>
                @endrole
                @role('super')
                <li class="menu-item {{ Request::is('categories') ||
                Request::is('category/create') ||
                Request::is('category/edit/*')
                 ? 'active' : '' }}">
              <a href="{{url('categories')}}" class="menu-link">
                <div data-i18n="Category">Category</div>
              </a>
            </li>
            @endrole
                <li class="menu-item {{ Request::is('products') ||
                    Request::is('products/create') ||
                    Request::is('products/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('products')}}" class="menu-link">
                    <div data-i18n="Products">Products</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('order') ||
                    Request::is('products/create') ||
                    Request::is('products/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('order')}}" class="menu-link">
                    <div data-i18n="Confirm Order">Confirm Order</div>
                  </a>
                </li>

            </ul>
        </li>
          </ul>
        </aside>
