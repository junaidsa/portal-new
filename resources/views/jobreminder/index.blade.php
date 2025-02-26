@extends('layouts.app')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Job Reminder List</h5>
            @if (auth()->user()->role == 'super')
            <a href="{{ route('jobreminder.create') }}" class="btn btn-success">Create New</a>
            @endif
        </div>

        <div class="card-body">
            @foreach ($jobReminders as $job)
            <div class="job-reminder-box mb-3">

                <div class="job-header d-flex justify-content-between">
                    <h6><strong>Job #{{ $job->id }}</strong></h6>
                    <span class="badge {{ $job->status == 0 ? 'bg-warning' : 'bg-danger' }}"
                          style="background-color: #f8d7da; color: #721c24; font-size: 14px; font-weight: bold; padding: 7px 10px; border-radius: 8px; text-align: center; display: inline-block;">
                        {{$job->status == 0  ? 'Hiring Now - Apply ASAP' : 'Job Closed - Hired' }}
                    </span>
                </div>

                <div class="job-message mt-2">
                    <p>{{ $job->message }}</p>
                </div>

                {{-- Action buttons (visible only to SuperAdmin) --}}
                @if (auth()->user()->role == 'super')
                <div class="job-actions mt-3 d-flex">
                    <a href="{{ route('jobreminder.edit', $job->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                    <form action="{{ route('jobreminder.destroy', $job->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
                @endif
                </br>
            <button type="contact" class="btn btn-success btn-sm me-2" style="float: left;">
              <a href="https://wa.me/message/U2Y4YU5ZDNEQN1" target="_blank" style="color: #fff; text-decoration: none;">Apply on WhatsApp</a>
            </button>
            </div>
            @endforeach
        </div>
    </div>
</div>

            <div class="job-actions mt-3 d-flex" style="display: flex; justify-content: center;">
              <p style="background-color: #f8d7da; color: #721c24; font-size: 14px; font-weight: bold; padding: 10px 20px; border-radius: 8px; text-align: center; display: inline-block;">
                ⚠️ <strong>Note:</strong> Only <strong>pending job posts</strong> are available for application.
                Completed job posts will be automatically deleted <strong>72 hours</strong> after completion.
              </p>
            </div>

{{-- Custom Styles for the Message Box Design --}}
<style>
    .job-reminder-box {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: relative;
    }

    .job-header h6 {
        color: #333;
        font-weight: bold;
    }

    .job-header .badge {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 12px;
    }

    .bg-warning {
        background-color: #f0ad4e !important;
        color: white;
    }

    .bg-success {
        background-color: #28a745 !important;
        color: white;
    }

    .job-message p {
        font-size: 16px;
        color: #555;
        margin: 0;
    }

    .job-actions a,
    .job-actions button {
        font-size: 14px;
    }

    .job-actions a {
        background-color: #007bff;
        color: white;
    }

    .job-actions button {
        background-color: #dc3545;
        color: white;
    }

    .job-actions a:hover {
        background-color: #0056b3;
    }

    .job-actions button:hover {
        background-color: #c82333;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
    }
</style>
@endsection
