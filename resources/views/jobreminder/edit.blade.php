@extends('layouts.app')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h5>Edit Job Reminder</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('jobreminder.update', $jobReminder->id) }}">
                @csrf
                @method('PUT')  <!-- This tells Laravel that this is an update request -->

                {{-- Message Field --}}
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="8" maxlength="1900" required>{{ old('message', $jobReminder->message) }}</textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Status Field --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="0" @if($jobReminder->status == 0) selected @endif>Pending</option>
                        <option value="1" @if($jobReminder->status == 1) selected @endif>Complete</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Update Job Reminder</button>
            </form>
        </div>
    </div>
</div>
@endsection
