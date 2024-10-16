@extends('layouts.laibrary')
@section('main')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Account Settings /</span> Order Place</h4>

            <div class="row">
              <div class="mb-3">
                <div class="card">
                  <div class="col-md-12 d-flex justify-content-center">
                    <div>
                      <div class="d-flex justify-content-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE6-BpSiTxUKv6pwpseBEVvYE6M_9bbqTKkQ&s" style="width: 12rem;" class="card-img-top border m-4" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title text-center">The Adventures of Huckleberry Finn</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <hr>
                          <div style="padding-left: 55rem;">
                            <a href="#" class="btn btn-outline-primary btn-sm border-0">$150.00</a>
                          <span class="align-middle btn btn-xs btn-label-success mr-2">Free</span>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card mb-4">
                  <h5 class="card-header">Payment Methods</h5>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <form id="creditCardForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework fv-plugins-icon-container" onsubmit="return false" novalidate="novalidate">
                          <div class="col-md-12">
                            <label class="form-label" for="Name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                          </div>
                          <div class="col-md-12"> 
                            <label class="form-label" for="Email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Name">
                          </div>
                          <div class="col-md-12">
                            <label class="form-label" for="phone">Phone No</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number">
                          </div>
                          <div class="col-md-12">
                            <label class="form-label" for="Address">Address</label>
                            <textarea class="form-control"  name="" id=""rows="4" placeholder="Enter Address"></textarea>
                            {{-- <input type="text" id="address" name="address" class="form-control" placeholder="Enter Phone Number"> --}}
                          </div>
                          <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Save Changes</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                          </div>
                        <input type="hidden"></form>
                      </div>
                      {{-- <div class="col-md-6">
                        <form id="creditCardForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework fv-plugins-icon-container" onsubmit="return false" novalidate="novalidate">
                          <div class="col-12 mb-2">
                            <div class="form-check form-check-inline">
                              <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cc" checked="">
                              <label class="form-check-label" for="collapsible-payment-cc">Credit/Debit/ATM Card</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cash">
                              <label class="form-check-label" for="collapsible-payment-cash">Paypal account</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <label class="form-label w-100" for="paymentCard">Card Number</label>
                            <div class="input-group input-group-merge has-validation">
                              <input id="paymentCard" name="paymentCard" class="form-control credit-card-mask" type="text" placeholder="1356 3215 6548 7898" aria-describedby="paymentCard2">
                              <span class="input-group-text cursor-pointer p-1" id="paymentCard2"><span class="card-type"></span></span>
                            </div><div class="fv-plugins-message-container invalid-feedback"></div>
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="paymentName">Name</label>
                            <input type="text" id="paymentName" class="form-control" placeholder="John Doe">
                          </div>
                          <div class="col-6 col-md-3">
                            <label class="form-label" for="paymentExpiryDate">Exp. Date</label>
                            <input type="text" id="paymentExpiryDate" class="form-control expiry-date-mask" placeholder="MM/YY">
                          </div>
                          <div class="col-6 col-md-3">
                            <label class="form-label" for="paymentCvv">CVV Code</label>
                            <div class="input-group input-group-merge">
                              <input type="text" id="paymentCvv" class="form-control cvv-code-mask" maxlength="3" placeholder="654">
                              <span class="input-group-text cursor-pointer" id="paymentCvv2"><i class="ti ti-help text-muted" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Card Verification Value" data-bs-original-title="Card Verification Value"></i></span>
                            </div>
                          </div>
                          <div class="col-12">
                            <label class="switch">
                              <input type="checkbox" class="switch-input">
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">Save card for future billing?</span>
                            </label>
                          </div>
                          <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Save Changes</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                          </div>
                        <input type="hidden"></form>
                      </div> --}}
                      {{-- <div class="col-md-6">
                        <h6>My Cards</h6>
                        <div class="added-cards">
                          <div class="cardMaster bg-lighter p-3 rounded mb-3">
                            <div class="d-flex justify-content-between flex-sm-row flex-column">
                              <div class="card-information me-2">
                                <img class="mb-3 img-fluid" src="../../assets/img/icons/payments/mastercard.png" alt="Master Card">
                                <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                  <p class="mb-0 me-2">Tom McBride</p>
                                  <span class="badge bg-label-primary">Primary</span>
                                </div>
                                <span class="card-number">∗∗∗∗ ∗∗∗∗ 9856</span>
                              </div>
                              <div class="d-flex flex-column text-start text-lg-end">
                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                  <button class="btn btn-label-primary me-2 waves-effect" data-bs-toggle="modal" data-bs-target="#editCCModal">
                                    Edit
                                  </button>
                                  <button class="btn btn-label-secondary waves-effect">Delete</button>
                                </div>
                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 12/26</small>
                              </div>
                            </div>
                          </div>
                          <div class="cardMaster bg-lighter p-3 rounded">
                            <div class="d-flex justify-content-between flex-sm-row flex-column">
                              <div class="card-information me-2">
                                <img class="mb-3 img-fluid" src="../../assets/img/icons/payments/visa.png" alt="Visa Card">
                                <p class="mb-2">Mildred Wagner</p>
                                <span class="card-number">∗∗∗∗ ∗∗∗∗ 5896</span>
                              </div>
                              <div class="d-flex flex-column text-start text-lg-end">
                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                  <button class="btn btn-label-primary me-2 waves-effect" data-bs-toggle="modal" data-bs-target="#editCCModal">
                                    Edit
                                  </button>
                                  <button class="btn btn-label-secondary waves-effect">Delete</button>
                                </div>
                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 10/27</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <!-- Add New Credit Card Modal -->
                        <div class="modal fade" id="editCCModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
                            <div class="modal-content p-3 p-md-5">
                              <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-center mb-4">
                                  <h3 class="mb-2">Edit Card</h3>
                                  <p class="text-muted">Edit your saved card details</p>
                                </div>
                                <form id="editCCForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
                                  <div class="col-12 fv-plugins-icon-container">
                                    <label class="form-label w-100" for="modalEditCard">Card Number</label>
                                    <div class="input-group input-group-merge has-validation">
                                      <input id="modalEditCard" name="modalEditCard" class="form-control credit-card-mask-edit" type="text" placeholder="4356 3215 6548 7898" value="4356 3215 6548 7898" aria-describedby="modalEditCard2">
                                      <span class="input-group-text cursor-pointer p-1" id="modalEditCard2"><span class="card-type-edit"><img src="../../assets/img/icons/payments/visa-cc.png" height="28"></span></span>
                                    </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditName">Name</label>
                                    <input type="text" id="modalEditName" class="form-control" placeholder="John Doe" value="John Doe">
                                  </div>
                                  <div class="col-6 col-md-3">
                                    <label class="form-label" for="modalEditExpiryDate">Exp. Date</label>
                                    <input type="text" id="modalEditExpiryDate" class="form-control expiry-date-mask-edit" placeholder="MM/YY" value="08/28">
                                  </div>
                                  <div class="col-6 col-md-3">
                                    <label class="form-label" for="modalEditCvv">CVV Code</label>
                                    <div class="input-group input-group-merge">
                                      <input type="text" id="modalEditCvv" class="form-control cvv-code-mask-edit" maxlength="3" placeholder="654" value="XXX">
                                      <span class="input-group-text cursor-pointer" id="modalEditCvv2"><i class="ti ti-help text-muted" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Card Verification Value" data-bs-original-title="Card Verification Value"></i></span>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <label class="switch">
                                      <input type="checkbox" class="switch-input">
                                      <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                      </span>
                                      <span class="switch-label">Set as primary card</span>
                                    </label>
                                  </div>
                                  <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Update</button>
                                    <button type="reset" class="btn btn-label-danger waves-effect" data-bs-dismiss="modal" aria-label="Close">
                                      Remove
                                    </button>
                                  </div>
                                <input type="hidden"></form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/ Add New Credit Card Modal -->
                        <!--/ Modal -->
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <script src="{{ asset('public') }}/assets//js/pages-pricing.js"></script>
            {{-- /assets//js/pages-pricing.js --}}
          </div>=
    </div>
@endsection
