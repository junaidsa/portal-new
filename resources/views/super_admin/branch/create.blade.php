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
                        <form action="{{url('branch/store')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="branch_name" class="form-label">Branch</label>
                                            <input type="text" class="form-control @error('branch_name') is-invalid @enderror" id="branch_name" name="branch_name"
                                                placeholder="Enter Branch Name" />
                                                @error('branch_name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
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
