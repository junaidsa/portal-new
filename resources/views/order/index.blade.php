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
              <th>Name</th>
              <th>Product Name</th>
              <th>Amount</th>
              <th>Payment Method</th>
              <th>Role</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order as $o)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{Auth::user()->name}}</td>
                <td>{{$o->product_id}}</td>
                <td>{{$o->payment_method}}</td>
                <td>{{$o->amount}}</td>
                <td>{{$o->amount}}</td>
                <td ><span class="badge  {{$o->status == 1  ? 'bg-label-success' : 'bg-label-danger' }}">{{$o->status == 1  ? 'Deliver' : 'Pending' }}</span></td>
                <td>
                    <a href="" class="edit-btn "><i class="ti ti-download me-1"></i></a>
                    <a href="javascript:;" class="delete-btn" name="{{$o->name}}"  id="{{$o->id}}"><i class="ti ti-trash me-2"></i></a>
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
  </script>
  @endsection
