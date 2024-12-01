@extends('layouts.app')
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
                <input type="month" id="student-date" name="date" class="form-control">
            </div>
            <div class="col-2 mb-4">
                <label for="">&nbsp;&nbsp;</label>
                <button class="btn btn-success mt-4" id="search_btn">Search</button>
            </div>
        </form>
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Reports</h5>
                </div>
                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label" for="selectAll"> Select All </label>
                </div> --}}
            </div>
            <div class="table-responsive">
                <table class="table table-flush-spacing">
                    <thead>
                        <tr>
                            <th>Student Name Class Level</th>
                            <th>Subject</th>
                            <th>Class Type</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Duration</th>
                            <th>Per Class Price</th>
                            {{-- <th>Teacher</th>
                            <th>Teacher Pay</th> --}}
                            <th>Class Status</th>
                        </tr>
                    </thead>
                    <tbody id="student-base">
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden">
        </form>
    </div>

    </div>
@endsection
@section('javascript')
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Get the current date
        //     var currentDate = new Date();
        //     var currentMonth = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1).toString().padStart(2, '0');
        //     document.getElementById('student-date').value = currentMonth;
        // });
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
                        $('#student-base').html(response.html);
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
            $('#student-date').on('change', function() {
                $('#select2Icons').val(null).trigger('change');
                $('#select2Icons').select2('open');
            });

        });
    </script>
@endsection
