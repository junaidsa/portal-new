@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">
@endsection
@section('main')
    <style>
        .dt-search {
            text-align: right;
        }
    </style>
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
                                <th>Teacher</th>
                                <th>Mode</th>
                                <th>Duration</th>
                                <th>Level</th>
                                <th>Subject</th>
                                <th>Class Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scheduleTimings as $schedule_timing)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ @$schedule_timing->teacher->name ?? 'Not Assigned' }}</td>
                                    <td>{{ @$schedule_timing->classType->name }}</td>
                                    <td>{{ @$schedule_timing->minute }} minutes</td>
                                    <td>{{ @$schedule_timing->schedule->level->name }}</td>
                                    <td>{{ @$schedule_timing->schedule->subject->subject }}</td>
                                    <td>{{ \Carbon\Carbon::parse(@$schedule_timing->schedule_date)->format('d M, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse(@$schedule_timing->schedule_time)->format('h:i A') }}</td>
                                    <td>{{ $schedule_timing->status == 0 ? 'Pending' : 'Done' }}</td>
                                    {{-- <td>
                                        <a href="{{ url('/class/edit/' . $schedule_timing->id) }}" class="edit-btn "><i class="ti ti-pencil me-1"></i></a>
                                    </td> --}}
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
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vfs-fonts/2.0.0/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
@endsection
@section('javascript')
    <script>
        let table = new DataTable('#myTable', {
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export',
                title: 'My Classes'
            }]
        });

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
