@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Branch /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Branch</h5>
                    <div class="card-body">
                        <form action="{{ url('branch/store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="branch_name" class="form-label">Branch</label>
                                        <input type="text"
                                            class="form-control @error('branch_name') is-invalid @enderror" id="branch_name"
                                            name="branch_name" placeholder="Enter Branch Name" />
                                        @error('branch_name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="branch_name" class="form-label">Branch Code</label>
                                        <input type="text"
                                            class="form-control @error('branch_name') is-invalid @enderror" id="branch_code"
                                            name="branch_code" placeholder="Enter Branch Code" />
                                        @error('branch_code')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city" placeholder="Enter City" />
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="registration" class="form-label">Registration Fee</label>
                                        <input type="number" class="form-control" id="registration_fee"
                                            name="registration_fee" placeholder="0.00" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meterical_fee" class="form-label">Meterical Fee</label>
                                        <input type="number" class="form-control" id="meterical_fee" name="meterical_fee"
                                            placeholder="0.00" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label for="note" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="5" placeholder="Enter Address"></textarea>
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
