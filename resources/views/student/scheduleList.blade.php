@foreach ($sheduletimings as $s)    
<tr>
    <td class="text-nowrap fw-semibold">{{ $s->schedule->level->name ?? 'N/A' }}, 
      Class {{ $loop->iteration }}  </td>
      <td>{{ $s->schedule->level->subject->subject ?? 'N/A' }}</td>
    <td class="text-nowrap fw-semibold">{{ $s->classType->name }} </td>
    <td class="text-nowrap fw-semibold">{{ $s->schedule_date }} </td>
    <td class="text-nowrap fw-semibold">  {{ \Carbon\Carbon::parse($s->schedule_time)->format('h:i A') }}  </td>
    <td class="text-nowrap fw-semibold">  {{ $s->minute }}  </td>
    <td class="text-nowrap fw-semibold">  {{ $s->per_class_amount ?? 0 }}  </td>
    <td class="text-nowrap fw-semibold {{ Request::is('student/report') ? '' : 'd-none' }}">
      {{ $s->teacher->name ?? 'N/A' }}
  </td>
  <td class="text-nowrap fw-semibold {{ Request::is('student/report') ? '' : 'd-none' }}">
      {{ $s->teacher_pay ?? '0.00' }}
  </td>
    <td class="text-nowrap fw-semibold">  <span class="badge {{ $s->status === 1 ? 'bg-label-success' : 'bg-label-warning' }}">
      {{ $s->status === 0 ? 'Pending' : ($s->status === 1 ? 'Done' : 'N/A') }}
  </span>
  </td>
  <td class="text-nowrap fw-semibold {{ Request::is('student/report') ? '' : 'd-none' }}"><input class="form-check-input schedule-checkbox" value="{{ $s->id }}" data-id="{{ $s->id }}" type="checkbox"></td>
  </tr>

@endforeach