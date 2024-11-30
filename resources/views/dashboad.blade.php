@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">
@endsection
@section('main')
    <style>
        .dt-search {
            text-align: right;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @if (Auth::user()->role == 'super')
                @php
                    $totalAdmins = DB::table('users')->whereNull('deleted_at')->where('role', 'admin')->count();
                    $totalStaffs = DB::table('users')->whereNull('deleted_at')->where('role', 'staff')->count();
                    $totalTeacher = DB::table('users')->whereNull('deleted_at')->where('role', 'teacher')->count();
                    $totalStudent = DB::table('users')->whereNull('deleted_at')->where('role', 'student')->count();
                    $totalOrderAmount = DB::table('orders')->whereNull('deleted_at')->sum('amount');
                    $totalClassAmount = DB::table('schedules')
                        ->where('status', 1)
                        ->where('branch_id', 1)
                        ->sum('total_amount');
                    $grandTotal = $totalOrderAmount + $totalClassAmount;
                    $totalBranch = DB::table('branches')->whereNull('deleted_at')->count();

                    $orderCounts = DB::table('orders')
                        ->whereNull('deleted_at')
                        ->selectRaw('order_status, count(*) as count')
                        ->groupBy('order_status')
                        ->get()
                        ->pluck('count', 'order_status');
                    $pendingCount = $orderCounts['pending'] ?? 0;
                    $deliveredCount = $orderCounts['delivered'] ?? 0;

                @endphp
                <!-- Sales last year -->
                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Left side (icon and label) -->
                                <div class="text-center">
                                    <h3 class="success">
                                        <i class="ti ti-user-check me-2 text-primary fs-1"></i>
                                    </h3>
                                </div>
                                <!-- Right side (Total and number) -->
                                <div class="media-body text-right">
                                    <h6>ADMINS</h6>
                                    <span class="badge bg-label-primary px-4">{{ $totalAdmins }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sessions Last month -->
                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between align-items-center">
                                <div class="media-body text-left">
                                    <h3 class="success text-center">
                                        <i class="menu-icon tf-icons ti ti-users fs-1 text-secondary"></i>
                                    </h3>
                                </div>
                                <div class="media-body text-right">
                                    <h6>STAFFS</h6>
                                    <span class="badge bg-label-secondary px-4">{{ $totalStaffs }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Profit -->
                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between align-items-center">
                                <div class="media-body text-left">
                                    <h3 class="success text-center">
                                        <i class="menu-icon tf-icons ti ti-user fs-1 text-success"></i>
                                    </h3>
                                </div>
                                <div class="media-body text-right">
                                    <h6>TEACHERS</h6>
                                    <span class="badge bg-label-success px-4 ms-4">{{ $totalTeacher }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Sales -->
                <div class="col-md-3 col-sm-6 col-12 mb-4">
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
                                </div>
                                <div class="media-body text-right">
                                    <h6>STUDENTS</h6>
                                    <span class="badge bg-label-danger px-4 ms-3">{{ $totalStudent }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between align-items-center">
                                <div class="media-body text-left">
                                    <h3 class="success text-center">
                                        <svg class="h-8 w-8 text-warning" width="38" height="38" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="7" cy="18" r="2" />
                                            <circle cx="7" cy="6" r="2" />
                                            <circle cx="17" cy="12" r="2" />
                                            <line x1="7" y1="8" x2="7" y2="16" />
                                            <path d="M7 8a4 4 0 0 0 4 4h4" />
                                        </svg>
                                    </h3>
                                </div>
                                <div class="media-body text-right">
                                    <h6>BRANCHES</h6>
                                    <span class="badge bg-label-warning px-4 ms-3">{{ $totalBranch }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between align-items-center">
                                <div class="media-body text-left">
                                    <h3 class="success text-center">
                                        <svg class="h-8 w-8 text-dark" width="38" height="38" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="7" cy="17" r="2" />
                                            <circle cx="17" cy="17" r="2" />
                                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h6l3 5" />
                                            <line x1="3" y1="9" x2="7" y2="9" />
                                        </svg>
                                    </h3>
                                </div>
                                <div class="media-body text-right">
                                    <h6>ORDER PENDING</h6>
                                    <span class="badge bg-label-dark px-4 ms-5">{{ $pendingCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Sales -->
                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between align-items-center">
                                <div class="media-body text-left">
                                    <h3 class="success text-center">
                                        <svg class="h-8 w-8 text-muted" width="38" height="38"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="7" cy="17" r="2" />
                                            <circle cx="17" cy="17" r="2" />
                                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h6l3 5" />
                                            <line x1="3" y1="9" x2="7" y2="9" />
                                        </svg>
                                    </h3>
                                </div>
                                <div class="media-body text-right">
                                    <h6>ORDER DELIVER</h6>
                                    <span class="badge bg-label-success px-4 ms-5">{{ $deliveredCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sessions Last month -->
                <div class="col-md-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between align-items-center">
                                <div class="media-body text-left">
                                    <h3 class="success text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                            fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                            <path
                                                d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z" />
                                            <path
                                                d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </h3>
                                </div>
                                <div class="media-body text-right">
                                    <h6>Earnings</h6>
                                    <span class="badge bg-label-info px-4">{{ $grandTotal }} MVR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Profit -->
            @elseif(Auth::user()->role == 'student')
                @php
                    $orderCounts = DB::table('orders')
                        ->selectRaw('order_status, count(*) as count')
                        ->where('user_id', Auth::id())
                        ->groupBy('order_status')
                        ->get()
                        ->pluck('count', 'order_status');
                    $pendingCount = $orderCounts['Processing'] ?? 0.0;
                    $deliveredCount = $orderCounts['Delivered'] ?? 0.0;
                    $totalOrders = $orderCounts->sum();
                    $classCounts = DB::table('schedule_timings')
                        ->selectRaw('status, count(*) as count')
                        ->where('student_id', Auth::id())
                        ->groupBy('status')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            $statusName = $item->status == 0 ? 'pending' : ($item->status == 1 ? 'delivered' : 'other');
                            return [$statusName => $item->count];
                        });

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
                                    <h6>{{ $totalOrders }}</h6>
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
                                <h6>{{ $pendingCount }}</h6>
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
                                <h6>{{ $totalclass }}</h6>
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
                                <h6>{{ $pendingClass }}</h6>
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
                    $pendingCount = $orderCounts['pending'] ?? 0.0;
                    $deliveredCount = $orderCounts['delivered'] ?? 0.0;
                    $totalOrders = $orderCounts->sum();
                    $classCounts = DB::table('schedule_timings')
                        ->selectRaw('status, count(*) as count')
                        ->where('teacher_id', Auth::id())
                        ->groupBy('status')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            $statusName = $item->status == 0 ? 'pending' : ($item->status == 1 ? 'delivered' : 'other');
                            return [$statusName => $item->count];
                        });

                    // Access counts
                    $pendingClass = $classCounts['pending'] ?? 0.0;
                    $deliveredClass = $classCounts['delivered'] ?? 0.0;
                    $totalclass = $classCounts->sum();
                    $totalClassFee = DB::table('assign_classes')->where('teacher_id', Auth::id())->sum('class_fee');
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
                                    <h6>{{ $totalOrders }}</h6>
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
                                <h6>{{ $totalClassFee }}</h6>
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
                                <h6>{{ $totalclass }}</h6>
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
                                <h6>{{ $pendingClass }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div>
                <div class="mt-3">
                    <!-- Modal -->
                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ url('/shortcut/store') }}" method="POST" id="shortcut">
                                    @csrf
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modalCenterTitle">Create</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="name" class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Enter Name"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="url" class="form-label">Link <span
                                                        class="text-danger">*</span></label>
                                                <input type="url"
                                                    class="form-control @error('url') is-invalid @enderror" id="url"
                                                    name="url" placeholder="Create Link" value="{{ old('url') }}"
                                                    pattern="https://.*" />
                                                @error('url')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                             Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h6>Today Classes Report</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Teacher Name</th>
                                        <th>Studend Name</th>
                                        <th>Class Type</th>
                                        <th>Level</th>
                                        <th>Subject</th>
                                        <th>Date </th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        @if (in_array(Auth::user()->role, ['admin', 'staff', 'super']))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scheduleTimings as $schedule_timing)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$schedule_timing->schedule->student->name ?? 'Not Assigned' }}</td>
                                            <td>{{ @$schedule_timing->teacher->name ?? 'Not Assigned' }}</td>
                                            <td>{{ @$schedule_timing->classType->name }}</td>
                                            <td>{{ @$schedule_timing->schedule->level->name }}</td>
                                            <td>{{ @$schedule_timing->schedule->subject->subject }}</td>
                                            <td>{{ \Carbon\Carbon::parse(@$schedule_timing->schedule_date)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse(@$schedule_timing->schedule_time)->format('h:i A') }}</td>
                                            <td>{{ $schedule_timing->status == 1 ? 'Done' : 'Pending' }}</td>
                                            @if (in_array(Auth::user()->role, ['admin', 'staff', 'super']))
                                                <td>
                                                    @if ($schedule_timing->status == 0 && $schedule_timing->reminder_sent_at == 0)
                                                        <a href="#">
                                                            <button class="btn btn-sm btn-primary send-reminder"
                                                                data-id="{{ $schedule_timing->id }}">
                                                                Send Reminder
                                                            </button>
                                                        </a>
                                                    @else
                                                        <span class="badge badge-success">Reminder Sent</span>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Activity Timeline -->
            <div class="col-xl-12 col-md-12 col-12 mt-4">
                <div class="card card-developer-meetup">
                    <div class="card-body">
                        <div class="meetup-header d-flex justify-content-between">
                            <div>
                                <h4 class="card-title mb-25">Shortcuts</h4>
                                <span><a href="{{ url('sortcut/create') }}"></a></span>

                            </div>
                            <div>
                                <a class="" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-plus font-medium-3 cursor-pointer">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg></a>

                            </div>
                        </div>

                        <div class="media">
                            @foreach ($shortcut as $shortcut)
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-10 mb-3">
                                            <h6 class="mb-0">{{ $shortcut->name }}</h6>
                                            <a href="{{ $shortcut->url }}" target="_blank"
                                                id="copyText"><small>{{ $shortcut->url }}</small></a>
                                        </div>
                                        <div class="col-md-2">
                                            <span class=""
                                                onclick="copyToClipboard({{ json_encode($shortcut->url) }})"
                                                style="cursor: pointer">
                                                <i class="fa-regular fa-copy"></i>
                                            </span>
                                            <span><a href="javascript:;" class="delete-btn text-danger"
                                                    name="{{ $shortcut->name }}" id="{{ $shortcut->id }}"><i
                                                        class="ti ti-trash "></i></a></span>
                                        </div>
                                        <hr>
                                    </div>


                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('link-js')
    <script src="{{ asset('public') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('public') }}/assets/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vfs-fonts/2.0.0/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
    <script>
            $(document).on('click', '.send-reminder', function (e) {
        e.preventDefault();
        const id = $(this).data('id');

        $.ajax({
            url:  `{{ url('/send-reminder') }}/${id}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    alert('Reminder sent successfully!');
                    location.reload();
                } else {
                    alert('Failed to send reminder. Please try again.');
                }
            },
            error: function () {
        alert('An error occurred while sending the reminder.');
            }
        });
    });
        let table = new DataTable('#myTable', {
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export',
                title: 'My Classes'
            }]
        });
        $("body").on('click', '.delete-btn', function() {
            var id = $(this).attr('id')
            var name = $(this).attr('name')
            Swal.fire({
                html: `Are you really want to delete?`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(result) {
                if (result.value) {
                    window.location.href = "{{ url('/shortcut/delete/') }}/" + id
                }
            });
        })

        function copyToClipboard(text) {
            const tempInput = document.createElement('textarea');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();

            try {
                document.execCommand('copy');
                Swal.fire({
                    icon: 'success',
                    title: 'Copied!',
                    text: 'URL copied to clipboard!',
                    timer: 2000,
                    showConfirmButton: false
                });
            } catch (err) {
                console.error('Failed to copy text:', err);
            }
            document.body.removeChild(tempInput);
        }
    </script>
@endsection
