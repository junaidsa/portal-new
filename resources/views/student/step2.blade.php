@php
    $level = DB::table('levels')
        ->join('branches', 'levels.branch_id', '=', 'branches.id')
        ->where('branches.id', $branchid)
        ->where('levels.class_type_id', $tuitionId)
        ->select('levels.*', 'branches.branch as branch_name', 'registration_fee', 'meterical_fee')
        ->get();
    $branch = DB::table('branches')->where('id', $branchid)->first();
    if (Auth::check() && (Auth::user()->role == 'staff' || Auth::user()->role == 'admin')) {
    $branches = DB::table('branches')->where('id', Auth::user()->branch_id)->get();
} else {
    $branches = DB::table('branches')->where('id','!=', 1)->get();
}
@endphp
@if ($tuitionId == 1)
    <form action="" method="POST">
        <div class="row g-3">
            <div class="col-md-7">
                <label class="form-label" for="Please Select Your Level | Registration & Material Fees">Please
                    Select Level <span class="text-danger">*</span></label>
                <select id="level_id" name="level_id" class="form-select" data-allow-clear="true">
                    <option value="">Select Level</option>
                    @foreach ($level as $l)
                        <option value="{{ $l->id }}" data-price="{{ $l->price }}"
                            data-rfee="{{ $l->registration_fee }}" data-mfee="{{ $l->meterical_fee }}"
                            data-name="{{ $l->name }}">{{ $l->name }} {{ $l->year }} - Per Hour - RM
                            {{ $l->price }}</option>
                    @endforeach
                </select>
                <span class="text-light">Registration Fee RM <span
                        id="registration_fee">{{ $branch->registration_fee }}</span>| Material Fee: RM
                    <span id="meterical_fee">{{ $branch->meterical_fee }}</span></span>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="">Class Quantity<span class="text-danger">*</span></label>
                <select id="qty" name="qty" class="form-control">
                    <option value="">Select</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="">minute<span class="text-danger">*</span></label>
                {{-- <input type="number" id="minute" name="minute" class="form-control">
             --}}
                <select id="minute" name="minute" class="form-control">
                    <option value="">Select</option>
                    <option value="60">60 Minutes</option>
                    <option value="90">90 Minutes</option>
                    <option value="120">120 Minutes</option>
                    <option value="150">150 Minutes</option>
                    <option value="180">180 Minutes</option>
                </select>
            </div>
            <div id="level-base" class="row">
            </div>
            <div id="schedule-row" class="row">
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
                    </tbody>
                </table>
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
                <button class="btn btn-label-secondary btn-prev" disabled>
                    <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next" id="store" type="button">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="ti ti-arrow-right ti-xs"></i>
                </button>
            </div>
        </div>
    </form>
@elseif ($tuitionId == 2)
    <form action="" method="POST">
        <div class="row g-3">
            <div class="col-md-7">
                <label class="form-label" for="Please Select Your Level | Registration & Material Fees">Please
                    Select Level <span class="text-danger">*</span></label>
                <select id="level_id" name="level_id" class="form-select" data-allow-clear="true">
                    <option value="">Select Level</option>
                    @foreach ($level as $l)
                        <option value="{{ $l->id }}" data-price="{{ $l->price }}"
                            data-rfee="{{ $l->registration_fee }}" data-mfee="{{ $l->meterical_fee }}"
                            data-name="{{ $l->name }}">{{ $l->name }} {{ $l->year }} - Per Hour - RM
                            {{ $l->price }}</option>
                    @endforeach
                </select>
                <span class="text-light">Registration Fee RM <span
                        id="registration_fee">{{ $branch->registration_fee }}</span>| Material Fee: RM
                    <span id="meterical_fee">{{ $branch->meterical_fee }}</span></span>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="">Class Quantity<span class="text-danger">*</span></label>
                <select id="qty" name="qty" class="form-control">
                    <option value="">Select</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="">minute<span class="text-danger">*</span></label>
                <select id="minute" name="minute" class="form-control">
                    <option value="">Select</option>
                    <option value="60">60 Minutes</option>
                    <option value="90">90 Minutes</option>
                    <option value="120">120 Minutes</option>
                    <option value="150">150 Minutes</option>
                    <option value="180">180 Minutes</option>
                </select>
            </div>
            <div id="level-base" class="row">
            </div>
            <div id="schedule-row" class="row">
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
                    </tbody>
                </table>
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
                <button class="btn btn-label-secondary btn-prev" disabled>
                    <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next" id="store" type="button">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="ti ti-arrow-right ti-xs"></i>
                </button>
            </div>
        </div>
    </form>
