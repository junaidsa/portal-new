@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table" id="myTable">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Student Name</th>
              <th>Branch</th>
              <th>Class Type</th>
              <th>Level</th>
              <th>Time Type</th>
              <th>Quantity</th>
              <th>Total Amount</th>
              <th>Minute</th>
              <th>Payment Type</th>
              <th>Payment Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($schedule as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->student->name }}</td>
                <td>{{ $s->branch->branch }}</td>
                <td>{{ $s->classType->name }}</td>
                <td>{{ $s->level->name }}</td>
                <td>{{ ucwords($s->time_type) }}</td>
                <td class="text-center">{{ ucwords($s->qty) }}</td>
                <td>{{ ucwords($s->total_amount) }}</td>
                <td class="text-center">{{ ucwords($s->minute) }}</td>
                <td>{{ $s->payment_type }}</td>
                <td>
                  <span class="me-5 badge {{$s->payment_status == 1 ? 'bg-label-success' : 'bg-label-info'}}" id="status-badge-{{$s->id}}">
                    {{$s->payment_status == 1 ? 'Approve' : 'Pending'}}
                </span>

                </td>
                <td>
                  <a href="{{ asset('public/prove/'. $s->payment_prove) }}" target="_blank"  data-id="{{$s->id}}"></i><i class="ti ti-eye me-2 ms-3"></i></a>
                  <a href="javascript:void(0)" class="status-btn btn btn-warning btn-sm mt-2" data-id="{{$s->id}}"></i>Approve</a>
                </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
    <!--/ Responsive Datatable -->
  </div>
  @endsection

  @section('link-js')
  <script src="{{ asset('public') }}/assets/js/dataTables.min.js"></script>

  @endsection
  @section('javascript')
  <script>
    let table = new DataTable('#myTable');
    $(document).on('click', '.status-btn', function() {
    var button = $(this);
    var orderId = button.data('id');
    $.ajax({
        url: "{{ url('/payment/approve') }}"+'/'+orderId,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            alert('Status updated successfully!');
            location.reload();
        },
        error: function() {
            alert('An error occurred while updating the status.');
        }
    });
});

  </script>
  @endsection
