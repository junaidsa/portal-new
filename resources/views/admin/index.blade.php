@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Responsive Datatable</h5> <div class="btn-container"><a href="{{url('admin/register')}}" class="btn btn-success">Create Admin</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Email</th>
              <th>Post</th>
              <th>City</th>
              <th>Date</th>
              <th>Salary</th>
              <th>Age</th>
              <th>Experience</th>
              <th>Status</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Email</th>
              <th>Post</th>
              <th>City</th>
              <th>Date</th>
              <th>Salary</th>
              <th>Age</th>
              <th>Experience</th>
              <th>Status</th>
            </tr>
          </tfoot>
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
                    window.location.href = "{{url('/hangar/delete/')}}/"+id
                }
    });
     })
  </script>
  @endsection