@elseif ($tuitionId == 3)
    <form action="" method="POST">
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label" for="Please Select Your Level | Registration & Material Fees">Please
                    Select Level <span class="text-danger">*</span></label>
                <select id="level_id" name="level_id" class="form-select" data-allow-clear="true">
                    <option value="">Select Level</option>
                    @foreach ($level as $l)
                        <option value="{{ $l->id }}" data-price="{{ $l->price }}"
                            data-rfee="{{ $l->registration_fee }}" data-mfee="{{ $l->meterical_fee }}"
                            data-name="{{ $l->name }}">{{ $l->name }} {{ $l->year }} - Per Hour -
                            RM {{ $l->price }}</option>
                    @endforeach
                </select>
                <span class="text-light">Registration Fee RM <span
                        id="registration_fee">{{ $branch->registration_fee }}</span>| Material Fee: RM
                    <span id="meterical_fee">{{ $branch->meterical_fee }}</span></span>
            </div>
            <div id="level-base" class="row">
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
                    </tbody>
                </table>
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
                <button class="btn btn-label-secondary btn-prev" disabled>
                    <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next" id="store" type="button">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="ti ti-arrow-right ti-xs"></i>
                </button>
            </div>
        </div>
    </form>
@elseif ($tuitionId == 4)
    <form action="" method="POST">
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label">Select Branch<span class="text-danger">*</span></label>
                <select id="branch_id" name="branch_id" class="form-select" data-allow-clear="true">
                    <option value="">Select Branch</option>
                    @foreach ($branches as $b)
                        <option value="{{ $b->id }}" data-rfee="{{ $b->registration_fee }}"
                            data-mfee="{{ $b->meterical_fee }}" @if (isset($branchid) && $branchid == $b->id) selected @endif>
                            {{ $b->branch }}
                        </option>
                    @endforeach
                </select>
                <span class="text-light">Registration Fee RM <span
                        id="registration_fee">{{ $branch->registration_fee }}</span>| Material Fee: RM
                    <span id="meterical_fee">{{ $branch->meterical_fee }}</span></span>
            </div>
            <div class="col-md-7">
                <label class="form-label" for="Please Select Your Level | Registration & Material Fees">Please
                    Select Level <span class="text-danger">*</span></label>
                <select id="level_id" name="level_id" class="form-select" data-allow-clear="true">
                    <option value="">Select Level</option>
                    @foreach ($level as $l)
                        <option value="{{ $l->id }}" data-price="{{ $l->price }}"
                            data-rfee="{{ $l->registration_fee }}" data-mfee="{{ $l->meterical_fee }}"
                            data-name="{{ $l->name }}">{{ $l->name }} {{ $l->year }} - Per Hour - RM
                            {{ $l->price }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="">Class Quantity<span class="text-danger">*</span></label>
                <select id="qty" name="qty" class="form-control">
                    <option value="">Select</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="">minute<span class="text-danger">*</span></label>
                <select id="minute" name="minute" class="form-control">
                    <option value="">Select</option>
                    <option value="60">60 Minutes</option>
                    <option value="90">90 Minutes</option>
                    <option value="120">120 Minutes</option>
                    <option value="150">150 Minutes</option>
                    <option value="180">180 Minutes</option>
                </select>
            </div>
            <div id="level-base" class="row">
            </div>
            <div id="schedule-row" class="row">
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
                    </tbody>
                </table>
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
                <button class="btn btn-label-secondary btn-prev" disabled>
                    <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next" id="store" type="button">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="ti ti-arrow-right ti-xs"></i>
                </button>
            </div>
        </div>
    </form>
@endif
