@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Teacher /</span> Teacher Registeration</h4>
              <div class="row">
                <div class="card mb-4">
                  <h5 class="card-header">Teacher Form</h5>
                  <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Enter Full Name" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Phone No.</label>
                            <input class="form-control" type="number" id="exampleFormControlReadOnlyInput1"
                              placeholder="Enter Phone Number"/>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">NIC Number</label>
                            <input class="form-control" type="number" id="exampleFormControlReadOnlyInput1"
                              placeholder="Enter NIC Number" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                              placeholder="Enter Email" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Qualifications</label>
                            <input class="form-control" type="email" id="exampleFormControlReadOnlyInput1"
                              placeholder="Enter Qualifications" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Teaching Level</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Enter Teaching Level" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                          <label class="form-label" for="modalEditUserLanguage">Subject</label>
                          <select
                            id="modalEditUserLanguage"
                            name="modalEditUserLanguage"
                            class="select2 form-select"
                            multiple
                          >
                            <option value="">Select</option>
                            <option value="english" selected>English</option>
                            <option value="spanish">Mathematics</option>
                            <option value="french">Science</option>
                            <option value="german">Physics</option>
                            <option value="dutch">Computer Science</option>
                            <option value="hebrew">Chemistry</option>
                            <option value="sanskrit">Biology</option>
                            <option value="hindi">Urdu</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                          <label class="form-label" for="modalEditUserStatus">Availability</label>
                          <select
                            id="modalEditUserStatus"
                            name="modalEditUserStatus"
                            class="form-select"
                            aria-label="Default select example"
                          >
                            <option selected>Status</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Bio</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Enter Bio" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">CV/Resume</label>
                            <input class="form-control" type="email" id="exampleFormControlReadOnlyInput1"
                              placeholder="Enter CV/Resume" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Bank Information</label>
                            <input class="form-control" type="email" id="exampleFormControlReadOnlyInput1"
                              placeholder="Enter bank Information" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button></div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>



@endsection
