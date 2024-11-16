@extends('layouts.app')
@section('main')
<style>
    .image-preview-container {
        max-width: 100%;
        max-height: 300px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ddd;
        padding: 10px;
        background-color: #f9f9f9;
    }

    #imagePreview {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
</style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bank / </span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Bank</h5>
                    <div class="card-body">
                        <form action="{{ url('/bank/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label">Bank Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror"
                                            id="bank_name" name="bank_name" value="{{ $b->bank_name }}"
                                            placeholder="Enter Bank Name" />
                                        @error('bank_name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="account_holdername" class="form-label">Account Holder <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('account_holdername') is-invalid @enderror"
                                            value="{{ $b->account_holdername }}" id="account_holdername"
                                            name="account_holdername" placeholder="Enter Account Holder Name" />
                                        @error('account_holdername')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="account_number" class="form-label">Account Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('account_number') is-invalid @enderror"
                                            value="{{ $b->account_number }}" id="account_number" name="account_number"
                                            placeholder="Enter Account Number" />
                                        @error('account_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Upload Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            onchange="previewImage(event)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        {{-- <label for="imagePreview" class="form-label">Image Preview</label> --}}
                                        <div class="image-preview-container">
                                            <img id="imagePreview" src="{{ asset('public/files/' . $b->image) }}" alt="Image Preview" class="img-thumbnail">
                                        </div>
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
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('imagePreview');
                preview.src = reader.result; // Set the source of the image preview to the uploaded image
                preview.style.display = 'block'; // Make the image preview visible
            };
            if (event.target.files && event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]); // Read the file as base64 (Data URL)
            }
        }
    </script>
@endsection
