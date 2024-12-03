@php
    $subject = DB::table('subjects')->where('levels_id', $levelId)->get();
    $level = DB::table('levels')->where('id', $levelId)->get();
@endphp


@if ($class_type == 3)
    {{-- <div class="col-md-12">
        <label class="form-label">Select Your Subject <span class="text-danger">*</span></label>
        <select id="subject_id" name="subject_id" class="form-select">
            <option value="">Select</option>
            @foreach ($subject as $s)
                <option value="{{ $s->id }}">{{ $s->subject }}</option>
            @endforeach
        </select>
    </div> --}}
    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th>Quantity</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($level as $l)
            <tr>
                <td>{{ $l->quantity }}</td>
                <td>{{ \Carbon\Carbon::parse($l->date)->format('d-M-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($l->time)->format('h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr class="mt-5">
@else
    <div class="col-md-7">
        <label class="form-label"> Your Subject <span class="text-danger">*</span></label>
        <select id="subject_id" name="subject_id" class="form-select">
            <option value="">Select</option>
            @foreach ($subject as $s)
                <option value="{{ $s->id }}">{{ $s->subject }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-5 d-flex align-items-center justify-content-between">
        <p class="mb-0">Select Your Class Duration</p>
        <div class="d-flex flex-column ms-3">
            <div class="form-check mt-2">
                <input type="radio" name="time_type" class="form-check-input" value="Same">
                <label for="same" class="form-check-label">Same Duration</label>
            </div>
            <div class="form-check mt-2">
                <input type="radio" name="time_type" value="Flexible" class="form-check-input">
                <label for="flexible" class="form-check-label">Flexible Duration</label>
            </div>
        </div>
    </div>
@endif
