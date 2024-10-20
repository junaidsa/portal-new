@extends('layouts.app')
@section('main')
<style>

</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Student /</span> Registration
    </h4>
    <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
        <div class="bs-stepper-header">
            <div class="step {{request()->segment(2) == 'step-1' ? 'active' : ''}}" data-target="#personal-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-user"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Personal Details</span>
                        <!-- <span class="bs-stepper-subtitle">Your Name/Email</span> -->
                    </span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step {{request()->segment(2) == 'step-2' ? 'active' : ''}}" data-target="#property-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-home ti-sm"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title" style="font-size:0.8rem">Tuition Registeration</span>
                    </span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step {{ request()->segment(2) == 'step-3' ? 'active' : ''}}" data-target="#property-features">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-building-bank"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Bank Details</span>
                        <!-- <span class="bs-stepper-subtitle">Bedrooms/Floor No</span> -->
                    </span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#property-area">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-circle-check"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Confirm Deatils</span>
                        <!-- <span class="bs-stepper-subtitle">Covered Area</span> -->
                    </span>
                </button>
            </div>
            <div class="line"></div>
        </div>
        <div class="bs-stepper-content">
            <div id="wizard-property-listing-form">
                @if (request()->segment(2) == 'step-1')
                <div id="step">
                 <form action="{{url('students/step1')}}" method="POST">
                     @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="hidden" value="{{$branch->id}}" name="branch_id" id="branch_id">
                            <label class="form-label" for="Student Name">Student Name:</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter Student Name" />
                                @error('name')
                                <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="Parent">Parent / Guardian Name:</label>
                            <input type="text" id="parent_name" name="parent_name" class="form-control @error('parent_name') is-invalid @enderror"
                                placeholder="Enter Your Parent Name" />
                                @error('parent_name')
                                <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="Email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter Your Email" />
                                @error('email')
                                <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                            <span class="text-light">You will receive class notification on this email.</span>
                        </div>
                        <div class="col-md-6 form-password-toggle">
                            <label class="form-label" for="Phone Or WhatsApp Number">Phone Or WhatsApp Number:</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    placeholder="Enter Your Number" />
                                    @error('phone_number')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="Student Age | D O B ">Student Age | D O B :</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror flatpickr"
                                placeholder="DD,MM,YYYY" />
                                @error('date_of_birth')
                                <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="note">Remarks:</label>
                            <textarea name="note" id="note" cols="" rows="3" class="form-control"></textarea>
                            <span class="text-light">Please write any instructions for the tutor, exam preparation
                                information to share, or mention any specific chapters or content here.</span>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-4">
                            <button class="btn btn-label-secondary btn-prev" disabled>
                                <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right ti-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @elseif (request()->segment(2) == 'step-2')
                <div id="property-details" class="step2">
                    <div class="row pb-2">
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="stonline">
                                    <span class="custom-option-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="48px"
                                            viewBox="0 0 576 512">
                                            <path fill="#066aab"
                                                d="M218.3 8.5c12.3-11.3 31.2-11.3 43.4 0l208 192c6.7 6.2 10.3 14.8 10.3 23.5H336c-19.1 0-36.3 8.4-48 21.7V208c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h64V416H112c-26.5 0-48-21.5-48-48V256H32c-13.2 0-25-8.1-29.8-20.3s-1.6-26.2 8.1-35.2l208-192zM352 304V448H544V304H352zm-48-16c0-17.7 14.3-32 32-32H560c17.7 0 32 14.3 32 32V448h32c8.8 0 16 7.2 16 16c0 26.5-21.5 48-48 48H544 352 304c-26.5 0-48-21.5-48-48c0-8.8 7.2-16 16-16h32V288z">
                                            </path>
                                        </svg>
                                        <span class="custom-option-title">1-1 Online Tuition</span>
                                        <!-- <small>List property as Builder, list your project and get highest reach.</small> -->
                                    </span>
                                    <input name="class_type" class="form-check-input" type="radio"
                                        value="1" id="stonline"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="sthome">
                                    <span class="custom-option-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="#066aab"
                                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z">
                                            </path>
                                        </svg>
                                        <span class="custom-option-title">1-1 Home Tuition</span>
                                        <!-- <small>Submit property as an Individual. Lease, Rent or Sell at the best price.</small> -->
                                    </span>
                                    <input name="class_type" class="form-check-input" type="radio"
                                        value="2" id="sthome" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="stgroup">
                                    <span class="custom-option-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="48px"
                                            viewBox="0 0 576 512">
                                            <path fill="#066aab"
                                                d="M64 96c0-35.3 28.7-64 64-64H512c35.3 0 64 28.7 64 64V352H512V96H128V352H64V96zM0 403.2C0 392.6 8.6 384 19.2 384H620.8c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8H76.8C34.4 480 0 445.6 0 403.2zM288 160c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H352v48c0 8.8-7.2 16-16 16H304c-8.8 0-16-7.2-16-16V272H240c-8.8 0-16-7.2-16-16V224c0-8.8 7.2-16 16-16h48V160z">
                                            </path>
                                        </svg>
                                        <h1 class="custom-option-title">Online Group Tuition</h1>
                                    </span>
                                    <input name="class_type" class="form-check-input" type="radio"
                                        value="3" id="stgroup" />
                                </label>
                            </div>
                        </div>

                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="stphysical">
                                    <span class="custom-option-body">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="#066aab" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                            <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                        </svg>
                                        <h1 class="custom-option-title">Physical Tuition</h1>
                                    </span>
                                    <input name="class_type" class="form-check-input" type="radio"
                                        value="4" id="stphysical" />
                                </label>
                            </div>
                        </div>

                    </div>
