@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tuitions/</span> Tuitions Packages</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Tuitions Packages</h5>
                    <div class="card-body">
                        <form action="{{ url('/tuition/store') }}" method="POST" id="adminForum">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name"
                                            placeholder="Enter Full Name"value="{{ old('name') }}" />
                                        @error('name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Tuition Type</label>
                                        <select class="form-select @error('type') is-invalid @enderror" id="type"
                                            name="type" aria-label="Default select example">
                                            <option value="1-1 Online">1-1 Online</option>
                                            <option value="1-1 Home">1-1 Home</option>
                                            <option value="Online Group">Online Group</option>
                                            <option value="Physical">Physical</option>
                                        </select>
                                        @error('type')
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
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label" for="modalEditUserLanguage">Levels <span class="text-danger">*</span></label>
                                    <select id="level_id" name="level_id" class="form-select @error('level_id') is-invalid @enderror">
                                        <option value="">Select</option>
                                        @foreach ($level as $l)
                                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Price <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                            id="price" name="price"
                                            placeholder="Enter Price"value="{{ old('price') }}" />
                                        @error('price')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Year</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                            id="year" name="year"
                                            placeholder="Enter Year"value="{{ old('year') }}" />
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
