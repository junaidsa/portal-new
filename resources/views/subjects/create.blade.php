@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Subject</h5>
                    <div class="card-body">
                        <form action="{{url('subject/store')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subject_name" class="form-label">Subject</label>
                                            <input type="text" class="form-control @error('subject_name') is-invalid @enderror" id="subject_name" name="subject_name"
                                                placeholder="Enter Subject Name" />
                                                @error('subject_name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Tuitions Packages<span class="text-danger">*</span></label>
                                            <select class="form-select  @error('package') is-invalid @enderror" id="package" name="package">
                                                <option value="">Select Tuitions Package</option>
                                                @foreach ($tuitions as $t)
                                                <option value="{{ $t->id }}" {{ old('tuitions') == $t->id ? 'selected' : '' }}>
                                                    {{ $t->name }}
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
                                            <label for="exampleFormControlSelect1" class="form-label">Branch<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select  @error('branch') is-invalid @enderror" id="branch"
                                                name="branch">
                                                <option value="">Select Branch</option>
                                                @foreach ($branch as $b)
                                                    <option value="{{ $b->id }}"
                                                        {{ old('branch') == $b->id ? 'selected' : '' }}>
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
                                            <label for="exampleFormControlSelect1" class="form-label">Subject Status</label>
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
