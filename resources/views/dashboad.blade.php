@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
     @if (Auth::user()->role == 'super')
            @php
                $totalAdmins = DB::table('users')
                ->where('role', 'admin')
                ->count();
                $totalStaffs = DB::table('users')
                ->where('role', 'staff')
                ->count();
                $totalTeacher = DB::table('users')
                ->where('role', 'teacher')
                ->count();
                $totalStudent = DB::table('users')
                ->where('role', 'student')
                ->count();
                $totalProduct = DB::table('products')
                ->whereNull('deleted_at')
                ->count();


                $totalBranch = DB::table('branches')
                ->count();

                $orderCounts = DB::table('orders')
                ->selectRaw('order_status, count(*) as count')
                ->groupBy('order_status')
                ->get()
                ->pluck('count', 'order_status');
                // Access counts like this:
                $pendingCount = $orderCounts['pending'] ?? 0;
                $deliveredCount = $orderCounts['delivered'] ?? 0;

            @endphp
            <!-- Sales last year -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <i class="ti ti-user-check me-2 ti-sm fs-1 text-primary"></i>
                                </h3>
                                <span class="d-block text-center">ADMINS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$totalAdmins}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sessions Last month -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <i class="menu-icon tf-icons ti ti-users fs-1 text-secondary"></i>
                                </h3>
                                <span class="d-block text-center">STAFFS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$totalStaffs}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Profit -->
            <div class="col-md-3 col-6 mb-4">
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
                                <span>{{$totalTeacher}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Sales -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school text-danger">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="primary" />
                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                    </svg>

                                </h3>
                                <span class="d-block text-center">STUDENTS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$totalStudent}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg class="h-8 w-8 text-warning"  width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="7" cy="18" r="2" />
                                        <circle cx="7" cy="6" r="2" />
                                        <circle cx="17" cy="12" r="2" />
                                        <line x1="7" y1="8" x2="7" y2="16" />
                                        <path d="M7 8a4 4 0 0 0 4 4h4" />
                                    </svg>
                                </h3>
                                <span class="d-block text-center">BRANCHES</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$totalBranch}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sessions Last month -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg class="h-8 w-8 text-info"  width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                        <line x1="3" y1="6" x2="3" y2="19" />
                                        <line x1="12" y1="6" x2="12" y2="19" />
                                        <line x1="21" y1="6" x2="21" y2="19" />
                                    </svg>
                                </h3>
                                <span class="d-block text-center">BOOKS</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$totalProduct}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Profit -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg class="h-8 w-8 text-dark"  width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="7" cy="17" r="2" />
                                        <circle cx="17" cy="17" r="2" />
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                        <line x1="3" y1="9" x2="7" y2="9" />
                                    </svg>
                                </h3>
                                <span class="d-block text-center">ORDER PENDING</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$pendingCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Sales -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between align-items-center">
                            <div class="media-body text-left">
                                <h3 class="success text-center">
                                    <svg class="h-8 w-8 text-muted"  width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="7" cy="17" r="2" />
                                        <circle cx="17" cy="17" r="2" />
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                        <line x1="3" y1="9" x2="7" y2="9" />
                                    </svg>
                                </h3>
                                <span class="d-block text-center">ORDER DELIVER</span>
                            </div>
                            <div class="media-body text-right">
                                <h3>Total</h3>
                                <span>{{$deliveredCount }}</span>
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
$pendingCount = $orderCounts['pending'] ?? 0.00;
$deliveredCount = $orderCounts['delivered'] ?? 0.00;
$totalOrders = $orderCounts->sum();


                $classCounts = DB::table('schedule_timings')
    ->selectRaw('status, count(*) as count')
    ->where('student_id', Auth::id())
    ->groupBy('status')
    ->get()
    ->pluck('count', 'status');

// Access counts
$pendingClass = $classCounts['pending'] ?? 0.00;
$deliveredClass = $classCounts['delivered'] ?? 0.00;

// Option 1: Total from orderCounts
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



            <div>
                <div class="mt-3">
                  <!-- Modal -->
                  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="{{ url('/shortcut/store') }}" method="POST" id="shortcut">
                            @csrf
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Create</h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-12 mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}"/>
                                @error('name')
                                <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                              </div>
                              <div class="col-12 mb-3">
                                <label for="url" class="form-label">Link <span class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="Create Link" value="{{ old('url') }}" pattern="https://.*"/>
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

            <!-- Activity Timeline -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="card-body">
                        <div class="meetup-header d-flex justify-content-between">
                            <div>
                                <h4 class="card-title mb-25">Shortcuts</h4>
                                <span><a href="{{url('sortcut/create')}}"></a></span>

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
                                        <a href="{{ $shortcut->url }}" target="_blank" id="copyText"><small>{{ $shortcut->url }}</small></a>
                                    </div>
                                    <div class="col-md-2">
                                        {{-- <span onclick="copyToClipboard()" style="cursor: pointer"><i class="fa-regular fa-copy"></i></span> --}}
                                        <span class="m-2" onclick="copyToClipboard({{ json_encode($shortcut->url) }})" style="cursor: pointer">
                                            <i class="fa-regular fa-copy"></i>
                                        </span>
                                        <span><a href="javascript:;" class="delete-btn text-danger" name="{{$shortcut->name}}"  id="{{$shortcut->id}}"><i class="ti ti-trash me-2"></i></a></span>
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
    <script>
          $("body").on('click', '.delete-btn', function () {
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
      }).then(function (result) {
                  if (result.value) {
                      window.location.href = "{{url('/shortcut/delete/')}}/"+id
                  }
      });
       })
       function copyToClipboard(text) {
    // Create a temporary textarea to copy text from
    const tempInput = document.createElement('textarea');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();

    try {
        // Corrected method to copy text
        document.execCommand('copy');

        // Show SweetAlert for successful copy
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

    // Remove the temporary textarea
    document.body.removeChild(tempInput);
}

    </script>
@endsection
