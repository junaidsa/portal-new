@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Class / </span>Edit</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Class Edit</h5>
                    <div class="card-body">
                        <form action="{{ route('schedule.update', $scheduleTimings->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="schedule_date" class="form-label">Date <span class="text-danger">*</span></label>
                                        <input type="date" value="{{ old('schedule_date', $scheduleTimings->schedule_date) }}" class="form-control @error('schedule_date') is-invalid @enderror" id="schedule_date" name="schedule_date" placeholder="Enter Subject Name" />
                                        @error('schedule_date')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="schedule_time" class="form-label">Time <span class="text-danger">*</span></label>
                                        <input type="time" value="{{ old('schedule_time', $scheduleTimings->schedule_time) }}" class="form-control @error('schedule_time') is-invalid @enderror" id="schedule_time" name="schedule_time" placeholder="Enter Subject Name" />
                                        @error('schedule_time')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary d-grid w-50">Submit</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
