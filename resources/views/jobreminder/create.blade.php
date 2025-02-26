@extends('layouts.app')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h5>Create New Job Reminder</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('jobreminder.store') }}">
                @csrf

                {{-- Message Field --}}
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="8" maxlength="1900" required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Status Field --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="complete" {{ old('status') == 'complete' ? 'selected' : '' }}>Complete</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Create Job Reminder</button>
            </form>
        </div>
    </div>
</div>
@endsection
