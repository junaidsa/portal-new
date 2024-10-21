@extends('layouts.app')
@section('main')
    <style>
        #pencil {
            position: absolute;
            left: 80%;
            top: 70%;
            z-index: 999;
            border-radius: 20px;
            background-color: #f5f3f3;
            padding: 5px;
            border: 1px solid #000;
            width: 28px;
            height: 28px;
            display: flex;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('public') }}/assets/img/pages/profile-banner.png" alt="Banner image"
                            class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto position-relative">
                            @if ($profile->profile_pic)
                                <img src="  /profile/{{ $profile->profile_pic }}" alt="user image"
                                    class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                            @else
                                <img src="{{ asset('public') }}/profile/demo.png" alt="user image"
                                    class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                            @endif
                            @if ($profile->id == Auth::id())
                                <div id="pencil">
                                    <svg data-bs-target="#exampleModal" data-bs-toggle="modal"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ @$profile->name }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item"><i class="ti ti-color-swatch"></i>{{ @$profile->role }}
                                        </li>
                                        @if (@$profile->date_of_birth)
                                            <li class="list-inline-item"><i class="ti ti-calendar"></i>
                                                {{ @$profile->date_of_birth }}</li>
                                        @endif

                                    </ul>
                                </div>
                                @if (@$profile->role == 'teacher')
                                    <a href="javascript:void(0)" class="btn btn-primary">
                                        <i class="ti ti-clipboard-text me-1"></i>CV/Resume
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item" data-target="profile">
                        <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}"
                            href="{{ url('profile/' . $profile->id) }}"><i class="ti ti-user-check ti-xs me-1"></i>
                            Profile</a>
                    </li>
                    @if ($profile->id == Auth::id())
                        <li class="nav-item edit-profile" data-target="edit-profile">
                            <a class="nav-link {{ request()->Is('profile/update-about/*') ? 'active' : '' }}"
                                href="{{ url('profile/update-about/' . $profile->id) }}"><i
                                    class="ti ti-users ti-xs me-1"></i> Edit
                                Profile</a>
                        </li>
                        <li class="nav-item password-change" data-target="password-change">
                            <a class="nav-link {{ request()->Is('profile/check-password/*') ? 'active' : '' }}"
                                href="{{ url('profile/check-password/' . $profile->id) }}"><i
                                    class="ti ti-layout-grid ti-xs me-1"></i> Change Password</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="profilepicForm" name="profilepicForm" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <p id="image-error" class="text-danger"></p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-3" id="originalBtn">Update</button>
                                <button class="buttonload" style="display:none" id="loader">
                                    <i class="fa fa-refresh fa-spin"></i>Loading
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Cards -->
        <div class="row g-4">
            {{-- ########################################################### --}}
            {{-- Password Chage --}}
            {{-- ########################################################### --}}
            <div class="container {{ request()->Is('profile/check-password/*') ? ' ' : 'd-none' }}" id="change-password">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner py-4">
                        <!-- Reset Password -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo -->
                                <div class="app-brand justify-content-center mb-4 mt-2">
                                    <h4 class="mb-1 pt-2">Reset Password 🔒</h4>
                                </div>
                                <!-- /Logo -->

                                <p class="mb-4"><span id="message"></span></p>
                                <form id="changePasswordFroum">
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Old Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="old_password" class="form-control" name="old_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="new_password" class="form-control" name="new_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="new_password" />
                                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="confirm_password">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="confirm_password" class="form-control"
                                                name="confirm_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary d-grid  mb-3" type="submit">Set new password</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Reset Password -->
                    </div>
                </div>
            </div>
            {{-- ################################################################ --}}
            {{-- Profile Update --}}
            {{-- ################################################################ --}}
            <div class="container-xxl flex-grow-1 container-p-y {{ request()->Is('profile/update-about/*') ? '' : 'd-none' }}"
                id="profile-update">
                <div class="row">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form id="EditFroum" action="{{url('profile/update')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ @$profile->id }}">
                                    <div class="col-md-6 flex-grow-1">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter Full Name" value="{{ $profile->name }}" name="name" />
                                                @error('name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                        </div>
                                    </div>
                                    @if (@$profile->role == 'student')
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Phone No.</label>
                                                <input class="form-control" type="number" id="phone_number"
                                                    value="{{ @$profile->phone_number }}" name="phone_number"
                                                    placeholder="Enter Phone Number" />
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cnic" class="form-label">NIC
                                                Number</label>
                                            <input class="form-control" type="text" id="cnic"
                                                value="{{ @$profile->cnic }}" name="cnic"
                                                placeholder="Enter NIC Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 flex-grow-1">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                                placeholder="Enter Email" value="{{ @$profile->email }}" />
                                                @error('email')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                        </div>
                                    </div>
                                    @if (@$profile->role == 'student')
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Student
                                                    Age | D O B :
                                                    <span class="text-danger">*</span></label>
                                                <input class="form-control @error('date_of_birth') is-invalid @enderror"
                                                    type="text" id="date_of_birth" name="date_of_birth"
                                                    placeholder="Enter Phone Number"
                                                    value="{{ @$profile->data_of_birth }}" />
                                                @error('date_of_birth')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                    @if (@$profile->role == 'teacher')
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="qalification" class="form-label">Qualifications</label>
                                                <input class="form-control" type="text" id="qalifications"
                                                    name="qalifications" placeholder="Enter Qualifications"
                                                    value="{{ @$profile->qualifications }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Teaching
                                                    Experience (Level)</label>
                                                <input type="text" class="form-control" id="experience"
                                                    name="experience" placeholder="Enter Teaching Level"
                                                    value="{{ @$profile->experience }}" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">Availability</label>
                                            <input type="text" class="form-control" name="availability" placeholder="Enter 9:00pm"
                                                value="{{ @$profile->availability }}">
                                        </div>
                                    @endif
                                    @if (@$profile->role == 'teacher')
                                    @php
                                 $subjectIds = $profile->subject ? json_decode($profile->subject, true) : [];
                                    @endphp
                                        <div class="col-12 col-md-6 mb-3 flex-grow-1">
                                            <label class="form-label" for="modalEditUserLanguage">Subject <span
                                                    class="text-danger">*</span></label>
                                            <select id="subject" name="subject[]"
                                                class="select2 form-select"
                                                multiple>
                                                @foreach ($subjects as $sub)
                                                <option value="{{ $sub->id }}" {{ in_array($sub->id, $subjectIds) ? 'selected' : '' }}>
                                                    {{ $sub->subject }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlReadOnlyInput1"
                                                    class="form-label">CV/Resume</label>
                                                <input class="form-control" type="file" id="resume" name="resume"
                                                    placeholder="Enter CV/Resume" />
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Bio</label>
                                            <input type="text" class="form-control" id="note" name="note"
                                                placeholder="Enter Bio" value="{{ @$profile->note }}" />
                                        </div>
                                    </div>
                                    @if (@$profile->role == 'teacher')
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Bank
                                                    Information</label>
                                                <input class="form-control" type="email"
                                                    id="exampleFormControlReadOnlyInput1"
                                                    placeholder="Enter bank Information"
                                                    value="{{ $profile->payment_information }}" />
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address">{{ @$profile->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Abouts --}}
            <div class="col-xl-12 col-lg-12 col-md-12 {{ request()->routeIs('profile.edit') ? '' : 'd-none' }}"
                id="about">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <small class="card-text text-uppercase">About</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span>
                                        <span>{{ $profile->name }}</span>
                                    </li>
                                    @if ($profile->cnic)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-id"></i><span class="fw-bold mx-2">NIC Number:</span>
                                            <span>{{ @$profile->cnic }}</span>
                                        </li>
                                    @endif
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span>
                                        <span>{{ $profile->email }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <small class="card-text text-uppercase">Qualifications</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    @if ($profile->qualifications)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-certificate"></i></i><span
                                                class="fw-bold mx-2">Qualifications:</span>
                                            <span>{{ $profile->qualifications }}</span>
                                        </li>
                                    @endif
                                    @if ($profile->experience)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-notebook"></i><span class="fw-bold mx-2">Teaching
                                                Experience:</span>
                                            <span>{{ $profile->experience }}</span>
                                        </li>
                                    @endif
                                    @if (!empty($profile->subject))
                                    @php
                                        // Decode the subject field, defaulting to an empty array if null
                                        $subjectIds = json_decode($profile->subject, true) ?? [];

                                        // Only proceed if $subjectIds is a valid array
                                        $subjectNames = [];
                                        if (is_array($subjectIds) && count($subjectIds) > 0) {
                                            $subjectNames = \DB::table('subjects')
                                                ->whereIn('id', $subjectIds)
                                                ->pluck('subject')
                                                ->toArray();
                                        }
                                    @endphp

                                    @if (!empty($subjectNames))
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-book"></i><span class="fw-bold mx-2">Subject:</span>
                                            <span>{{ implode(', ', $subjectNames) }}</span>
                                        </li>
                                    @endif
                                @endif

                                    @if ($profile->availability)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-clock"></i><span class="fw-bold mx-2">Availability:</span>
                                            <span>{{ $profile->availability }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <small class="card-text text-uppercase">Information</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    @if ($profile->note)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-info-circle"></i><span class="fw-bold mx-2">Bio:</span>
                                            <span>{{ @$profile->note }}</span>
                                        </li>
                                    @endif
                                    @if ($profile->payment_information)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-building-bank"></i><span class="fw-bold mx-2 fs-0">Bank
                                                Info:</span>
                                            <span>{{ $profile->payment_information }}</span>
                                        </li>
                                    @endif
                                    @if ($profile->address)
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="ti ti-address-book"></i><span class="fw-bold mx-2">Address:</span>
                                            <span>{{ @$profile->address }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-4">
                  <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Activity Timeline</h5>
                    <div class="card-action-element">
                      <div class="dropdown">
                        <button
                          type="button"
                          class="btn dropdown-toggle hide-arrow p-0"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <i class="ti ti-dots-vertical text-muted"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                          <li>
                            <hr class="dropdown-divider" />
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pb-0">
                    <ul class="timeline ms-1 mb-0">
                      <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-primary"></span>
                        <div class="timeline-event">
                          <div class="timeline-header">
                            <h6 class="mb-0">Client Meeting</h6>
                            <small class="text-muted">Today</small>
                          </div>
                          <p class="mb-2">Project meeting with john @10:15am</p>
                          <div class="d-flex flex-wrap">
                            <div class="avatar me-2">
                              <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div class="ms-1">
                              <h6 class="mb-0">Lester McCarthy (Client)</h6>
                              <span>CEO of Infibeam</span>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-success"></span>
                        <div class="timeline-event">
                          <div class="timeline-header">
                            <h6 class="mb-0">Create a new project for client</h6>
                            <small class="text-muted">2 Day Ago</small>
                          </div>
                          <p class="mb-0">Add files to new design folder</p>
                        </div>
                      </li>
                      <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-danger"></span>
                        <div class="timeline-event">
                          <div class="timeline-header">
                            <h6 class="mb-0">Shared 2 New Project Files</h6>
                            <small class="text-muted">6 Day Ago</small>
                          </div>
                          <p class="mb-2">
                            Sent by Mollie Dixon
                            <img
                              src="../../assets/img/avatars/4.png"
                              class="rounded-circle me-3"
                              alt="avatar"
                              height="24"
                              width="24"
                            />
                          </p>
                          <div class="d-flex flex-wrap gap-2 pt-1">
                            <a href="javascript:void(0)" class="me-3">
                              <img
                                src="../../assets/img/icons/misc/doc.png"
                                alt="Document image"
                                width="15"
                                class="me-2"
                              />
                              <span class="fw-semibold text-heading">App Guidelines</span>
                            </a>
                            <a href="javascript:void(0)">
                              <img
                                src="../../assets/img/icons/misc/xls.png"
                                alt="Excel image"
                                width="15"
                                class="me-2"
                              />
                              <span class="fw-semibold text-heading">Testing Results</span>
                            </a>
                          </div>
                        </div>
                      </li>
                      <li class="timeline-item timeline-item-transparent border-0">
                        <span class="timeline-point timeline-point-info"></span>
                        <div class="timeline-event">
                          <div class="timeline-header">
                            <h6 class="mb-0">Project status updated</h6>
                            <small class="text-muted">10 Day Ago</small>
                          </div>
                          <p class="mb-0">Woocommerce iOS App Completed</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> --}}
        </div>
        <!--/ Project Cards -->
    </div>
    <!-- / Content -->
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $("#changePasswordFroum").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('profile/update-password') }}", // Update the URL with the correct endpoint
                    method: 'post',
                    dataType: 'json',
                    data: $("#changePasswordFroum").serializeArray(),
                    success: function(response) {
                        // Your request
                        if (response.status == true) {
                            $("#new_password").removeClass('is-invalid').siblings('p')
                                .removeClass('invalid-feedback').html('');
                            // Handle success
                            $("#old_password").removeClass('is-invalid').siblings('p')
                                .removeClass('invalid-feedback').html('');
                            // Handle success
                            $("#confirm_password").removeClass('is-invalid').siblings('p')
                                .removeClass('invalid-feedback').html('');
                            location.reload();
                        } else {
                            // Your error handling logic here
                            var errors = response.errors;
                            if (errors.old_password) {
                                $("#old_password").addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').html(errors.old_password);
                            } else {
                                $("#old_password").removeClass('is-invalid').siblings('p')
                                    .removeClass('invalid-feedback').html('');
                            }
                            if (errors.new_password) {
                                $("#new_password").addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').html(errors.new_password);
                            } else {
                                $("#new_password").removeClass('is-invalid').siblings('p')
                                    .removeClass('invalid-feedback').html('');
                            }
                            if (errors.confirm_password) {
                                $("#confirm_password").addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').html(errors.confirm_password);
                            } else {
                                $("#confirm_password").removeClass('is-invalid').siblings('p')
                                    .removeClass('invalid-feedback').html('');
                            }
                        }
                    },
                    error: function(error) {
                        // Handle AJAX error, you can log it to the console for debugging
                        console.error("Ajax request failed: ", error);
                    }
                });
            });
            $('#profilepicForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $("button[type=submit]").prop('disabled', true);
                $.ajax({
                    url: "{{ url('profile/update-image') }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response.status);
                        if (response.status == false) {
                            $("button[type=submit]").prop('disabled', false);
                            var errors = response.error;
                            if (errors.image) {
                                $('#image-error').html(errors.image);
                            }
                        } else {
                            $("button[type=submit]").prop('disabled', false);
                            location.reload();
                        }
                    }
                });

                $('#old_password').change(function() {
                    var old_password = $('#old_password').val();
                    $.ajax({
                        url: "{{ url('profile/check-password') }}",
                        type: 'post',
                        data: {
                            old_password: old_password
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == false) {
                                $("#message").addClass('text-danger').text(response
                                    .message);
                            } else {
                                $("#message").addClass('text-success').text(response
                                    .message);
                            }
                        }
                    });

                });





            });
        });
    </script>
@endsection
