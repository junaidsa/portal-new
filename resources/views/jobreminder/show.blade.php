@extends('layouts.app')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Job Reminder Details</h5>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Job Name</label>
                <input type="text" class="form-control" id="name" value="{{ $jobReminder->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea class="form-control" id="remarks" rows="4" disabled>{{ $jobReminder->remarks }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <span class="badge {{ $jobReminder->status == 1 ? 'bg-label-danger' : 'bg-label-success' }}">
                    {{ $jobReminder->status == 1 ? 'Pending' : 'Complete' }}
                </span>
            </div>

            <a href="{{ route('jobreminder.edit', $jobReminder->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection