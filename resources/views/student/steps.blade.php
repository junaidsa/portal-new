       <!-- Personal Details -->
       @if (request()->segment(2) == 'step-1')
       <div id="step">
        <form action="{{url('students/step1')}}" method="POST">
            @csrf
           <div class="row g-3">
               <div class="col-md-6">
                   <label class="form-label" for="Student Name">Student Name:</label>
                   <input type="text" id="formValidationConfirmPass" name="name" class="form-control @error('name') is-invalid @enderror"
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
        <div id="property-features" class="step2">
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
        @elseif(request()->segment(2) == 'step-3')
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
       @endif
