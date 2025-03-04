@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Your Classes</h5>
            </div>

            <div class="card-body">
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Student Name</th>
                                <th>Class Type</th>
                                <th>Subject</th>
                                <th>Level</th>
                                <th>Class Date </th>
                                <th>Time</th>
                                <th>Duration</th>
                                <th>Class Earing</th>
                                <th>Payment Status</th> 
                                <th>Last Update</th> done
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assign as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ @$a->schedule_timing->schedule->student->name ?? 'Not Assigned' }}</td>
                                    <td>{{ @$a->schedule_timing->classType->name }}</td>
                                    <td>{{ @$a->schedule_timing->schedule->subject->subject }}</td>
                                    <td>{{ @$a->schedule_timing->schedule->level->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse(@$a->schedule_timing->schedule_date)->format('d M, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse(@$a->schedule_timing->schedule_time)->format('h:i A') }}</td>
                                    <td>{{ @$a->schedule_timing->minute }} minutes</td>
                                    <td>{{ @$a->class_fee == null ? '0.00' : $a->class_fee }}</td>
                                    <td>{{ @$a->status == 1 ? 'Paid' : 'Pending' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($a->schedule_timing->updated_at)->format('d M, y  h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('link-js')
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
                    window.location.href = "{{ url('/admin/delete/') }}/" + id
                }
            });
        })
    </script>
@endsection
