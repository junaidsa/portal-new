@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Enquiry /</span> Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Enquiry</h5>
                    <div class="card-body">
                        <form action="{{url('enquiry/store')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Your Name" />
                                                @error('name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Enquiry Status <span class="text-danger">*</span></label>
                                            <select class="form-select @error('status') @enderror" id="status" name="status"
                                                aria-label="Default select example">
                                                <option value="1">Pending</option>
                                                <option value="2">Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label for="remarks" class="form-label">Remarks<span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter Your Remarks"></textarea>
                                            @error('remarks')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                            @enderror
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
