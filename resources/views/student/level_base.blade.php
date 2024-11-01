
@php
$subject = DB::table('subjects')->where('level_id',$levelId)->get();
@endphp
@if ($class_type == 3)
    
<div class="col-md-12">
    <label class="form-label">Select Your Subject <span class="text-danger">*</span></label>
    <select id="subject_id" name="subject_id" class="form-select">
        <option value="">Select</option>
        @foreach ($subject as $s)
        <option value="{{ $s->id }}">{{ $s->subject }}</option>
        @endforeach
    </select>
</div>
@else
<div class="col-md-7">
    <label class="form-label">Select Your Subject <span class="text-danger">*</span></label>
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
