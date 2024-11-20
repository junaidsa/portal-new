@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">level /</span> Edit</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Level</h5>
                    <div class="card-body">
                        <form action="{{url('level/update')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <input type="hidden" value="{{$level->id}}" name="id">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="level_name" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('level_name') is-invalid @enderror" id="level_name" name="level_name"
                                                value="{{$level->name}}"/>
                                                    @error('level_name')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="year" class="form-label">Years<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                                                value="{{$level->year}}"/>
                                                    @error('year')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="prices" class="form-label">Prices <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('prices') is-invalid @enderror" id="prices" name="prices"
                                                value="{{$level->price}}"/>
                                                    @error('prices')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Level Status</label>
                                                <select class="form-select" id="status" name="status"
                                                    aria-label="Default select example">
                                                    <option value="1" @if($level->status == 1) selected @endif>Active</option>
                                                    <option value="2 "@if($level->status == 2) selected @endif>Deactive</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Class Type</label>
                                                <select class="form-select @error('class_type_id') is-invalid @enderror" id="class_type_id"
                                                    name="class_type_id" aria-label="Default select example">
                                                    <option value="1" @if($level->status == 1) selected @endif>1-1 Online</option>
                                                    <option value="2" @if($level->status == 2) selected @endif>1-1 Home</option>
                                                    <option value="3" @if($level->status == 3) selected @endif>Online Group</option>
                                                    <option value="4" @if($level->status == 4) selected @endif>Physical</option>
                                                </select>
                                                @error('class_type_id')
                                                    <div class=" invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="Branch" class="form-label">Branch <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select @error('branch') is-invalid @enderror" id="branch"
                                                    name="branch">
                                                    <option value="">Select Branch</option>
                                                    @foreach ($branch as $b)
                                                        <option value="{{ $b->id }}">{{ $b->branch }}</option>
                                                    @endforeach
                                                    @error('branch')
                                                        <div class=" invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </select>
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
