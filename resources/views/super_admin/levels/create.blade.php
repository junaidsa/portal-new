@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Level /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Level</h5>
                    <div class="card-body">
                        <form action="{{ url('level/store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="level_name" class="form-label">Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('level_name') is-invalid @enderror"
                                            id="level_name" name="level_name" placeholder="Enter Level Name" />
                                        @error('level_name')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="years" class="form-label">Years <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('years') is-invalid @enderror"
                                            id="years" name="years" placeholder="Enter Years" />
                                        @error('years')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="prices" class="form-label">Prices <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('prices') is-invalid @enderror"
                                            id="prices" name="prices" placeholder="Enter Prices" />
                                        @error('prices')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Level Status</label>
                                        <select class="form-select" id="status" name="status"
                                            aria-label="Default select example">
                                            <option value="1">Active</option>
                                            <option value="2 ">Deactive</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Class Type</label>
                                        <select class="form-select @error('class_type_id') is-invalid @enderror"
                                            id="class_type_id" name="class_type_id" aria-label="Default select example">
                                            <option value="1">1-1 Online</option>
                                            <option value="2">1-1 Home</option>
                                            <option value="3">Online Group</option>
                                            <option value="4">Physical</option>
                                        </select>
                                        @error('class_type_id')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6" id="branch-field" style="display: none;">
                                    <div class="mb-3">
                                        <label for="branch" class="form-label">Branch <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('branch') is-invalid @enderror" id="branch"
                                            name="branch">
                                            <option value="">Select Branch</option>
                                            @foreach ($branch as $b)
                                                <option value="{{ $b->id }}">{{ $b->branch }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" id="online-group-row" style="display: none;">
                                    <div class="col-md-5">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date"
                                            class="form-control flatpickr @error('date') is-invalid @enderror"
                                            id="date" name="date" placeholder="Select Date">
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="time" class="form-label">Time</label>
                                        <input type="time" class="form-control @error('time') is-invalid @enderror"
                                            id="time" name="time">
                                        @error('time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                            id="quantity" name="quantity" placeholder="Enter Quantity" min="1">
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        // Wait until the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            const classTypeSelect = document.getElementById('class_type_id');
            const onlineGroupRow = document.getElementById('online-group-row');
            classTypeSelect.addEventListener('change', function() {
                if (classTypeSelect.value == '3') {
                    onlineGroupRow.style.display = 'flex';
                } else {
                    onlineGroupRow.style.display = 'none'; // Hide the row for other options
                }
            });
        });
        // Date flatpickr
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr('.flatpickr', {
                dateFormat: "Y-m-d"
            });
        });

        // required If
        document.getElementById('class_type_id').addEventListener('change', function() {
            const onlineGroupFields = document.getElementById('online-group-fields');
            if (this.value == '3') {
                onlineGroupFields.style.display = 'block'; // Show the fields for Online Group
            } else {
                onlineGroupFields.style.display = 'none'; // Hide the fields for other options
            }
        });

        // Branch Hide
        document.getElementById('class_type_id').addEventListener('change', function() {
            const branchField = document.getElementById('branch-field');

            // Show the branch field if "Physical" (class_type_id == 4) is selected
            if (this.value == '4') {
                branchField.style.display = 'block';
            } else {
                branchField.style.display = 'none';
            }
        });

        // Trigger change event on page load to check if class_type_id was pre-selected
        document.getElementById('class_type_id').dispatchEvent(new Event('change'));
    </script>
@endsection
