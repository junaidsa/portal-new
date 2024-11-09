@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Admin Table</h5> <div class="btn-container"><a href="{{url('admin/register')}}" class="btn btn-success">Create Admin</a></div></div>

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
            {{-- @dd($admins) --}}
            @foreach ($admins as $admin)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ @$admin->branch->branch }}</td>
                <td> <span class="badge  {{$admin->role == 'admin'  ? 'bg-label-success' : 'bg-label-danger' }}">{{ strtoupper($admin->role) }}</span></td>
                <td>
                    {{-- <a href="{{url('/admin/edit/'.$admin->id)}}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a> --}}
                    <a href="javascript:;" class="delete-btn" name="{{$admin->name}}"  id="{{$admin->id}}"><i class="ti ti-trash me-2"></i></a>
                    <a href="{{url('profile/'.$admin->id)}}" class="view" name="{{$admin->name}}"  id="{{$admin->id}}"><i class="ti ti-eye me-2"></i></a>
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
                    window.location.href = "{{url('/admin/delete/')}}/"+id
                }
    });
     })
  </script>
  @endsection
