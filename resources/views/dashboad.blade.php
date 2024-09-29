@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Sales last year -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Sales</h5>
                        <small class="text-muted">Last Year</small>
                    </div>
                    <div id="salesLastYear"></div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                            <h4 class="mb-0">175k</h4>
                            <small class="text-danger">-16.2%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sessions Last month -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Sessions</h5>
                        <small class="text-muted">Last Month</small>
                    </div>
                    <div class="card-body">
                        <div id="sessionsLastMonth"></div>
                        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                            <h4 class="mb-0">45.1k</h4>
                            <small class="text-success">+12.6%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Profit -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="badge p-2 bg-label-danger mb-2 rounded">
                            <i class="ti ti-currency-dollar ti-md"></i>
                        </div>
                        <h5 class="card-title mb-1 pt-2">Total Profit</h5>
                        <small class="text-muted">Last week</small>
                        <p class="mb-2 mt-1">1.28k</p>
                        <div class="pt-1">
                            <span class="badge bg-label-secondary">-12.2%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Sales -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
                        <h5 class="card-title mb-1 pt-2">Total Sales</h5>
                        <small class="text-muted">Last week</small>
                        <p class="mb-2 mt-1">$4,673</p>
                        <div class="pt-1">
                            <span class="badge bg-label-secondary">+25.2%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Growth -->
            <div class="col-xl-4 col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="card-title mb-auto">
                                    <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
                                    <small>Weekly Report</small>
                                </div>
                                <div class="chart-statistics">
                                    <h3 class="card-title mb-1">$4,673</h3>
                                    <span class="badge bg-label-success">+15.2%</span>
                                </div>
                            </div>
                            <div id="revenueGrowth"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Active Projects -->



            <!-- Activity Timeline -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="card-body">
                        <div class="meetup-header d-flex justify-content-between">
                            <div>
                                <h4 class="card-title mb-25">Shortcuts</h4>
                            </div>
                            <div>

                                <a href="javascript:void(0);" class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-trash font-medium-3 text-danger cursor-pointer">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </a>
                                <a class="" href="javascript:void(0);" data-toggle="modal"
                                    data-target="#exampleModalCenter"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-plus font-medium-3 cursor-pointer">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg></a>

                            </div>
                        </div>

                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-slack avatar-icon font-medium-3">
                                        <path
                                            d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z">
                                        </path>
                                        <path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z">
                                        </path>
                                        <path
                                            d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z">
                                        </path>
                                        <path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"></path>
                                        <path
                                            d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z">
                                        </path>
                                        <path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z">
                                        </path>
                                        <path
                                            d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z">
                                        </path>
                                        <path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">View Event</h6>
                                <a
                                    href="https://dev.ameliaos.com/events/view"><small>https://dev.ameliaos.com/events/view</small></a>
                            </div>
                        </div>
                        <hr>

                        <div class="media">
                            <div class="avatar bg-light-danger rounded mr-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-external-link avatar-icon font-medium-3">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                        <polyline points="15 3 21 3 21 9"></polyline>
                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-0">CHECKLIST
                                            <a href="javascript:void(0);" data-id="11"
                                                data-link="https://dev.ameliaos.com/checklists/check/start"
                                                data-icon="external-link" data-color="danger" data-name="CHECKLIST"
                                                data-target="" class="edit-shortcut">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </h6>
                                        <a href="https://dev.ameliaos.com/checklists/check/start"
                                            target=""><small>https://dev.ameliaos.com/checklists/check/start</small></a>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-control-danger custom-checkbox">
                                            <input type="checkbox" class="custom-control-input delete-shortcuts"
                                                id="colorCheck1" value="11" name="shortcut">
                                            <label class="custom-control-label" for="colorCheck1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-external-link avatar-icon font-medium-3">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                        <polyline points="15 3 21 3 21 9"></polyline>
                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-0">sadfsdfdaf
                                            <a href="javascript:void(0);" data-id="7"
                                                data-link="https://dev.ameliaos.com/events/view" data-icon="external-link"
                                                data-color="primary" data-name="sadfsdfdaf" data-target="_blank"
                                                class="edit-shortcut">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </h6>
                                        <a href="https://dev.ameliaos.com/events/view"
                                            target="_blank"><small>https://dev.ameliaos.com/events/view</small></a>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-control-danger custom-checkbox">
                                            <input type="checkbox" class="custom-control-input delete-shortcuts"
                                                id="colorCheck2" value="7" name="shortcut">
                                            <label class="custom-control-label" for="colorCheck2"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('link-js')
    <script src="{{ asset('public') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
@endsection
