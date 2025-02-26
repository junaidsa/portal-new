@extends('layouts.app')
@section('main')
    @php
        $progressMap = [
            'pending' => 20,
            'process' => 50,
            'incomplete' => 75,
            'done' => 100,
        ];
    @endphp
    <!-- Project Cards -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4">
            @foreach ($supports as $s)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-start">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="{{ asset('public') }}/assets/img/icons/brands/social-label.png"
                                            alt="Avatar" class="rounded-circle" />
                                    </div>
                                    <div class="me-2 ms-1">
                                        <h5 class="mb-0">
                                            <a href="javascript:;" class="text-body">{{ $s->title }}</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown zindex-2">
                                        <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('support/create/' . $s->id) }}">Reply</a></li>
                                            <li><a class="dropdown-item" href="{{ url('support/details/' . $s->id) }}">View details</a></li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item text-danger delete-btn" href="javascript:void(0);"
                                                    name="{{ $s->title }}" id="{{ $s->id }}">Delete Ticket</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ @$s->remarks }} </p>
                        </div>
                        <div class="card-body border-top">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="mb-1">Hours: <span class="text-body fw-normal">{{ $s->hours_elapsed }}</span>
                                </h6>
                                <span class="badge bg-label-success ms-auto">{{ @$s->days_elapsed }} Days</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
                                <a class="btn btn-primary btn-sm" href="{{ url('support/details/' . $s->id) }}">View details</a>
                                <small>{{ @$s->user->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--/ Project Cards -->
@endsection
@section('javascript')
    <script>
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
                    window.location.href = "{{ url('/support/deleted/') }}/" + id
                }
            });
        });

        // Debugging script for button click
        $("body").on('click', '.btn-primary', function(e) {
            console.log("Button Clicked");
        });
    </script>
@endsection