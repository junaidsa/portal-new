@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Teacher /</span> Teacher Registeration</h4>
        <div class="row">
            <div class="card mb-4">
                <h5 class="card-header">Teacher Form</h5>
                <div class="card-body">
                    <form id="teacher_forum" action="{{ url('teacher/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="{{ $branch->id }}" name="branch_id" id="branch_id">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter Full Name"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Phone No <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('phone_number') is-invalid @enderror" type="number"
                                        id="phone_number" name="phone_number" placeholder="Enter Phone Number"
                                        value="{{ old('phone_number') }}" />
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Enter Email" name="email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">NIC Number <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('cnic') is-invalid @enderror" type="text"
                                        id="cnic" name="cnic" placeholder="Enter NIC Number"
                                        value="{{ old('cnic') }}" />
                                    @error('cnic')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Qualifications <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('qualification') is-invalid @enderror" type="text"
                                        id="qualification" name="qualification" placeholder="Enter Qualifications"
                                        value="{{ old('qualification') }}" />
                                    @error('qualification')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Teaching <small>Experience
                                            (Level)</small> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('experience') is-invalid @enderror"
                                        id="experience" name="experience" placeholder="Enter Teaching Experience"
                                        value="{{ old('experience') }}" />
                                    @error('experience')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="TagifyBasic" class="form-label">Subject</label>
                                <input id="tags-input" name="subject[]" class="form-control" />
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label" for="modalEditUserStatus">Availability <small>(Type Your Timings
                                        Like : 9am to 10pm)</small> <span class="text-danger">*</span></label>
                                <input type="text" name="availability" id="availability"
                                    class="form-control @error('availability') is-invalid @enderror"
                                    placeholder="09:00am to 10:00pm" value="{{ old('availability') }}">
                                @error('availability')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control flatpickr @error('date_of_birth') is-invalid @enderror"
                                        id="date_of_birth" placeholder="Date of Birth" name="date_of_birth"
                                        value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        id="city" name="city" placeholder="Enter Your City"
                                        value="{{ old('city') }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="TagifyBasic" class="form-label">Level <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="level_input" name="level[]" class="form-control">
                                    @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="bank_info" class="form-label">Bank Information <span
                                            class="text-danger">*</span></label>
                                    <textarea name="payment_information" class="form-control @error('payment_information') is-invalid @enderror"
                                        id="payment_information" placeholder="Enter Bank Information" rows="2">{{ old('payment_information') }}</textarea>
                                    @error('payment_information')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="node" class="form-label">Bio</label>
                                    <textarea class="form-control" id="node" name="note" rows="3" placeholder="Enter Bio">{{ old('note') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="resume" class="form-label">CV/Resume <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('resume') is-invalid @enderror" type="file"
                                        id="resume" name="resume" accept=".pdf, .doc, .docx" />
                                    @error('resume')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('javascript')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                flatpickr('.flatpickr', {
                    dateFormat: "Y-m-d"
                });
            });
        </script>
    @endsection
