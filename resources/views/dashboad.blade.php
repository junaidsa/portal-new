@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Sales last year -->
            <div class="col-xl-2 col-md-4 col-6 mb-4" hidden>
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
            <div class="col-xl-2 col-md-4 col-6 mb-4"  hidden>
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
            <div class="col-xl-2 col-md-4 col-6 mb-4" hidden>
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
            <div class="col-xl-2 col-md-4 col-6 mb-4" hidden>
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



            <div class="">
                <div class="mt-3">
                  <!-- Modal -->
                  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="{{ url('/shortcut/store') }}" method="POST" id="shortcut">
                            @csrf
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
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

                                {{-- <a href="javascript:void(0);" class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-trash font-medium-3 text-danger cursor-pointer">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </a> --}}
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
