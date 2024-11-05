@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="text-center mb-4">
      <h3 class="role-title mb-2">Add New Role</h3>
      <p class="text-muted">Set role permissions</p>
    </div>
    <!-- Add role form -->
    <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
      <div class="col-12 mb-4 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
        <label class="form-label" for="modalRoleName">Role Name</label>
        <input type="text" id="modalRoleName" name="modalRoleName" class="form-control is-invalid" placeholder="Enter a role name" tabindex="-1">
      <div class="fv-plugins-message-container invalid-feedback"><div data-field="modalRoleName" data-validator="notEmpty">Please enter role name</div></div></div>
      <div class="col-12">
        <h5>Schedules</h5>
        <div class="table-responsive">
          <table class="table table-flush-spacing">
              <div class="d-flex justify-content-between">
                <div class="text-nowrap fw-semibold">
                    Schedule List
                  <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Allows a full access to the system" data-bs-original-title="Allows a full access to the system"></i>
                </div>
                <div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label" for="selectAll"> Select All </label>
                  </div>
                </div>
            </div>
            <tbody id="schedules">
            </tbody>
          </table>
        </div>
        <!-- Permission table -->
      </div>
      <div class="col-12 text-center mt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
        <button type="reset" class="btn btn-label-success">
          Cancel
        </button>
      </div>
    <input type="hidden"></form>

  </div>
@endsection
@section('javascript')
<script>

</script>
@endsection