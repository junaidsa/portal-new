@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tuitions/</span> Tuitions Packages</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Tuitions Packages</h5>
                    <div class="card-body">
                        <form action="{{ url('/tuition/update') }}" method="POST" id="adminForum">
                            @csrf
                            <div class="row">
                                <input type="hidden" value="{{$user->id}}" id="branch_id">
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}"
                                      placeholder="Enter Full Name" />
                                      @error('name')
                                      <div class=" invalid-feedback">{{ $message }}</div>

                                      @enderror
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Phone No  <span class="text-danger">*</span></label>
                                    <input class="form-control @error('phone_number') is-invalid @enderror" type="number" value="{{$user->phone_number}}" id="phone_number" name="phone_number"
                                      placeholder="Enter Phone Number"/>
                                      @error('phone_number')
                                      <div class=" invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" id="email"
                                      placeholder="Enter Email" name="email" />
                                      @error('email')
                                      <div class=" invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="exampleFormControlReadOnlyInput1" class="form-label">NIC Number  <span class="text-danger">*</span></label>
                                      <input class="form-control @error('cnic') is-invalid @enderror" type="text" value="{{$user->cnic}}" id="cnic" name="cnic"
                                        placeholder="Enter NIC Number" />
                                        @error('cnic')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                  </div>
                              </div>
                              <div class="row">

                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Qualifications<span class="text-danger">*</span></label>
                                    <input class="form-control @error('qualification') is-invalid @enderror" type="text" value="{{$user->qualifications}}" id="qualification" name="qualification"
                                      placeholder="Enter Qualifications"/>
                                      @error('qualification')
                                      <div class=" invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Teaching <small>Experience  (Level)</small> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('experience') is-invalid @enderror" value="{{$user->experience}}" id="experience" name="experience"
                                      placeholder="Enter Teaching Experience"  />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                  <label class="form-label" for="modalEditUserLanguage">Subject <span class="text-danger">*</span></label>
                                  <select id="subject" value="" name="subject[]" class="select2 form-select @error('experience') is-invalid @enderror" multiple>
                                    @foreach ($user as $sub)
                                    <option value="{{$sub->id}}">{{$sub->subject}}</option>
                                    @endforeach
                                  </select>
                                  @error('subject')
                                  <div class=" invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                  <label class="form-label" for="modalEditUserStatus">Availability <small>( Type Your Timings Like : 9am to 10pm )</small> <span class="text-dnager">*</span></label>
                                        <input type="text" name="availability" id="availability" value="{{$user->availability }}" class="form-control @error('availability') is-invalid @enderror">
                                        @error('availability')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="bank_info" class="form-label">Bank Infomation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control  @error('payment_information') is-invalid @enderror" value="{{$user->payment_information}}" id="payment_information" name="payment_information"
                                      placeholder="Enter Bank Infomation" />
                                      @error('payment_information')
                                      <div class=" invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="resume" class="form-label">CV/Resume <span class="text-danger">*</span></label>
                                    <input class="form-control @error('resume') is-invalid @enderror" type="file" id="resume" name="resume"
                                    accept=".pdf, .doc, .docx" />
                                     @error('resume')
                                     <div class=" invalid-feedback">{{ $message }}</div>
                                     @enderror
                                  </div>
                                </div>
                              </div>
                                <div class="col-md-12">
                                  <div class="mb-3">
                                    <label for="node" class="form-label">Bio</label>
                                    <textarea class="form-control" value="{{$user->note}}" id="node" rows="3" placeholder="Enter Bio"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Address">{{$user->address}}</textarea>
                                  </div>
                                </div>
                              <div class="col-md-12">
                                <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button></div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection