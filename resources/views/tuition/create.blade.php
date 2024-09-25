@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Admin Registeration</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create TU</h5>
                    <div class="card-body">
                        <form action="{{ url('/admin/store') }}" method="POST" id="adminForum">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                            placeholder="Enter Full Name"value="{{old('name')}}" />
                                            @error('name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Tuition</label>
                                        <select class="form-select" id="status" name="status"
                                            aria-label="Default select example">
                                            <option value="1-1 Online">1-1 Online</option>
                                            <option value="1-1 Home">1-1 Home</option>
                                            <option value="Online Group">Online Group</option>
                                            <option value="Physical">Physical</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Branch Status</label>
                                        <select class="form-select" id="status" name="status"
                                            aria-label="Default select example">
                                            <option value="1">Active</option>
                                            <option value="2 ">Deactive</option>

                                        </select>
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
