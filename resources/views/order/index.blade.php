@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Product Name</th>
              <th>Customer  Name</th>
              <th>Role</th>
              <th>Address</th>
              <th>Amount</th>
              <th>Payment Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order as $o)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ucwords($o->product->name) }}</td>
                <td>{{ ucwords($o->user->name) }}</td>
                <td>{{ ucwords($o->user->role) }}</td>
                <td>{{ ucwords($o->user->address) }}</td>
                <td>{{ $o->amount }}</td>
                <td>{{ ucwords($o->payment_status) }}</td>
                <td ><span class="badge  {{$o->order_status == 'Completed'  ? 'bg-label-success' : 'bg-label-info' }}">{{$o->order_status }}</span></td>
                <td>
                  @if($o->order_status != 'On the Way' && $o->order_status != 'Delivered')
                  <a href="javascript:void(0)" class="status-btn btn btn-warning btn-sm mt-2" data-id="{{$o->id}}" data-status="On the Way"><i class="ti ti-truck me-2"></i> On the Way</a>
                  @endif
                  @if($o->order_status != 'Delivered')
                  <a href="javascript:void(0)" class="status-btn btn btn-success btn-sm mt-2" data-id="{{$o->id}}" data-status="Delivered"><i class="ti ti-package me-2"></i> Delivered</a>
                  @endif
                  <a href="javascript:void(0)" class="delete-btn btn btn-danger btn-sm mt-2"  name="{{$o->name}}"  id="{{$o->id}}"><i class="ti ti-trash me-2"></i> Delete</a>
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
  <script src="{{asset('public')}}/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
  <script src="{{asset('public')}}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="{{asset('public')}}/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
  <script src="{{asset('public')}}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
     <!-- Flat Picker -->
     <script src="{{asset('public')}}/assets/vendor/libs/moment/moment.js"></script>
     <script src="{{asset('public')}}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
      <!-- Page JS -->
      <script src="{{asset('public')}}/assets/js/tables-datatables-advanced.js"></script>
  @endsection
  @section('javascript')
  <script>
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
    
$("body").on('click', '.status-btn', function () {
    var id = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    
    Swal.fire({
        html: `Are you sure you want to update the order status to ` + status + `?`,
        icon: "info",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Yes, update it!",
        cancelButtonText: 'Cancel',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
    }).then(function (result) {
        if (result.value) {
            // AJAX request to update order status
            $.ajax({
                url: "{{url('/order/update-status')}}/" + id,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}", // CSRF protection
                    order_status: status
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order status updated to ' + status + '!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // Reload the page or update the table row (optional)
                    location.reload();
                }
            });
        }
    });
});
  </script>
  @endsection
