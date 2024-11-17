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
              <th>Time Type</th>
              <th>Quantity</th>
              <th>Total Amount</th>
              <th>Minute</th>
              <th>Payment Type</th>
              {{-- <th>Status</th> --}}
              <th>Payment Status</th>
              <th>Payment Aprove</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($schedule as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ ucwords($s->qty) }}</td>
                <td>{{ ucwords($s->total_amount) }}</td>
                <td>{{ ucwords($s->minute) }}</td>
                <td>{{ $s->payment_type }}</td>
                <td>{{ ucwords($s->status) }}</td>
                <td>
                    <span class="badge {{$s->status == 'Decline' ? 'bg-label-success' : 'bg-label-info'}}" id="status-badge-{{$s->id}}">
                        {{$s->status}}
                    </span>
                </td>
                <td>
                    @if($s->status != 'On the Way' && $s->status != 'Delivered')
                    <a href="javascript:void(0)" class="status-btn btn btn-warning btn-sm mt-2" data-id="{{$s->id}}" data-status="On the Way">
                        <i class="ti ti-truck me-2"></i>Approve
                    </a>
                @endif
                  @if($s->order_status != 'Delivered')
                  {{-- <a href="javascript:void(0)" class="status-btn btn btn-danger btn-sm mt-2" data-id="{{$s->id}}" data-status="Delivered"><i class="ti ti-package me-2"></i> Decline</a> --}}
                  @endif
                  {{-- <a href="javascript:void(0)" class="delete-btn btn btn-danger btn-sm mt-2"  name="{{$s->name}}"  id="{{$s->id}}"><i class="ti ti-trash me-2"></i> Delete</a> --}}
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
        $("body").on('click', '.delete-btn', function () {
        var id = $(this).attr('id')
        var name = $(this).attr('name')
        Swal.fire({
            html: `Are you really want to delete?`,
            icon: "info",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
    }).then(function (result) {
                if (result.value) {
                    window.location.href = "{{url('/category/delete/')}}/"+id
                }
    });
     })

// $("body").on('click', '.status-btn', function () {
//     var id = $(this).attr('data-id');
//     var status = $(this).attr('data-status');

//     Swal.fire({
//         html: `Are you sure you want to update the Bank Payment status to ` + status + `?`,
//         icon: "info",
//         buttonsStyling: false,
//         showCancelButton: true,
//         confirmButtonText: "Yes, update it!",
//         cancelButtonText: 'Cancel',
//         customClass: {
//             confirmButton: "btn btn-primary",
//             cancelButton: 'btn btn-danger'
//         }
//     }).then(function (result) {
//         if (result.value) {
//             // AJAX request to update order status
//             $.ajax({
//                 url: "{{url('/payment/approve')}}/" + id,
//                 type: 'PUT',
//                 data: {
//                     _token: "{{ csrf_token() }}", // CSRF protection
//                     order_status: status
//                 },
//                 success: function(response) {
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Order status updated to ' + status + '!',
//                         showConfirmButton: false,
//                         timer: 1500
//                     });
//                     // Reload the page or update the table row (optional)
//                     location.reload();
//                 }
//             });
//         }
//     });
// });


<script>
    $(document).on('click', '.status-btn', function() {
        var button = $(this);
        var orderId = button.data('id');
        var newStatus = button.data('status');

        // Make an AJAX request to update the status
        $.ajax({
            url: '/payment/approve' + orderId,  // Define the correct route to handle the status update
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  // CSRF token for protection
                status: newStatus
            },
            success: function(response) {
                if(response.success) {
                    // Update the status badge on success
                    var badge = $('#status-badge-' + orderId);
                    badge.text(response.newStatus);
                    badge.removeClass('bg-label-success bg-label-info')
                         .addClass(response.newStatus == 'Decline' ? 'bg-label-success' : 'bg-label-info');

                    // Optionally, you can change the button to reflect the new status, e.g. hide it
                    button.hide();  // Hide the button after status update (or change text, etc.)
                } else {
                    alert('Failed to update status!');
                }
            },
            error: function() {
                alert('An error occurred while updating the status.');
            }
        });
    });
</script>

  </script>
  @endsection
