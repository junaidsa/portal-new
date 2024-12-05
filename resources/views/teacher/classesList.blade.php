@foreach ($sheduletimings as $s)    
<tr>
    <td class="text-nowrap fw-semibold">{{ $s->schedule->level->name ?? 'N/A' }}, 
      Class {{ $loop->iteration }} / {{ $s->schedule->level->subject->subject ?? 'N/A' }}</td>
    <td class="text-nowrap fw-semibold">{{ $s->classType->name }} </td>
    <td class="text-nowrap fw-semibold">{{ $s->schedule_date }} </td>
    <td class="text-nowrap fw-semibold">  {{ \Carbon\Carbon::parse($s->schedule_time)->format('h:i A') }}  </td>
    <td class="text-nowrap fw-semibold">  {{ $s->minute }}  </td>
    <td class="text-nowrap fw-semibold">  {{ $s->teacher->name ??  'N/A' }}  </td>
    <td class="text-nowrap fw-semibold">  {{ $s->teacher_pay ??  '0.00' }}  </td>
    <td class="text-nowrap fw-semibold">  <span class="badge {{ $s->status === 1 ? 'bg-label-success' : 'bg-label-warning' }}">
      {{ $s->status == 0 ? 'Pending' : 'Done' }}
  </span>
  </td>
  <td>
    <a href="{{ url('/class/edit/'.$s->id) }}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a>
</td>
  </tr>

@endforeach