<div id="tutions">

</div>
                </div>
                @elseif (request()->segment(2) == 'step-3')
                 <div id="property-features" class="step3">
                     <div class="row g-3">
                         <div class="col-md-6">
                             <h4>Stripe Credit Card <span class="text-danger">*</span></h4>
                             <div class="mb-3">
                                 <button class="tag-toggle" onclick="toggleTags()"
                                     style="background: none; border: none;">
                                     <i class="text-success" class="ti ti-lock"></i> Secure, 1-click checkout with
                                     Link<i class="ti ti-chevron-down"></i>
                                 </button>
                                 <div class="tags-container">
                                     <div class="tags-list hidden mb-5">
                                         <span class="dismiss-icon" onclick="toggleTags()">×</span>
                                         <input type="email" class="form-control" placeholder="Enter Email"
                                             id="stemail" name="stemail">
                                         <p>Securely pay with your saved info, or create a Link account for faster
                                             checkout next time.</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label" for="Card No">Card No</label>
                             <input type="number" id="stcard" name="stcard" class="form-control"
                                 placeholder="1234 1234 1234" />
                         </div>
                         <div class="col-md-3">
                             <label class="form-label" for="Expiration date">Expiration date</label>
                             <input type="date" id="stexpiration" name="stexpiration"
                                 class="form-control flatpickr" />
                         </div>
                         <div class="col-md-3">
                             <label class="form-label" for="Security code">Security code</label>
                             <input type="text" id="stsecurity" name="stsecurity" class="form-control" />
                         </div>
                         <div class="col-md-6">
                             <label class="form-label" for="Country">Country</label>
                             <select id="stcountry" name="stcountry" class="form-select">
                                 <option selected value="">Select Country</option>
                                 <option value="1">Pakistan</option>
                                 <option value="2">India</option>
                                 <option value="3">Iran</option>
                                 <option value="4">Iraq</option>
                             </select>
                         </div>
                         <div class="col-12 d-flex justify-content-between mt-4">
                             <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                             </button>
                             <button class="btn btn-primary btn-next">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                             </button>
                         </div>
                     </div>
                 </div>
                 @elseif(request()->segment(2) == 'step-4')
                 <div id="property-area" class="step4">
                     <div class="row g-3">
                         <div class=" d-flex justify-content-center">
                             <div class="col-lg-6">
                                 <div class="text-center">
                                     <div class="mb-4">
                                         <i class="ti ti-circle-check text-success display-4"></i>
                                     </div>
                                     <div>
                                         <h5>Confirm Detail</h5>
                                         <p class="text-muted">If several languages coalesce, the grammar of
                                             the resulting</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 d-flex justify-content-between mt-4">
                             <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                             </button>
                             <button class="btn btn-primary btn-next">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                             </button>
                         </div>
                     </div>
                 </div>
                @endif


                </div>
        </div>
    </div>
    <!--/ Property Listing Wizard -->
</div>
@endsection
@section('link-js')
  {{-- <script src="{{asset('public')}}/assets/vendor/libs/bs-stepper/bs-stepper.js"></script> --}}
    <!-- Page JS -->

    {{-- <script src="{{asset('public')}}/assets/js/wizard-ex-property-listing.js"></script> --}}

@endsection
@section('javascript')
<script>
    $('input[name="class_type"]').change(function() {
        const selectedOption = $('input[name="class_type"]:checked').val();
        $.ajax({
            url: "{{ url('students/s2') }}",
            method: 'POST',
            dataType: 'json',
            data: {
                selectedOption: selectedOption,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
            $('#tutions').html(response.html);
            },
            error: function(xhr, status, error) {
            console.error('AJAX Error: ' + error);
        }
    });
    $(document).on('change', '#tuition_id', function() {
    var tuitionId = $(this).val();
    if (tuitionId) {
        $.ajax({
            url: "{{ route('get.subjects') }}",
            method: 'POST',
            data: {
                tuition_id: tuitionId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#subject_id').empty();
                $('#subject-drop').removeClass('d-none');
                $('#subject_id').append('<option value="">Select subject</option>');

                $.each(response, function(key, subject) {
                    $('#subject_id').append('<option value="' + subject.id + '">' + subject.subject + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    } else {
        $('#subject_id').empty();
        $('#subject_id').append('<option value="">Select subject</option>');
    }
})
    })
</script>
@endsection
