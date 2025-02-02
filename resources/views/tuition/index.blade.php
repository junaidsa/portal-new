@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Tuition Packages List</h5> <div class="btn-container"><a href="{{url('tuition/create')}}" class="btn btn-success">Create Tuition</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table" id="myTable">
          <thead>
            <tr>
                <th>Sr#</th>
                <th>Name</th>
                <th>Year</th>
                <th>Type</th>
              <th>Price</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tuitions as $tuition)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tuition->name }}</td>
                <td>{{ $tuition->year }}</td>
                <td>{{ $tuition->type }}</td>
                <td>{{ $tuition->price }}</td>
                <td> <span class="badge  {{$tuition->status == 1  ? 'bg-label-success' : 'bg-label-danger' }}">{{ $tuition->status == 1 ? 'Active' : 'Deactive' }}</span></td>
                <td> <a href="{{url('/tuition/edit/'.$tuition->id)}}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a>
                    <a href="javascript:;" class="delete-btn" name="{{$tuition->name}}"  id="{{$tuition->id}}"><i class="ti ti-trash me-2"></i></a></td>
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
                    window.location.href = "{{url('/tuition/delete/')}}/"+id
                }
    });
     })
  </script>
  @endsection
