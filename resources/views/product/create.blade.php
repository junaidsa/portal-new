@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Product</h5>
                    <div class="card-body">
                        <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Product Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter  Product Name" />
                                        @error('name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Buy Type</label>
                                        <select class="form-select" id="type" name="type"
                                            aria-label="Default select example">
                                            <option value="Free">Free</option>
                                            <option value="Physical">Physical</option>
                                            <option value="Download">Download</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Select Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id"
                                            aria-label="Default select example">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name ?? 'N/A' }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label"> Price</label>
                                        <input type="number" class="form-control" id="price" name="price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="tage">Tags</label>
                                 <input type="text" name="tags" id="tags" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" >Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                    @error('image')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="tage">Book pdf</label>
                                    <input type="file" class="form-control" id="pdf_file" name="pdf_file">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="tage">Short Description</label>
                                    <textarea name="short_description" id="short_description" cols="10" rows="3" class="form-control"></textarea>
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
@endsection
