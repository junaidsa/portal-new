@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject /</span> Edit</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Subject</h5>
                    <div class="card-body">
                        <form action="{{url('subject/update')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <input type="hidden" value="{{$subject->id}}" name="id">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="branch_name" class="form-label">Subject</label>
                                            <input type="text" class="form-control @error('subject_name') is-invalid @enderror" id="subject_name" name="subject_name" value="{{$subject->subject}}"/>
                                            @error('subject_name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Branch <span class="text-danger">*</span></label>
                                            <select class="form-select  @error('branch') is-invalid @enderror" id="branch" name="branch">
                                                <option value="">Select Branch</option>
                                                @foreach ($branch as $b)
                                                    <option value="{{ $b->id }}" @if ($b->id) selected @endif
                                                        {{ old('branch') == $b->id ? 'selected' : '' }}>
                                                        {{ $b->branch }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('branch')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="level_id" class="form-label">Levels <span class="text-danger">*</span></label>
                                            <select class="form-select @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                                                <option value="">Select Level</option>
                                                {{-- @foreach ($level as $l)
                                                    <option value="{{ $l->id }}" @if ($l->id) selected @endif
                                                        {{ old('level_id', $subject->level_id) == $l->id ? 'selected' : '' }}>
                                                        {{ $l->name }} {{ $l->year }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            @error('level_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Subject Status</label>
                                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                <option value="1" @if($subject->subject == 1) selected @endif>Active</option>
                                                <option value="0" @if($subject->subject == 0) selected @endif>Deactive</option>
                                            </select>
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
@section('javascript')
<script>
    $(document).ready(function () {
      $('#branch').on('change', function () {
          let branchId = $(this).val();
          $('#level_id').html('<option value="">Loading...</option>');

          if (branchId) {
              $.ajax({
                  url: '{{ route("get-levels") }}',
                  type: 'GET',
                  data: { branch_id: branchId },
                  success: function (data) {
                      let options = '<option value="">Select Level</option>';
                      data.forEach(level => {
                          options += `<option value="${level.id}">${level.name} ${level.year}</option>`;
                      });
                      $('#level_id').html(options);
                  },
                  error: function () {
                      $('#level_id').html('<option value="">Failed to load levels</option>');
                  }
              });
          } else {
              $('#level_id').html('<option value="">Select Level</option>');
          }
      });
  });
  </script>

@endsection
