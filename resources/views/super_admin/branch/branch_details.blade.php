@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        @if (Auth::user()->role == 'super')
        @php
        $totalStaffs = DB::table('users')->where('branch_id',Auth::user()->branch_id)->whereNull('deleted_at')->where('role', 'staff')->count();
          $totalTeacher = DB::table('users')->where('branch_id',Auth::user()->branch_id)->whereNull('deleted_at')->where('role', 'teacher')->count();
          $totalStudent = DB::table('users')->where('branch_id',Auth::user()->branch_id)->whereNull('deleted_at')->where('role', 'student')->count();
          $earntotal = DB::table('schedules')
              ->where('status', 1)
              ->where('branch_id',Auth::user()->branch_id)
              ->sum('total_amount');
        @endphp
             <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Branch /</span> Details</h4>

            <div class="col-md-6 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <i class="menu-icon tf-icons ti ti-users fs-1 text-primary"></i>
                                </h3>
                                <span class="d-block text-center">STAFFS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span class="badge bg-label-primary px-4">{{ $totalStaffs }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Profit -->
            <div class="col-md-6 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <i class="menu-icon tf-icons ti ti-user fs-1 text-success"></i>
                                </h3>
                                <span class="d-block text-center">TEACHERS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span class="badge bg-label-success px-4">{{ $totalTeacher }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Sales -->
            <div class="col-md-6 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school text-danger">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="primary" />
                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                    </svg>

                                </h3>
                                <span class="d-block text-center">STUDENTS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span class="badge bg-label-danger px-4">{{ $totalStudent }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg class="h-8 w-8 text-warning" width="38" height="38"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="7" cy="17" r="2" />
                                        <circle cx="17" cy="17" r="2" />
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                        <line x1="3" y1="9" x2="7" y2="9" />
                                    </svg>
                                </h3>
                                <span class="d-block text-center">EARNING</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span class="badge bg-label-warning px-4">{{$earntotal}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @elseif(Auth::user()->role == 'student')
            @php
                $orderCounts = DB::table('orders')
                    ->selectRaw('order_status, count(*) as count')
                    ->where('user_id', Auth::id())
                    ->groupBy('order_status')
                    ->get()
                    ->pluck('count', 'order_status');

                // Access counts
                $pendingCount = $orderCounts['pending'] ?? 0.0;
                $deliveredCount = $orderCounts['delivered'] ?? 0.0;
                $totalOrders = $orderCounts->sum();

                $classCounts = DB::table('schedule_timings')
                    ->selectRaw('status, count(*) as count')
                    ->where('student_id', Auth::id())
                    ->groupBy('status')
                    ->get()
                    ->pluck('count', 'status');

                // Access counts
                $pendingClass = $classCounts['pending'] ?? 0.0;
                $deliveredClass = $classCounts['delivered'] ?? 0.0;
                $totalclass = $classCounts->sum();
            @endphp
            <div class="row mb-4" id="sortable-cards">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{ url('order/my') }}">
                        <div class="card drag-item cursor-move mb-lg-0 mb-4">
                            <div class="card-body text-center">
                                <h2>
                                    <i class="ti ti-shopping-cart text-info display-6"></i>
                                </h2>
                                <h4> Total Orders</h4>
                                <h5>{{ $totalOrders }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card drag-item cursor-move mb-lg-0 mb-4">
                        <div class="card-body text-center">
                            <h2>
                                <i class="ti ti-shopping-cart text-danger display-6"></i>
                            </h2>
                            <h4>ORDER PENDING</h4>
                            <h5>{{ $pendingCount }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card drag-item cursor-move mb-lg-0 mb-4">
                        <div class="card-body text-center">
                            <h2>
                                <i class="ti ti-book text-info display-6"></i>
                            </h2>
                            <h4>Total Class</h4>
                            <h5>{{ $totalclass }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card drag-item cursor-move mb-lg-0 mb-4">
                        <div class="card-body text-center">
                            <h2>
                                <i class="ti ti-book text-danger display-6"></i>
                            </h2>
                            <h4>PENDING Class</h4>
                            <h5>{{ $pendingClass }}</h5>
                        </div>
                    </div>
                </div>
            </div>

        @elseif(Auth::user()->role == 'teacher')
            @php
                $orderCounts = DB::table('orders')
                    ->selectRaw('order_status, count(*) as count')
                    ->where('user_id', Auth::id())
                    ->groupBy('order_status')
                    ->get()
                    ->pluck('count', 'order_status');

                // Access counts
                $pendingCount = $orderCounts['pending'] ?? 0.0;
                $deliveredCount = $orderCounts['delivered'] ?? 0.0;
                $totalOrders = $orderCounts->sum();

                $classCounts = DB::table('schedule_timings')
                    ->selectRaw('status, count(*) as count')
                    ->where('student_id', Auth::id())
                    ->groupBy('status')
                    ->get()
                    ->pluck('count', 'status');

                // Access counts
                $pendingClass = $classCounts['pending'] ?? 0.0;
                $deliveredClass = $classCounts['delivered'] ?? 0.0;
                $totalclass = $classCounts->sum();
                $totalClassFee = DB::table('assign_classes')->where('teacher_id',Auth::id())->where('status',1)->sum('class_fee');
            @endphp
            <div class="row mb-4" id="sortable-cards">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{ url('order/my') }}">
                        <div class="card drag-item cursor-move mb-lg-0 mb-4">
                            <div class="card-body text-center">
                                <h2>
                                    <i class="ti ti-shopping-cart text-info display-6"></i>
                                </h2>
                                <h4> Total Orders</h4>
                                <h5>{{ $totalOrders }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card drag-item cursor-move mb-lg-0 mb-4">
                        <div class="card-body text-center">
                            <h2>
                                <i class="ti ti-user text-danger display-6"></i>
                            </h2>
                            <h4>Total Earing</h4>
                            <h5>{{ $totalClassFee }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card drag-item cursor-move mb-lg-0 mb-4">
                        <div class="card-body text-center">
                            <h2>
                                <i class="ti ti-book text-info display-6"></i>
                            </h2>
                            <h4>Total Class</h4>
                            <h5>{{ $totalclass }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card drag-item cursor-move mb-lg-0 mb-4">
                        <div class="card-body text-center">
                            <h2>
                                <i class="ti ti-book text-danger display-6"></i>
                            </h2>
                            <h4>PENDING Class</h4>
                            <h5>{{ $pendingClass }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!-- Revenue Growth -->
        <div class="col-xl-4 col-md-8 mb-4" hidden>
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

    </div>
</div>
  @endsection
