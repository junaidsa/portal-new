@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Student List</h5> <div class="btn-container"><a href="{{url('students/step-1')}}" class="btn btn-success">Create Student</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table" id="myTable">
          <thead>
            <tr>
              <th>Sr#</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Branch</th>
              <th>Created By</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $s)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ @$s->branch->branch }}</td>
                <td>{{ @$s->created_at->format('Y-m-d') }}</td>
                <td> <span class="badge  {{$s->role == 'student'  ? 'bg-label-success' : 'bg-label-danger' }}">{{ strtoupper($s->role) }}</span></td>
                <td>
                  @module('delete_student')
                  <a href="javascript:;" class="delete-btn" name="{{$s->name}}"  id="{{$s->id}}"><i class="ti ti-trash me-2"></i></a>
                  @endmodule
                    <a href="{{url('/profile/'.$s->id)}}"><i class="ti ti-eye me-2"></i></a>
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
