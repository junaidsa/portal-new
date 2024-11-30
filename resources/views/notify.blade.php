@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Responsive Datatable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>View All Notifications</h5>
            </div>

            <div class="card-body">
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Title</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $n)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ @$n->title }}</td>
                                    <td>{{ @$n->message }}</td>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $.ajax({
                url: "{{ route('notification.read') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response.message);
                },
                error: function(xhr) {
                    console.error("Error:", xhr.responseText);
                }
            });
        });
    </script>
@endsection
