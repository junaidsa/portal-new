@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Datatable -->
    <div class="card">
      <div class="card-header d-flex justify-content-between"><h5>Bank Table</h5> <div class="btn-container"><a href="{{url('/bank/create')}}" class="btn btn-success">Create Bank</a></div></div>

      <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="dt-responsive table" id="myTable">
          <thead>
            <tr>
                 <th>Sr</th>
                        <th>Bank Name</th>
                        <th>Account Holder Name</th>
                        <th>Account Number</th>
                        <th>Image</th>
                        <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bank as $b)
            <tr>
              <td>{{ $loop->iteration }}</td>
                        <td>{{$b->bank_name}}</td>
                        <td>{{$b->account_holdername}}</td>
                        <td>{{$b->account_number}}</td>
                        <td>
                            @if($b->image)
                            <img src="{{ asset('bank_images/' . $b->image) }}" alt="Bank Image" width="100" height="auto">
                        @else
                            No Image
                        @endif
                        </td>
                <td>
                    <a href="{{url('/bank/edit/'.$b->id)}}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a>
                    <a href="javascript:;" class="delete-btn" name="{{$b->bank}}"  id="{{$b->id}}"><i class="ti ti-trash me-2"></i></a>
                </td>
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
                    window.location.href = "{{url('/bank/delete/')}}/"+id
                }
    });
     })
  </script>
  @endsection
