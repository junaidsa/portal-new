@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Teacher /</span> Registration</h4>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    
                    
                    @if(!Auth::check())
                                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
                                      <h2>Welcome to Smart Education!</h2>
                                      <p><strong>1 Million+ Free eBooks</strong><br>
                                         Inside your account, you'll gain access to over <strong>1 million free eBooks</strong> covering topics from primary to higher education levels.</p>
                                    
                                      <p><strong>Already have an account?</strong><br>
                                         Click <a href="https://cms.smartedu.my/" style="color: #007bff; text-decoration: underline;">Login</a> to access your teaching resources and schedule.</p>
                                    
                                      <p><strong>New Teacher?</strong><br>
                                         If you haven't registered yet, complete the registration form below to start teaching and gain access to exclusive resources, including <strong>Online, Home Tuition,</strong> and <strong>At Centre Classes</strong>.</p>
                                    
                                      <hr>
                                    
                                      <h3>Note:</h3>
                                      <ul>
                                        <li>Please fill out all required fields indicated with an asterisk <span class="text-danger">(*)</span> to ensure we have all the necessary information.</li>
                                        <li>Provide accurate contact information for communication purposes.</li>
                                        <li>Use clear and concise language, avoiding abbreviations or acronyms.</li>
                                        <li>If you have any questions, feel free to reach out for assistance. <a href="https://wa.me/message/U2Y4YU5ZDNEQN1" target="_blank">WhatsApp</a></li>
                                     </ul>
                                    
                                      <hr>
                                    
                                      <h3>Policies & Guidelines:</h3>
                                      <ul>
                                        <li><strong>Privacy Policy:</strong> We are committed to safeguarding your personal information...</li>
                                        <li><strong>Academic Integrity:</strong> We uphold the highest standards of academic honesty...</li>
                                        <li><strong>Attendance Policy:</strong> Consistent attendance is crucial for academic success...</li>
                                        <li><strong>Grading Policy:</strong> Grades are based on a combination of tests, quizzes...</li>
                                        <li><strong>Code of Conduct:</strong> Teachers are expected to behave respectfully and responsibly...</li>
                                      </ul>
                                    </div></br></br>
                                     @endif
                    
                    
                    
                    <form id="teacher_forum" action="{{ url('teacher/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="{{ $branch->id }}" name="branch_id" id="branch_id">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Full Name</b> <span class="text-danger">*</span></label>
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
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label"><b>Phone Number</b><span class="text-danger">*</span></label>
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
                                    <label for="exampleFormControlInput1" class="form-label"><b>Email</b> <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Enter Email" name="email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                        <span class="text-light">You will receive class notification on this email.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label"><b>Passport / I.C</b> <span class="text-danger">*</span></label>
                                    <input class="form-control @error('cnic') is-invalid @enderror" type="text"
                                        id="cnic" name="cnic" placeholder="Enter Passport / I.C"
                                        value="{{ old('cnic') }}" />
                                    @error('cnic')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label"><b>Education Qualifications</b> <span class="text-danger">*</span></label>
                                    <input class="form-control @error('qualification') is-invalid @enderror" type="text"
                                        id="qualification" name="qualification" placeholder="Enter Education Qualifications"
                                        value="{{ old('qualification') }}" />
                                    @error('qualification')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Teaching Experience</b> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('experience') is-invalid @enderror"
                                        id="experience" name="experience" placeholder="Enter Teaching Experience"
                                        value="{{ old('experience') }}" />
                                    @error('experience')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="TagifyBasic" class="form-label"><b>Subjects</b> <small>(Type & Add New If You Don't See Yours, separated by commas<span class="text-danger"> ( , )</span>)</small> <span class="text-danger">*</span></label>
                                <input id="tags-input" name="subject[]" class="form-control" placeholder="Select"/>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label" for="modalEditUserStatus"><b>Add Availability</b> <small>for at least a Week (Type Your Timings Like: 9am to 10pm)</small> <span class="text-danger">*</span></label>
                                <input type="text" name="availability" id="availability"
                                    class="form-control @error('availability') is-invalid @enderror"
                                    placeholder="09:00am to 10:00pm" value="{{ old('availability') }}">
                                @error('availability')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label"><b>Date of Birth</b> <span class="text-danger">*</span></label>
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
                                    <label for="city" class="form-label"><b>City</b> <small>where you can teach Physically (Type & Add New)</small> <span class="text-danger">*</span></label>
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
                                    <label for="TagifyBasic" class="form-label"><b>Level</b> <small>(Type & Add New If You Don't See Yours, separated by commas<span class="text-danger"> ( , )</span>)</small> <span class="text-danger">*</span></label>
                                    <input type="text" id="level_input" name="level[]" class="form-control" placeholder="Select">
                                    @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Home Address</b><span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your home address, including the country name.">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="node" class="form-label"><b>Add BIO</b><span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="node" name="note" rows="3" placeholder="With a deep love for {Your Subjects}, {Your Name} has dedicated their career to teaching {Your Subject} to {Grade Level/Student Type}.">{{ old('note') }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="bank_info" class="form-label"><b>Payment Details</b> <span class="text-danger">*</span></label>
                                    <textarea name="payment_information" class="form-control @error('payment_information') is-invalid @enderror"
                                        id="payment_information" placeholder="Bank Name: [AmBank] | Account Number: [1234567890] , Swift Code: 0000" rows="2">{{ old('payment_information') }}</textarea>
                                    @error('payment_information')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="resume" class="form-label"><b>Upload CV/Resume</b> <small>(.pdf, .doc, .docx)</small> <span class="text-danger">*</span></label>
                                    <input class="form-control @error('resume') is-invalid @enderror" type="file"
                                        id="resume" name="resume" accept=".pdf, .doc, .docx" />
                                    @error('resume')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Register Now</button>
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
