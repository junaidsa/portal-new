@if ($tuitionId == 1)
    <div class="row g-3">
        <div class="col-md-9">
            <label class="form-label" for="Please Select Your Level | Registration & Material Fees">Please
                Select tuition <span class="text-danger">*</span></label>
            @php
                $tuitions = DB::table('tuitions')->where('id', '!=', 3)->get();
            @endphp
            <select id="tuition_id" name="tuition_id" class="form-select" data-allow-clear="true">
                <option value="">Select tuition</option>
                @foreach ($tuitions as $tuition)
                    <option value="{{ $tuition->id }}">{{ $tuition->name }} - Per Hour - RM {{ $tuition->price }}</option>
                @endforeach
            </select>
            <span class="text-light">Registration Fee RM50 | Material Fee: RM100 | = RM150</span>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="">Class Quantity<span class="text-danger">*</span></label>
            @php
                $tuitions = DB::table('tuitions')->where('id', '!=', 3)->get();
            @endphp
            <select id="qty" name="qty" class="form-select">
                <option value="3">3 Classes</option>
                <option value="4">4 Classes</option>
                <option value="5">5 Classes</option>
                <option value="6">6 Classes</option>
                <option value="7">7 Classes</option>
                <option value="8">8 Classes</option>
                <option value="9">9 Classes</option>
                <option value="10">10 Classes</option>
            </select>
        </div>
        <div class="col-md-12 d-none" id="subject-drop">
            <label class="form-label" for="">Select Your Subject <span class="text-danger">*</span></label>
            <select id="subject_id" name="subject_id" class="form-select">
            </select>
        </div>
            <div class="col-md-5">
            <label class="form-label" for="plStateDate">Class Start Date <span class="text-danger">*</span></label>
            <input type="date" id="plStateDate" name="plStateDate"
                class="form-control flatpickr" />
        </div>
            <div class="col-md-5">
            <label class="form-label" for="plStateDate">Class End Date <span class="text-danger">*</span></label>
            <input type="date" id="plStateDate" name="plStateDate"
                class="form-control flatpickr" />
        </div>
        <div class="col-md-2">
            <label class="form-label" for="Time">Select Time <span class="text-danger">*</span></label>
            <input type="time" id="studenttime" name="studenttime" class="form-control" />
        </div>
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th colspan="8">Item</th>
                        <th colspan="2">Quantity</th>
                        <th colspan="2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td colspan="8">
                            <p>There are no products selected.</p>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="8">Total</td>
                        <td colspan="2"></td>
                        <td colspan="2">RM0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev">
                <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                <i class="ti ti-arrow-right ti-xs"></i>
            </button>
        </div>
    </div>
@elseif ($tuitionId == 2)
@endif
