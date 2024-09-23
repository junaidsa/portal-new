  
@section('main');

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-detached  bg-navbar-theme">
          <div class="navbar-brand-box">
            <a href="" class="logo logo-dark">
              <span class="logo-lg">
                <img src="./logo.png.png" alt="" height="40">
              </span>
            </a>
          </div>
          <form class="form-inline">
            <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">SMART EDU</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="#"> <span key="t-profile">About Us </span></a>
                <a class="dropdown-item" href="#"> <span key="t-my-wallet">Blog</span></a>
                <a class="dropdown-item d-block" href="#"> <span key="t-settings">Event</span></a>
                <a class="dropdown-item" href="#"> <span key="t-lock-screen">FAQ's</span></a>
                <a class="dropdown-item" href="#"> <span key="t-lock-screen">Privacy Policy</span></a>
                <a class="dropdown-item" href="#"> <span key="t-lock-screen">Terms of Service</span></a>
              </div>
            </div>
            <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">FIND</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="#"> <span key="t-profile">Find Courses</span></a>
                <a class="dropdown-item" href="#"> <span key="t-my-wallet">Find Tutor | 1-1 class</span></a>
                <a class="dropdown-item d-block" href="#"> <span key="t-settings">Find Book</span></a>
                <a class="dropdown-item" href="#"> <span key="t-lock-screen">Join Group Class</span></a>
              </div>
            </div>
            <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-hover="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">PROGRAMMES</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="#"> <span key="t-profile">Tuition</span></a>
                <a class="dropdown-item" href="#"> <span key="t-my-wallet">Lunguages</span></a>
                <a class="dropdown-item d-block" href="#"> <span key="t-settings">Exam Preps</span></a>
                <a class="dropdown-item" href="#"> <span key="t-lock-screen">IGCSE EXAM REGISTRATION</span></a>
                <a class="dropdown-item" href="#"> <span key="t-lock-screen">Partner with Smart
                    Education</span></a>
              </div>
            </div>
            <div class="dropdown d-inline-block hstack gap-3">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown">
                <a href="" class="text-black ">CONTACT US</a>
              </button>
            </div>
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-outline-info header-item waves-effect" id="page-header-user-dropdown">
                <a href="" class="text-black">Log In</a>
              </button>
            </div>
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-info header-item waves-effect" id="page-header-user-dropdown">
                <a href="" class="text-white">Sign Up</a>
              </button>
            </div>
          </form>
        </nav>


        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Student /</span> Registration
            </h4>

            <!-- Property Listing Wizard -->
            <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
              <div class="bs-stepper-header">
                <div class="step" data-target="#personal-details">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-user"></i></span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Personal Details</span>
                      <!-- <span class="bs-stepper-subtitle">Your Name/Email</span> -->
                    </span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#property-details">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-home ti-sm"></i></span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title" style="font-size:0.8rem">Registeration & Material Fess</span>
                      <!-- <span class="bs-stepper-subtitle">Property Type</span> -->
                    </span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#property-features">
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
                <!-- <div class="step" data-target="#price-details">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="ti ti-currency-dollar ti-sm"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Price Details</span>
                        <span class="bs-stepper-subtitle">Expected Price</span>
                      </span>
                    </button>
                  </div> -->
              </div>
              <div class="bs-stepper-content">
                <form id="wizard-property-listing-form" onSubmit="return false">
                  <!-- Personal Details -->
                  <div id="personal-details" class="content">
                    <div class="row g-3">
                      <div class="col-12">
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
                                <input name="plUserType" class="form-check-input" type="radio" value="1"  id="stonline" checked />
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
                                <input name="plUserType" class="form-check-input" type="radio" value="2" id="sthome" />
                              </label>
                            </div>
                          </div>
                          <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon">
                              <label class="form-check-label custom-option-content" for="stgroup">
                                <span class="custom-option-body">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="60" height="48px" viewBox="0 0 576 512">
                                    <path fill="#066aab" d="M64 96c0-35.3 28.7-64 64-64H512c35.3 0 64 28.7 64 64V352H512V96H128V352H64V96zM0 403.2C0 392.6 8.6 384 19.2 384H620.8c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8H76.8C34.4 480 0 445.6 0 403.2zM288 160c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H352v48c0 8.8-7.2 16-16 16H304c-8.8 0-16-7.2-16-16V272H240c-8.8 0-16-7.2-16-16V224c0-8.8 7.2-16 16-16h48V160z"></path>
                                  </svg>
                                  <h1 class="custom-option-title">Online Group Tuition</h1>
                                </span>
                                <input name="plUserType" class="form-check-input" type="radio" value="3" id="stgroup" />
                              </label>
                            </div>
                          </div>
                          
                          <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon">
                              <label class="form-check-label custom-option-content" for="stphysical">
                                <span class="custom-option-body">
                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="#066aab" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                  </svg>
                                  <h1 class="custom-option-title">Physical Tuition</h1>
                                </span>
                                <input name="plUserType" class="form-check-input" type="radio" value="4" id="stphysical" />
                              </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="Student Name">Student Name:</label>
                        <input type="text" id="studentname" name="studentname" class="form-control"
                          placeholder="Enter Student Name" />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="Parent">Parent / Guardian Name:</label>
                        <input type="text" id="parentname" name="parentname" class="form-control"
                          placeholder="Enter Your Parent Name" />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="Email">Email:</label>
                        <input type="email" id="studentemail" name="studentemail" class="form-control"
                          placeholder="Enter Your Email" />
                        <span class="text-light">You will receive class notification on this email.</span>
                      </div>
                      <div class="col-md-6 form-password-toggle">
                        <label class="form-label" for="Phone Or WhatsApp Number">Phone Or WhatsApp Number:</label>
                        <div class="input-group input-group-merge">
                          <input type="number" id="studentnumber" class="form-control" name="studentnumber"
                            placeholder="Enter Your Number" />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="form-label" for="Student Age | D O B ">Student Age | D O B :</label>
                        <input type="date" id="studentage" name="studentage" class="form-control flatpickr"
                          placeholder="DD,MM,YYYY" />
                      </div>
                      <div class="col-md-12">
                        <label class="form-label" for="Remarks">Remarks:</label>
                        <textarea name="studentremark" id="studentremark" cols="" rows="3"
                          class="form-control"></textarea>
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

                  <!-- Property Details -->
                  <div id="property-details" class="content">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="Please Select Your Level | Registration &
                        Material Fees">Please Select Your Level | Registration &
                          Material Fees <span class="text-danger">*</span></label>
                        <select id="stregistration" name="stregistration" class="select2 form-select"
                          data-allow-clear="true">
                          <option value="">Select Primary Level</option>
                          <option value="10002">Primary Level Year 1 - RM150.00</option>
                          <option value="10001">Primary Level Year 2 - RM150.00</option>
                          <option value="10017">Primary Level Year 3 - RM150.00</option>
                          <option value="10003">Primary Level Year 4 - RM150.00</option>
                          <option value="10000">Primary Level Year 5 - RM150.00</option>
                        </select>
                        <span class="text-light">Registration Fee RM50 | Material Fee: RM100 | = RM150</span>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label" for="plStateDate">Date Start Your First Class <span class="text-danger">*</span></label>
                        <input type="date" id="plStateDate" name="plStateDate" class="form-control flatpickr" />
                      </div>
                      <div class="col-md-3">
                        <label class="form-label" for="Time">Time <span class="text-danger">*</span></label>
                        <input type="time" id="studenttime" name="studenttime" class="form-control" />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="Make Your Own Flexible Class Schedule">Make Your Own Flexible Class Schedule <span class="text-danger">*</span></label>
                        <textarea name="studentremark" id="studentremark" cols="" rows="2"
                          class="form-control"></textarea>
                        <span class="text-light">Please format the schedule for each session as follows</span>
                      </div>
                      <div class="col-md-6">
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
                              
                              <td colspan="8"><p>There are no products selected.</p></td>
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

                  <!-- Property Features -->
                  <div id="property-features" class="content">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <h4>Stripe Credit Card <span class="text-danger">*</span></h4>
                        <div class="mb-3">                          
                          <button class="tag-toggle" onclick="toggleTags()" style="background: none; border: none;">
                              <i class="text-success" class="ti ti-lock"></i>  Secure, 1-click checkout with Link<i class="ti ti-chevron-down"></i> 
                          </button>
                          <div class="tags-container">
                              <div class="tags-list hidden mb-5">
                                  <span class="dismiss-icon" onclick="toggleTags()">×</span>
                                  <input type="email" class="form-control" placeholder="Enter Email" id="stemail" name="stemail">
                                  <p>Securely pay with your saved info, or create a Link account for faster checkout next time.</p>
                              </div>
                          </div>
                      </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="Card No">Card No</label>
                        <input type="number" id="stcard" name="stcard" class="form-control" placeholder="1234 1234 1234" />
                      </div>
                      <div class="col-md-3">
                        <label class="form-label" for="Expiration date">Expiration date</label>
                        <input type="date" id="stexpiration" name="stexpiration" class="form-control flatpickr"/>
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

                  <!-- Property Area -->
                  <div id="property-area" class="content">
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

                  <!-- Price Details -->
                  <div id="price-details" class="content">
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label class="form-label d-block" for="plExpeactedPrice">Expected Price</label>
                        <div class="input-group input-group-merge">
                          <input type="number" class="form-control" id="plExpeactedPrice" name="plExpeactedPrice"
                            placeholder="25,000" aria-describedby="pl-expeacted-price" />
                          <span class="input-group-text" id="pl-expeacted-price">$</span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label d-block" for="plPriceSqft">Price per Sqft</label>
                        <div class="input-group input-group-merge">
                          <input type="number" class="form-control" id="plPriceSqft" name="plPriceSqft"
                            placeholder="500" aria-describedby="pl-price-sqft" />
                          <span class="input-group-text" id="pl-price-sqft">$</span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label d-block" for="plMaintenenceCharge">Maintenance Charge</label>
                        <div class="input-group input-group-merge">
                          <input type="number" class="form-control" id="plMaintenenceCharge" name="plMaintenenceCharge"
                            placeholder="50" aria-describedby="pl-mentenence-charge" />
                          <span class="input-group-text" id="pl-mentenence-charge">$</span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="plMaintenencePer">Maintenance</label>
                        <select id="plMaintenencePer" name="plMaintenencePer" class="form-select">
                          <option value="1" selected>Monthly</option>
                          <option value="2">Quarterly</option>
                          <option value="3">Yearly</option>
                          <option value="3">One-time</option>
                          <option value="3">Per sqft. Monthly</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label d-block" for="plBookingAmount">Booking/Token Amount</label>
                        <div class="input-group input-group-merge">
                          <input type="number" class="form-control" id="plBookingAmount" name="plBookingAmount"
                            placeholder="250" aria-describedby="pl-booking-amount" />
                          <span class="input-group-text" id="pl-booking-amount">$</span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label d-block" for="plOtherAmount">Other Amount</label>
                        <div class="input-group input-group-merge">
                          <input type="number" class="form-control" id="plOtherAmount" name="plOtherAmount"
                            placeholder="500" aria-describedby="pl-other-amount" />
                          <span class="input-group-text" id="pl-other-amount">$</span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label">Show Price as</label>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="plShowPriceRadio" id="plNagotiablePrice"
                            checked />
                          <label class="form-check-label" for="plNagotiablePrice">Negotiable</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="plShowPriceRadio" id="plCallForPrice" />
                          <label class="form-check-label" for="plCallForPrice">Call for Price</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label">Price includes</label>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="checkbox" name="plCarParking" id="plCarParking" />
                          <label class="form-check-label" for="plCarParking">Car Parking</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="plClubMembership"
                            id="plClubMembership" />
                          <label class="form-check-label" for="plClubMembership">Club Membership</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="plOtherCharges" id="plOtherCharges" />
                          <label class="form-check-label" for="plOtherCharges">Stamp Duty & Registration charges
                            excluded.</label>
                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-between mt-4">
                        <button class="btn btn-label-secondary btn-prev">
                          <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-success btn-submit btn-next">
                          <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i
                            class="ti ti-check ti-xs"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!--/ Property Listing Wizard -->
          </div>
        </div>
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
@endsection

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
