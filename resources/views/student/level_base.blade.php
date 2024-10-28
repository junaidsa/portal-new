
@php
$tution = DB::table('tuitions')->where('level_id',$levelId)->get();
$subject = DB::table('subjects')->where('level_id',$levelId)->get();
@endphp
<div class="col-md-6">
    <label class="form-label">Select Your Tuitions <span class="text-danger">*</span></label>
    <select id="tuition_id" name="tuition_id" class="form-select">
        <option value="">Select</option>
        @foreach ($tution as $t)        
        <option value="{{ $t->id }}">{{ $t->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <label class="form-label">Select Your Subject <span class="text-danger">*</span></label>
    <select id="subject_id" name="subject_id" class="form-select">
        <option value="">Select</option>
        @foreach ($subject as $s)
        <option value="{{ $s->id }}">{{ $s->subject }}</option>
        @endforeach
    </select>
</div>