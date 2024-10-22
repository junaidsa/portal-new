@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Subject</h5>
                    <div class="card-body">
                        <form action="{{ url('/category/update/' . $category->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Specify that this is an update -->
                            <div class="row">
                                <input type="hidden" value="{{$category->id}}" name="id">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter Name" value="{{ old('name', $category->name) }}" required />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Subject Status</label>
                                        <select class="form-select" id="status" name="status" aria-label="Default select example">
                                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <button class="btn btn-primary d-grid w-50">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
