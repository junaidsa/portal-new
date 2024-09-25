@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Category</h5>
                    <div class="card-body">
                        <form action="{{url('category/store')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Category</label>
                                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name"
                                                placeholder="Enter Category Name" />
                                                @error('category_name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Category Status</label>
                                            <select class="form-select" id="status" name="status"
                                                aria-label="Default select example">
                                                <option value="1">Active</option>
                                                <option value="2 ">Deactive</option>

                                            </select>
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
