@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Staff List</h5> <div class="btn-container"><a href="{{url('staff/create')}}" class="btn btn-success">Create Staff</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table" id="myTable">
          <thead>
            <tr>
              <th>Sr#</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Branch</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($staffs as $staff)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->email }}</td>
                <td>{{ @$staff->branch->branch }}</td>
                <td> <span class="badge  {{$staff->role == 'staff'  ? 'bg-label-success' : 'bg-label-danger' }}">{{ strtoupper($staff->role) }}</span></td>
                <td>
                    {{-- <a href="{{url('/staff/edit/'.$staff->id)}}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a> --}}
                    <a href="javascript:;" class="delete-btn" name="{{$staff->name}}"  id="{{$staff->id}}"><i class="ti ti-trash me-2"></i></a>
                    <a href="{{url('/profile/'.$staff->id)}}"><i class="ti ti-eye me-2"></i></a>
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
     <!-- Flat Picker -->
     <script src="{{asset('public')}}/assets/vendor/libs/moment/moment.js"></script>
     <script src="{{asset('public')}}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
      <!-- Page JS -->
      <script src="{{asset('public')}}/assets/js/tables-datatables-advanced.js"></script>
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
                    window.location.href = "{{url('/staff/delete/')}}/"+id
                }
    });
     })
  </script>
  @endsection
