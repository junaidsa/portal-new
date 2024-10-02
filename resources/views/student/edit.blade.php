@extends('layouts.app')
@section('main')
<style>
    .datepicker-dropdown {
        position: absolute !important;
        top: auto !important;
        bottom: 100% !important;
        transform: translateY(-10px);
    }

    .hidden {
        display: none;
    }

    .tags-container {
        position: relative;
        margin-top: 10px;
    }

    .tags-list {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        border: 1px solid #ddd;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .dismiss-icon {
        display: inline-block;
        font-size: 20px;
        cursor: pointer;
        float: right;
        margin-left: 10px;
    }

    .form-control {
        width: calc(100% - 30px);
        padding: 8px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    p {
        margin: 0;
        color: #333;
        font-size: 14px;
    }

    .bx-chevron-down {
        font-size: 24px;
    }
</style>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Student/</span>
            Edit Form
        </h4>
        <!-- Sticky Actions -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <!-- 1. Delivery Address -->
                                <h5 class="mb-4"><mark>1. Personal Details</mark></h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="student_name">Student Name:</label>
                                        <input type="text" id="student_name" name="student_name" class="form-control" placeholder="Enter Student Name" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="student_parent">Parent / Guardian Name:</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="text" id="student_parent" name="student_parent" placeholder="Enter Your parent Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="student_email">Email:</label>
                                        <input type="email" id="student_email" name="student_email" class="form-control" placeholder="Enter Your Email"/>
                                        <span class="text-light">You will receive class notification on this email.</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="student_number">Phone Or WhatsApp Number:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="student_number" name="student_number" class="form-control phone-mask" placeholder="Enter Your Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="student_age">Student Age | D O B :</label>
                                        <div class="input-group input-group-merge">
                                            <input type="date" id="student_age" name="student_age" class="form-control flatpickr" id="datepicker1"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="student_remark">Remarks:</label>
                                        <div class="input-group input-group-merge">
                                            <textarea name="student_remark" id="student_remark" class="form-control" rows="2" placeholder=""></textarea>
                                        </div>
                                        <span class="text-light">Please write any instructions for the tutor, exam preparation information to share, or mention any specific chapters or content here.</span>
                                    </div>
                                </div>
                                <hr />
                                <!-- 2. Delivery Type -->
                                <h5 class="my-4"><mark>2. Registeration & Tuition</mark></h5>
                                <hr>
                                <div class="row gy-3">
                                    <div class="col-md-3">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                                <span class="custom-option-body">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="48px" viewBox="0 0 576 512">
                                                        <path fill="#066aab" d="M218.3 8.5c12.3-11.3 31.2-11.3 43.4 0l208 192c6.7 6.2 10.3 14.8 10.3 23.5H336c-19.1 0-36.3 8.4-48 21.7V208c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h64V416H112c-26.5 0-48-21.5-48-48V256H32c-13.2 0-25-8.1-29.8-20.3s-1.6-26.2 8.1-35.2l208-192zM352 304V448H544V304H352zm-48-16c0-17.7 14.3-32 32-32H560c17.7 0 32 14.3 32 32V448h32c8.8 0 16 7.2 16 16c0 26.5-21.5 48-48 48H544 352 304c-26.5 0-48-21.5-48-48c0-8.8 7.2-16 16-16h32V288z"></path>
                                                    </svg>
                                                    <span class="custom-option-title"></span>
                                                    <small>1-1 Online Tuition</small>
                                                </span>
                                                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                                <span class="custom-option-body">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path fill="#066aab" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z"></path>
                                                    </svg>
                                                    <span class="custom-option-title"></span>
                                                    <small>1-1 Home Tuition</small>
                                                </span>
                                                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"for="customRadioIcon3">
                                                <span class="custom-option-body">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="48px" viewBox="0 0 576 512">
                                                        <path fill="#066aab" d="M64 96c0-35.3 28.7-64 64-64H512c35.3 0 64 28.7 64 64V352H512V96H128V352H64V96zM0 403.2C0 392.6 8.6 384 19.2 384H620.8c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8H76.8C34.4 480 0 445.6 0 403.2zM288 160c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H352v48c0 8.8-7.2 16-16 16H304c-8.8 0-16-7.2-16-16V272H240c-8.8 0-16-7.2-16-16V224c0-8.8 7.2-16 16-16h48V160z"></path>
                                                    </svg>
                                                    <span class="custom-option-title"></span>
                                                    <small>Online Group Tuition</small>
                                                </span>
                                                <input name="customRadioIcon" class="form-check-input" type="radio"  value="" id="customRadioIcon3" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customRadioIcon4">
                                                <span class="custom-option-body">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#066aab" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                                                    </svg>
                                                    <span class="custom-option-title"></span>
                                                    <small>Physical Tuition</small>
                                                </span>
                                                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon4" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="studente_tuition">Please Select tuition <span class="text-danger">*</span></label>
                                        <select id="studente_tuition" name="studente_tuition" class="select2 form-select" data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                        </select>
                                        <span class="text-light">Registration Fee RM50 | Material Fee: RM100 | = RM150</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="student_class">Date Your First Class </label>
                                            <div class="input-group input-group-merge">
                                                <input type="date" id="student_class" name="student_class" class="form-control" placeholder="MM/YY" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="student_time">Time <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <input type="time" id="student_time" name="student_time" class="form-control cvv-code-mask" maxlength="3" placeholder="654" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="student_schedule">Make Your Own Flexible Class Schedule <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <textarea name="student_schedule" id="student_schedule" class="form-control"  rows="2" placeholder=""></textarea>
                                        </div>
                                        <span class="text-light">Please format the schedule for each session as follows</span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="8">Item</th>
                                                    <th colspan="2">Quantity</th>
                                                    <th colspan="2">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="8">
                                                        <p>There are no products selected.</p>
                                                    </td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8">Total</td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">RM0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="my-4"><mark>3. Bank Details</mark></h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Stripe Credit Card <span class="text-danger">*</span></h4>
                                        <div class="mb-5">
                                            <button class="tag-toggle" onclick="toggleTags()" style="background: none; border: none; display: block;">
                                                <i class="text-success"></i> Secure, 1-click checkout with Link<i class="ti ti-chevron-down"></i>
                                            </button>
                                            <div class="tags-container">
                                                <div class="tags-list mb-5 hidden">
                                                    <span class="dismiss-icon" onclick="toggleTags()">×</span>
                                                    <input type="email" class="form-control" placeholder="Enter Email" id="student_mail" name="student_mail">
                                                    <p>Securely pay with your saved info, or create a Link account for faster checkout next time.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <label class="form-label" for="student_card">Card Number:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="student_card" name="student_card" class="form-control" placeholder="1234 1234 1234 1234" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="student_country">Select Country</label>
                                        <select id="student_country" name="student_country" class="select2 form-select" data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="student_date">Expiration date:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="date" id="student_date" name="student_date" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="student_code">Security code:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="date" id="student_code" name="student_code" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Sticky Actions -->
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
@endsection
@section('link-js')
<script>

    $('#datepicker1 input').datepicker({
        orientation: "top"
    });

    function toggleTags() {
        const tagsList = document.querySelector('.tags-list');
        const toggleButton = document.querySelector('.tag-toggle');

        if (tagsList.classList.contains('hidden')) {
            tagsList.classList.remove('hidden');
            toggleButton.style.display = 'none';
        } else {
            tagsList.classList.add('hidden');
            toggleButton.style.display = 'block';
        }
    }
</script>
@endsection