@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Category Table</h5> <div class="btn-container"><a href="{{url('category/create')}}" class="btn btn-success">Create Category</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $category)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$category->category}}</td>
                <td ><span class="badge  {{$category->status == 1  ? 'bg-label-success' : 'bg-label-danger' }}">{{$category->status == 1  ? 'Active' : 'Deacive' }}</span></td>
                <td> 
                  <a href="{{url('/category/edit/'.$category->id)}}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a>
                  <a href="javascript:;" class="delete-btn" name="{{$category->category}}"  id="{{$category->id}}"><i class="ti ti-trash me-2"></i></a>
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
