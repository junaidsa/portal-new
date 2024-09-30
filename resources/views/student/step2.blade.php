         <!-- Property Features -->
         <div id="property-features" class="content">
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
