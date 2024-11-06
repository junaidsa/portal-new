@foreach ($sheduletimings as $s)    
<tr>
    <td class="text-nowrap fw-semibold">{{ $s->schedule->level->name ?? 'N/A' }} 
    ,{{ $s->schedule->level->subject->subject ?? 'N/A' }} 
      Class {{ $loop->iteration }}  </td>
    <td>
      <div class="d-flex">
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementRead"> {{ $s->classType->name }} </label>
        </div>
      <div class="d-flex">
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementRead"> {{ $s->schedule_date }} </label>
        </div>
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementWrite"> 
              {{ \Carbon\Carbon::parse($s->schedule_time)->format('h:i A') }} 
          </label>
      </div>
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementCreate"> {{ $s->minute }} </label>
        </div>
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementCreate"> {{ $s->per_class_amount ?? 0 }} </label>
        </div>
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementCreate"> {{ $s->teacher->name ??  'N/A' }} </label>
        </div>
        <div class="form-check me-3 me-lg-5">
          <label class="form-check-label" for="userManagementCreate">  <span class="badge {{ $s->status === 1 ? 'bg-label-success' : 'bg-label-warning' }}">
            {{ $s->status === 0 ? 'Pending' : ($s->status === 1 ? 'Done' : 'N/A') }}
        </span></label>
        </div>
        <div class="form-check me-3 me-lg-5">
          <input class="form-check-input schedule-checkbox" value="{{ $s->id }}" type="checkbox">
        </div>
      </div>
    </td>
  </tr>
@endforeach