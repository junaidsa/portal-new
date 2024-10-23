@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Branch Table</h5> <div class="btn-container"><a href="{{url('branch/create')}}" class="btn btn-success">Create Branch</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table" id="myTable">
          <thead>
            <tr>
                 <th>Sr</th>
                        <th>Name</th>
                        <th>Branch Code</th>
                        <th>Status</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($branches as $branch)

            <tr>
              <td>{{ $loop->iteration }}</td>
                        <td>{{$branch->branch}}</td>
                        <td>{{$branch->branch_code}}</td>
                        <td ><span class="badge  {{$branch->status == 1  ? 'bg-label-success' : 'bg-label-danger' }}">{{$branch->status == 1  ? 'Active' : 'Deacive' }}</span></td>
                        <td>{{$branch->city}}</td>
                        <td>{{ \Illuminate\Support\Str::words($branch->address, 8, '...') }}</td>

                <td> <a href="{{url('/branch/edit/'.$branch->id)}}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a>
                    <a href="javascript:;" class="delete-btn" name="{{$branch->branch}}"  id="{{$branch->id}}"><i class="ti ti-trash me-2"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
    <!--/ Responsive Datatable -->
               <!-- Basic Bootstrap Table -->

              <!--/ Basic Bootstrap Table -->
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
                    window.location.href = "{{url('/branch/delete/')}}/"+id
                }
    });
     })
  </script>
  @endsection
