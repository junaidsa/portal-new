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
    <td class="text-nowrap fw-semibold">  <span class="badge {{ $s->status === 1 ? 'bg-label-success' : 'bg-label-warning' }}">
      {{ $s->status === 0 ? 'Pending' : ($s->status === 1 ? 'Done' : 'N/A') }}
    </span>
  </td>
  <td>
    <a href="{{ url('/class/edit/'.$s->id) }}" class="edit-btn "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
</svg></a>
</td>
  </tr>
@endforeach