  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0"
                  />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616"
                  />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0"
                  />
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
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
                @role('super_admin')
                <li class="menu-item {{ Request::is('admin') ||
                    Request::is('admin/register') ||
                    Request::is('admin/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('admin')}}" class="menu-link">
                    <div data-i18n="Admin">Admin</div>
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
                @role('super_admin')
                  <li class="menu-item {{ Request::is('branch') ||
                      Request::is('branch/create') ||
                      Request::is('branch/edit/*')
                      ? 'active' : '' }}">
                    <a href="{{url('branch')}}" class="menu-link">
                      <div data-i18n="Branch">Branch</div>
                    </a>
                  </li>
                  @endrole
                <li class="menu-item {{ Request::is('subject') ||
                    Request::is('subject/create') ||
                    Request::is('subject/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('subject')}}" class="menu-link">
                    <div data-i18n="Subject">Subject</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('category') ||
                    Request::is('category/create') ||
                    Request::is('category/edit/*')
                     ? 'active' : '' }}">
                  <a href="{{url('category')}}" class="menu-link">
                    <div data-i18n="Category">Category</div>
                  </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{url('/')}}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-messages"></i>
              <div data-i18n="Chat">Chat</div>
            </a>
          </li>

          </ul>
        </aside>
