@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">
@endsection
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="text-center mb-4">
            <h3 class="role-title mb-2">Student Report</h3>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false"
            novalidate="novalidate">
            <div class="col-7 mb-4">
                <label class="form-label" for="student-select">Search Student</label>
                <select id="select2Icons" name="search" class="select2-icons form-select">
                </select>
            </div>
            <div class="col-3 mb-4">
                <label class="form-label" for="student-date">Date</label>
                <input type="month" id="student-date" name="date" class="form-control" placeholder="Search Date">
            </div>
            <div class="col-2 mb-4">
                <label for="">&nbsp;&nbsp;</label>
                <button class="btn mt-4" id="search_btn" style="background-color: #7367ef; color: white;">Search</button>
            </div>
        </form>
        <div class="col-12">
            <div class="d-flex justify-content-between">
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Reports</h5>
                </div>
    
                <div class="card-body">
            <div class="table-responsive">
                <table class="table table-flush-spacing" id="myTable">
                    <thead>
                        <tr>
                            <th>Student Name Class Level</th>
                            <th>Subject</th>
                            <th>Class Type</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Duration</th>
                            <th>Per Class Price</th>
                            <th>Class Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="student-base">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
@endsection

@section('link-js')
    <script src="{{ asset('public') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
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
            searching: false,
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export',
                title: 'Student Report'
            }]
        });
        document.addEventListener("DOMContentLoaded", function() {
                flatpickr('.flatpickr', {
                    dateFormat: "Y-m-d"
                });
            });
        $(document).ready(function() {
            $(document).on('click', '#search_btn', function() {
                const student_id = $('#select2Icons').val();
                const student_date = $('#student-date').val()
                $.ajax({
                    url: "{{ url('schedule/report') }}",
                    method: 'POST',
                    data: {
                        student_id: student_id,
                        student_date: student_date,
                        _token: '{{ csrf_token() }}'


                    },
                    success: function(response) {
                        if (response.html && response.html.trim() !== '') {
                $('#student-base').html(response.html);
            } else {
                $('#student-base').html('<h4 class="d-flex justify-content-center mt-4 text-muted">No data found</h4>');
            }
             },
                    error: function(xhr, status, error) {
                        console.error('Error fetching schedules: ' + error);
                    }
                });
            });
            $('#select2Icons').select2({
                theme: 'bootstrap5',
                placeholder: 'Select a student',
                allowClear: true,
                dropdownParent: $('#addRoleForm')
            });
            $('#assignTeacherModal').on('shown.bs.modal', function() {
                $('#teacher-icons').select2({
                    dropdownParent: $('#assignTeacherModal'),
                    placeholder: 'Search Teacher',
                    width: '100%'
                });
            });


            function formatOption(option) {
                if (!option.id) return option.text;
                const iconHtml = option.element && $(option.element).data('icon') ?
                    `<i class="${$(option.element).data('icon')}"></i>` :
                    `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="menu-icon icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path></svg>`;

                return $(`<span>${iconHtml} ${option.text}</span>`);
            }

            $('#select2Icons').select2({
                placeholder: 'Search for a Student',
                templateResult: formatOption,
                templateSelection: formatOption,
                allowClear: true,
                ajax: {
                    url: '{{ url('student/search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        var selectedDate = $('#student-date').val();
                        return {
                            search: params.term,
                            date: selectedDate
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(student => ({
                                id: student.id,
                                text: `${student.name} ${student.parent_name}- ${student.email}`
                            }))
                        };
                    },
                    cache: true
             }
            });
            $('#select2Icons').val(null).trigger('change');
            $('#select2Icons').select2('open');
        });
    </script>
@endsection
