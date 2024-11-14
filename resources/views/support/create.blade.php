@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ticket /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Ticket</h5>
                    <div class="card-body">
                        <form action="{{ url('/support/store') }}" method="POST" id="adminForum">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Title <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title"
                                            placeholder="Enter Title"value="{{ old('title') }}" />
                                        @error('title')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Remaks <span
                                                class="text-danger">*</span></label>
                                        <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror" cols="30"
                                            rows="10" placeholder="Enter Remarks"></textarea>
                                        @error('remarks')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
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
