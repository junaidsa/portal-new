@extends('layouts.app')
@if (request()->segment(2) == 'step-3')
    @section('link-js')
        <script src="https://js.stripe.com/v3/"></script>
    @endsection
@endif
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Student /</span> Registration
        </h4>
        <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
            <div class="bs-stepper-header">
                <div class="step {{ request()->segment(2) == 'step-1' ? 'active' : '' }}" data-target="#personal-details">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="ti ti-user"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Personal Details</span>
                            <!-- <span class="bs-stepper-subtitle">Your Name/Email</span> -->
                        </span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step {{ request()->segment(2) == 'step-2' ? 'active' : '' }}" data-target="#property-details">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="ti ti-home ti-sm"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title" style="font-size:0.8rem">Tuition Registeration</span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step {{ request()->segment(2) == 'step-3' ? 'active' : '' }}" data-target="#property-features">
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
                            <form action="{{ url('students/step1') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="Student Name">Student Name:</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Student Name" />
                                        @error('name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="Parent">Parent / Guardian Name:</label>
                                        <input type="text" id="parent_name" name="parent_name"
                                            class="form-control @error('parent_name') is-invalid @enderror"
                                            placeholder="Enter Your Parent Name" />
                                        @error('parent_name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="Email">Email:</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter Your Email" />
                                        @error('email')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <span class="text-light">You will receive class notification on this email.</span>
                                    </div>
                                    <div class="col-md-6 form-password-toggle">
                                        <label class="form-label" for="Phone Or WhatsApp Number">Phone Or WhatsApp
                                            Number:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="phone_number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                name="phone_number" placeholder="Enter Your Number" />
                                            @error('phone_number')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <label for="Student Age | D O B " class="form-label">Student Age | D O B</label>
                                        <input type="text"
                                            class="form-control flatpickr-input @error('date_of_birth') is-invalid @enderror"
                                            placeholder="Month DD, YYYY" name="date_of_birth" />
                                        @error('date_of_birth')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="note">Address:</label>
                                        <textarea name="address" id="address" cols="" rows="2" class="form-control"></textarea>
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
                        </form>
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
                                            </span>
                                            <input name="class_type" class="form-check-input" type="radio"
                                                value="1" id="stonline" />
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
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="#066aab"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
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
                            <!-- Other HTML content... -->

                            <form id="payment-form" method="POST">
                                @csrf
                                <span id="card-header" class="ms-3">Payment Method</span>
                                <br>
                                <input type="text" name="total_feee_pay" id="total_feee_pay">
                                <div class="row mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Card Holder Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="card-holder-name" name="card_holder_name"
                                            class="form-control" placeholder="Enter Card Holder Name" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter Email" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Card Details <span class="text-danger">*</span></label>
                                        <div id="card-element" class="form-control"></div>
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-primary">Submit
                                    Payment</button>
                            </form>
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
@endsection
@section('javascript')
    <script>
        // Check if the step containing the payment form is visible
        if ($('.step3').is(':visible')) {
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");
            const elements = stripe.elements();
            const cardElement = elements.create('card');

            // Mount the card element
            cardElement.mount('#card-element');

            // Handle form submission
            $('#payment-form').on('submit', async function(e) {
                e.preventDefault();

                const cardHolderName = $('#card-holder-name').val();
                const email = $('#email').val();
                const totalAmount = $('#total_feee_pay')
            .val(); // Ensure this element exists and has the value you expect

                try {
                    const response = await fetch("{{ url('/create-payment-intent') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            amount: totalAmount
                        })
                    });

                    const {
                        clientSecret
                    } = await response.json();

                    // Confirm the payment with Stripe
                    const {
                        error,
                        paymentIntent
                    } = await stripe.confirmCardPayment(clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName,
                                email: email
                            }
                        }
                    });

                    if (error) {
                        alert('Payment failed: ' + error.message);
                    } else if (paymentIntent.status === 'succeeded') {
                        alert('Payment successful!');
                        // Proceed with any additional steps or redirect
                    }
                } catch (err) {
                    alert('Error: ' + err.message);
                }
            });
        }

        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(".flatpickr-input", {
                dateFormat: "F d, Y",
                allowInput: true
            });
            flatpickr('.flatpickr', {
                dateFormat: "Y-m-d"
            });
        });

        function updateTotal() {
            const selectedOption = $('#level_id').find(':selected');
            const levelId = selectedOption.val();
            const levelName = selectedOption.data('name');
            const pricePerHour = parseFloat(selectedOption.data('price')) || 0;
            const registrationFee = parseFloat($('#registration_fee').text()) || 0;
            const materialFee = parseFloat($('#meterical_fee').text()) || 0;

            const qty = parseInt($('#qty').val()) || 1;
            const minutesPerClass = parseInt($('#minute').val()) || 60;
            const pricePerMinute = pricePerHour / 60;
            const totalClassFee = pricePerMinute * minutesPerClass * qty;
            const totalFee = totalClassFee + registrationFee + materialFee;

            if (levelId) {
                const tableBody = `
            <tr>
                <td colspan="8">${levelName} - Per Hour - RM ${pricePerHour.toFixed(2)}</td>
                <td colspan="2">${qty} Classes, ${minutesPerClass} Minutes Each</td>
                <td colspan="2">RM ${totalClassFee.toFixed(2)}</td>
            </tr>
            <tr>
                <td colspan="10">Registration Fee</td>
                <td colspan="2">RM ${registrationFee.toFixed(2)}</td>
            </tr>
            <tr>
                <td colspan="10">Material Fee</td>
                <td colspan="2">RM ${materialFee.toFixed(2)}</td>
            </tr>
            <tr>
                <td colspan="10">Total</td>
                <td colspan="2">RM <span id="total_feee">${totalFee.toFixed(2)}</span></td>
            </tr>`;

                $('table tbody').html(tableBody);
            }
        }

        function loadStep2(selectedOption) {
            const branch_id = $('#branch_id').find(':selected').val();
            console.log(branch_id);

            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url('students/s2') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        selectedOption: selectedOption,
                        branch_id: branch_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#tutions').html(response.html);
                        resolve();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                        reject(error);
                    }
                });
            });
        }

        function updateScheduleRows() {
            const timeType = $('input[name="time_type"]:checked').val();
            const qty = parseInt($('#qty').val()) || 1;
            let scheduleHtml = '';

            if (timeType === 'Flexible') {
                for (let i = 1; i <= qty; i++) {
                    scheduleHtml += `
                <div class="col-md-6">
                    <label for="schedule_date_${i}" class="form-label">Class Date ${i} <span class="text-danger">*</span></label>
                    <input type="date" id="schedule_date_${i}" name="schedule_date[]" class="form-control flatpickr-date" required>
                </div>
                <div class="col-md-6">
                    <label for="schedule_time_${i}" class="form-label">Class Time ${i} <span class="text-danger">*</span></label>
                    <input type="time" id="schedule_time_${i}" name="schedule_time[]" class="form-control" required" required>
                </div>
            `;
                }
            } else {
                scheduleHtml = `
            <div class="col-md-6">
                <label for="schedule_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                <input type="date" id="schedule_date" name="schedule_date[]" class="form-control flatpickr-date" required>
            </div>
            <div class="col-md-6">
                <label for="schedule_time" class="form-label">Start Time <span class="text-danger">*</span></label>
                <input type="time" id="schedule_time" name="schedule_time[]" class="form-control" required>
            </div>
        `;
            }
            $('#schedule-row').html(scheduleHtml);
            const minDate = new Date();
            minDate.setDate(minDate.getDate() + 2);
            flatpickr(".flatpickr-date", {
                dateFormat: "Y-m-d",
                minDate: minDate
            });
        }
        async function initializeStep2(selectedOption) {
            try {
                await loadStep2(selectedOption);
                updateScheduleRows();
            } catch (error) {
                console.error('Error loading step2:', error);
            }
        }
        $('input[name="class_type"]').change(async function() {
            const selectedOption = $('input[name="class_type"]:checked').val();
            await initializeStep2(selectedOption);
        });
        $('input[name="class_type"]').change(async function() {
            const selectedOption = $('input[name="class_type"]:checked').val();
            await initializeStep2(selectedOption);
        });
        $(document).on('change', '#branch_id', async function() {
            const selectedOption = $('input[name="class_type"]:checked').val();
            await loadStep2(selectedOption);
        });
        $(document).on('change', '#level_id', function() {
            var levelid = $(this).val();
            const class_type = $('input[name="class_type"]:checked').val();
            $.ajax({
                url: "{{ url('level/base') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    levelid: levelid,
                    class_type: class_type,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#level-base').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + error);
                }
            });
        });

        $('body').on('click', '#add', function() {
            updateTotal();
        });

        $('body').on('change', '#level_id, #qty, #minute', function() {
            updateTotal();
        });

        $(document).ready(function() {
            $('#schedule').show();
            updateScheduleRows(); //

            $('body').on('change', 'input[name="time_type"], #qty', function() {
                updateScheduleRows();
            });
            $('body').on('change', 'input[name="time_type"]', function() {
                updateScheduleRows();
            });

            $('body').on('click', '#store', function() {
                const timeType = $('input[name="time_type"]:checked').val();
                const qty = parseInt($('#qty').val());
                const minute = parseInt($('#minute').val()) || 60;
                const level_id = $('#level_id').val();
                const class_type = $('input[name="class_type"]:checked').val();
                const student_id = getQueryParam('student_id');
                const meterical_fee = $('#meterical_fee').text();
                const registration_fee = $('#registration_fee').text();
                const total_feee = $('#total_feee').text();
                const subject_id = $('#subject_id').find(':selected').val();
                let branch_id = $('#branch_id').find(':selected').val();
                if (!branch_id && class_type != 4) {
                    branch_id = 1;
                }
                let scheduleDates = [];
                let scheduleTimes = [];

                if (timeType === 'Flexible') {
                    for (let i = 1; i <= qty; i++) {
                        const date = $(`#schedule_date_${i}`).val();
                        const time = $(`#schedule_time_${i}`).val();
                        if (date && time) {
                            scheduleDates.push(date);
                            scheduleTimes.push(time);
                        }
                    }
                } else {
                    const startDate = new Date($('#schedule_date').val());
                    const time = $('#schedule_time').val();
                    if (startDate && time) {
                        for (let i = 0; i < qty; i++) {
                            let date = new Date(startDate);
                            date.setDate(date.getDate() + i);
                            scheduleDates.push(date.toISOString().split('T')[0]);
                            scheduleTimes.push(time);
                        }
                    }
                }
                if (class_type == 4) {
                    if (!branch_id) {
                        $.toast({
                            heading: 'Validation Error',
                            text: 'Please select a Branch.',
                            icon: 'danger',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#ea5455',
                            hideAfter: 3000
                        });
                        return;
                    }
                }
                if (!student_id) {
                    $.toast({
                        heading: 'Validation Error',
                        text: 'Please select a Student.',
                        icon: 'danger',
                        position: 'top-right',
                        loader: false,
                        bgColor: '#ea5455',
                        hideAfter: 3000
                    });
                    return;
                }
                if (!level_id) {
                    $.toast({
                        heading: 'Validation Error',
                        text: 'Please select a Level.',
                        icon: 'danger',
                        position: 'top-right',
                        loader: false,
                        bgColor: '#ea5455',
                        hideAfter: 3000
                    });
                    return;
                }
                if (class_type != 3) {
                    if (!qty) {
                        $.toast({
                            heading: 'Validation Error',
                            text: 'Please select a Qty.',
                            icon: 'danger',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#ea5455',
                            hideAfter: 3000
                        });
                        return;
                    }
                    if (!subject_id) {
                        $.toast({
                            heading: 'Validation Error',
                            text: 'Please select a subject.',
                            icon: 'danger',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#ea5455',
                            hideAfter: 3000
                        });
                        return;
                    }
                    if (!timeType) {
                        $.toast({
                            heading: 'Validation Error',
                            text: 'Please select a Duration Type.',
                            icon: 'danger',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#ea5455',
                            hideAfter: 3000
                        });
                        return;
                    }
                }
                if (class_type != 3 && (scheduleDates.length === 0 || scheduleTimes.length === 0)) {
                    $.toast({
                        heading: 'Validation Error',
                        text: 'Please select valid dates and times for the schedule.',
                        icon: 'warning',
                        position: 'top-right',
                        loader: false,
                        bgColor: '#ea5455',
                        hideAfter: 3000
                    });
                    return;
                }

                $.ajax({
                    url: "{{ url('create/schedule') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        level_id: level_id,
                        subject_id: subject_id,
                        branch_id: branch_id,
                        qty: qty,
                        class_type: class_type,
                        timeType: timeType,
                        minute: minute,
                        student_id: student_id,
                        meterical_fee: meterical_fee,
                        registration_fee: registration_fee,
                        total_feee: total_feee,
                        scheduleDates,
                        scheduleTimes,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#total_feee_pay').val(total_feee)
                    }
                });
            });
        });
    </script>
@endsection
