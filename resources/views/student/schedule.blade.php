@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="text-center mb-4">
            <h3 class="role-title mb-2">Create Schedules</h3>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false"
            novalidate="novalidate">
            <div class="col-6 mb-4">
                <label class="form-label" for="student-select">Search Student</label>
                <select id="select2Icons" class="select2-icons form-select">
                </select>
            </div>
            <div class="col-4 mb-4">
                <label class="form-label" for="student-select">Subject</label>
                <select id="subject_id" class="form-select">
                    <option value="">Select Subject</option>
                    @foreach ($subject as $s)
                        <option value="{{ $s->id }}">{{ $s->subject }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2 mb-4">
                <label for="">&nbsp;&nbsp;</label>
                <button class="btn btn-success mt-4" id="search_btn">Search</button>
            </div>
        </form>
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Schedules</h5>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label" for="selectAll"> Select All </label>
                </div>
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
                            <th>Teacher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="student-base">
                    </tbody>
                </table>
            </div>

            <!-- Add Permission Modal -->
            <div class="modal fade" id="assignTeacherModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Assign Teacher</h3>
                            </div>
                            <form id="assignClassForm" class="row">
                                <input type="hidden" name="classes" id="selectedClasses">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="teacher">Search Teacher</label>
                                    <select name="teacher" class="teacher-icons form-select" id="teacher-icons">
                                        @foreach ($teacher as $t)
                                            <option value="{{ $t->id }}" data-icon="ti ti-user">
                                                {{ $t->name }}
                                                ({{ $t->branch->branch ?? 'N/A' }})
                                                - Availability: {{ $t->availability ?? 'N/A' }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="teacher">Per Class Amount</label>
                                    <input type="number" class="form-control" name="class_fee" >
                                </div>
                        </div>
                        <div class="col-12 text-center demo-vertical-spacing">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Assign Classes</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Discard
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="assignMail" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Update Meeting Link</h3>
                            </div>
                            <form id="updateClassLink" class="row">
                                <input type="hidden" name="classes_id" id="selectedMail">
                                <div class="col-12 mt-4">
                                     <label for="exampleFormControlTextarea1" class="form-label">Meeting Link</label>
                                    <input type="text" class="form-control" name="meeting_link" id="meeting_link">
                                </div>
                        </div>
                        <div class="col-12 text-center demo-vertical-spacing">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Make Mail</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Discard
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Permission table -->
        </div>
        <div class="col-12 text-center mt-4">
            <button type="button" id="openMail"
                class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
            <button type="button" class="btn btn-label-success" id="assignTeacher">
                Assign Teacher
            </button>
        </div>
        <input type="hidden">
        </form>
    </div>

    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            let selectedIds = [];
            $('#assignClassForm').on('submit', function(event) {
                event.preventDefault();
                const formData = $(this).serialize();
                $.post("{{ url('/teacher/assign') }}", formData, function(response) {

                    if (response.success) {
                        $.toast({
                            heading: 'Success',
                            text: 'Classes assigned successfully.',
                            icon: 'success',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#7ed6df',
                            hideAfter: 3000
                        });
                        $('#assignTeacherModal').modal('hide');
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: 'Failed to assign classes Teacher Already Assign.',
                            icon: 'error',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#f86c6b',
                            hideAfter: 3000
                        });
                    }
                }).fail(function() {
                    alert("An error occurred while assigning classes.");

                });
            });
            $('#updateClassLink').on('submit', function(event) {
                event.preventDefault();
                const formData = $(this).serialize();
                $.post("{{ url('/classes/link') }}", formData, function(response) {

                    if (response.success) {
                        $.toast({
                            heading: 'Success',
                            text: 'Mail Created successfully.',
                            icon: 'success',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#7ed6df',
                            hideAfter: 3000
                        });
                        $('#assignMail').modal('hide');
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: 'Failed to assign classes Teacher Already Assign.',
                            icon: 'error',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#f86c6b',
                            hideAfter: 3000
                        });
                    }
                }).fail(function() {
                    alert("An error occurred while assigning classes.");

                });
            });
            $(document).on('change', '#selectAll', function() {
                $('.schedule-checkbox').prop('checked', this.checked);
                selectedIds = [];
                $('.schedule-checkbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });

                $('#selectedMail').val(selectedIds.join(','));
                $('#selectedClasses').val(selectedIds.join(','));
            });

            $(document).on('change', '.schedule-checkbox', function() {
                const id = $(this).data('id');
                if (this.checked) {
                    if (!selectedIds.includes(id)) {
                        selectedIds.push(id);
                    }
                } else {
                    selectedIds = selectedIds.filter(selectedId => selectedId !== id);
                }

                $('#selectedMail').val(selectedIds.join(','));
                $('#selectedClasses').val(selectedIds.join(','));
            });
            $(document).on('click', '#assignTeacher', function() {
                if (selectedIds.length > 0) {
                    $('#assignTeacherModal').modal('show');
                } else {
                    alert('Select a Class to assign teacher');
                }
            });
            $(document).on('click', '#openMail', function() {
                if (selectedIds.length > 0) {
                    $('#assignMail').modal('show');
                } else {
                    $.toast({
                        heading: 'Validation Error',
                        text: 'Select a Class.',
                        icon: 'danger',
                        position: 'top-right',
                        loader: false,
                        bgColor: '#ea5455',
                        hideAfter: 3000
                    });
                }
            });
            $(document).on('click', '#search_btn', function() {
                const student_id = $('#select2Icons').find(':selected').val();
                const subject_id = $('#subject_id').find(':selected').val();
                if (!student_id) {
                    $.toast({
                        heading: 'Validation Error',
                        text: 'Please select a Student.',
                        icon: 'danger',
                        position: 'top-right',
                        loader: false,
                        bgColor: '#ea5455',
                        hideAfter: 3000
                    });
                    return;
                }
                if (!subject_id) {
                    $.toast({
                        heading: 'Validation Error',
                        text: 'Please select a Subject.',
                        icon: 'danger',
                        position: 'top-right',
                        loader: false,
                        bgColor: '#ea5455',
                        hideAfter: 3000
                    });
                    return;
                }
                $.ajax({
                    url: "{{ url('student/base') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        student_id: student_id,
                        subject_id: subject_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#student-base').html(response.html);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
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
                        return {
                            search: params.term
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
        });
    </script>
@endsection
