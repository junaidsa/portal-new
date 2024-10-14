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
                        <form action="{{ url('category/store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subject_name" class="form-label">Product Name</label>
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
                                        <select class="form-select" id="status" name="type"
                                            aria-label="Default select example">
                                            <option value="Free">Free</option>
                                            <option value="Physical">Physical</option>
                                            <option value="Download">Download</option>

                                        </select>
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
                                    <select
                                      class="selectpicker  hobbies-select w-100"
                                      id="tags" name="tags"
                                      data-style="btn-default"
                                      data-icon-base="ti"
                                      data-tick-icon="ti-check text-white"
                                      name="formValidationHobbies"
                                      multiple>
                                      <option>Sports</option>
                                      <option>Movies</option>
                                      <option>Books</option>
                                    </select>
                                  </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="tage">Tags</label>
                      <textarea name="descripation" id="descripation" cols="30" rows="10"></textarea>
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
