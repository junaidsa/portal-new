@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Teacher List</h5>
                <div class="btn-container">
                    <div class="btn-container">
                        @if(isset($uuid))
                            <a href="{{ url('teacher/create/' . $uuid) }}" class="btn" style="background-color: #7367ef; color: white;">Create Teacher</a>
                        @else
                            <p>UUID not found.</p>
                        @endif
                    </div>

                </div>

            </div>

            <div class="card-body">
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name </th>
                                <th>Mobile</th>
                                <th>Subjects</th>
                                <th>Levels</th>
                                <th>Created </th>
                                <th>Branch</th>
                                <!--<th>Role</th>-->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $tec)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('public/profile/' . $tec->profile_pic) }}" alt="Profile Image" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"></td>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $tec->name }}</td>
                                    <td>{{ $tec->phone_number }}</td>
                                    <td>{{ implode(', ', $tec->subject) }}</td>
                                    <td>{{ implode(', ', json_decode($tec->level)) }}</td>
                                    <td>{{ @$tec->created_at->format('d-M-Y h:i A') }}</td>
                                    <td>{{ @$tec->branch->branch }}</td>
                                    <!--<td> <span
                                            class="badge  {{ $tec->role == 'teacher' ? 'bg-label-success' : 'bg-label-danger' }}">{{ strtoupper($tec->role) }}</span>
                                    </td>-->
                                    <td>
                                        @module('delete_teacher')
                                            <a href="javascript:;" class="delete-btn" name="{{ $tec->name }}"
                                                id="{{ $tec->id }}"><i class="ti ti-trash me-2"></i></a>
                                        @endmodule
                                        <a href="{{ url('profile/' . $tec->id) }}" class="view"><i
                                                class="ti ti-eye me-2"></i></a>
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
    <script src="{{ asset('public') }}/assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('public') }}/assets/js/tables-datatables-advanced.js"></script>
    <script src="{{ asset('public') }}/assets/js/dataTables.min.js"></script>
@endsection

@section('javascript')
    <script>
        let table = new DataTable('#myTable');
        $("body").on('click', '.delete-btn', function() {
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
            }).then(function(result) {
                if (result.value) {
                    window.location.href = "{{ url('/teacher/delete/') }}/" + id
                }
            });
        })
    </script>
@endsection
