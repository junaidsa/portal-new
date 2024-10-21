<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('public') }}/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Property Listing - Wizard Examples | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet"
        href="{{ asset('public') }}/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <script src="{{ asset('public') }}/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('public') }}/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('public') }}/assets/js/config.js"></script>
    <style>
        .col-md-3 {
            width: 260px;
            padding-left: 30px;
            margin-top: 35px;
        }

        .layout-menu-fixed .layout-menu,
        .layout-menu-fixed-offcanvas .layout-menu {
            border-radius: 8px;
            position: fixed;
            top: 78px;
            bottom: 80px;
            left: 25px;
            margin-right: 0 !important;
            margin-left: 0 !important;

        }

    </style>
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <div class="layout-page">
                <nav class="navbar navbar-expand-lg bg-navbar-theme layout-navbar navbar-detached">
                    <div class="container-fluid d-flex justify-content-between align-items-center">
                        <div class="navbar-brand-box">
                            <a href="" class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="{{ asset('public') }}/assets/img/branding/logo.png" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-5" aria-controls="navbar-ex-5" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbar-ex-5">
                            <ul class="navbar-nav ms-auto">
                                <!-- User -->
                                <li class="nav-item dropdown user-dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('public') }}/assets/img/avatars/1.png" alt="" class="h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="{{ asset('public') }}/assets/img/avatars/1.png" alt="" class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block">John Doe</span>
                                                        <small class="text-muted">Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li><div class="dropdown-divider"></div></li>
                                        <li><a class="dropdown-item" href="pages-profile-user.html"><i class="ti ti-user-check me-2 ti-sm"></i><span class="align-middle">My Profile</span></a></li>
                                        <li><a class="dropdown-item" href="pages-account-settings-account.html"><i class="ti ti-settings me-2 ti-sm"></i><span class="align-middle">Settings</span></a></li>
                                        <li><div class="dropdown-divider"></div></li>
                                        <li><a class="dropdown-item" href="auth-login-cover.html" target="_blank"><i class="ti ti-logout me-2 ti-sm"></i><span class="align-middle">Log Out</span></a></li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>
                    </div>
                </nav>




                @yield('main')

            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    <div class="container-fluid">
        <footer class="footer bg-dark mb-4" style="border-radius: 0.4rem;">
            <div class="container-fluid text-center container-p-x py-3">
                <div class="text-light ">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://www.facebook.com/queryprovider" target="_blank"
                        class="fw-semibold">Query
                        Provider</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('public') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/js/bootstrap.js"></script>
    <!-- <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script> -->

    <script src="{{ asset('public') }}/assets/vendor/libs/hammer/hammer.js"></script>
    <!-- <script src="../../assets/vendor/libs/i18n/i18n.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script> -->

    <!-- <script src="../../assets/vendor/js/menu.js"></script> -->
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!-- <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/bs-stepper/bs-stepper.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/select2/select2.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/tagify/tagify.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script> -->
    <!-- <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script> -->

    <!-- Main JS -->
    <script src="{{ asset('public') }}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- <script src="../../assets/js/wizard-ex-property-listing.js"></script> -->
</body>

</html>
