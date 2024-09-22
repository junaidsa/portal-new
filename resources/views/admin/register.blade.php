@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Admin Registeration</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Admin Form</h5>
                    <div class="card-body">
                        <form action="{{ url('/admin/store') }}" method="POST" id="adminForum">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                            placeholder="Enter Full Name"value="{{old('name')}}" />
                                            @error('name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
                                            placeholder="Enter Email" value="{{old('email')}}" required />
                                            @error('email')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter Password" name="password" value="" />
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Branch Assignment <span class="text-danger">*</span></label>
                                        <select class="form-select  @error('branch') is-invalid @enderror" id="branch" name="branch">
                                            <option value="">Select Branch</option>
                                            @foreach ($branch as $b)
                                            <option value="{{ $b->id }}" {{ old('branch') == $b->id ? 'selected' : '' }}>
                                                {{ $b->branch }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('branch')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                                @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Role Description</label>
                                        <input type="text" name="role_description" class="form-control" value="{{old('role_description')}}" id="role_description">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label for="note" class="form-label">Additional Notes</label>
                                        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            // $('#upload').change(function(e) {
            //     let reader = new FileReader();
            //     reader.onload = function(e) {
            //         // Update the image src to display the selected image
            //         $('#uploadedAvatar').attr('src', e.target.result);
            //     }

            //     // Read the uploaded file as a data URL
            //     reader.readAsDataURL(this.files[0]);
            // });
        });
    </script>
@endsection
