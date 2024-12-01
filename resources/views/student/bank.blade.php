@php
$bank = DB::table('banks')->where('id', 1)->first();
$schedule = DB::table('schedules')
->join('levels', 'schedules.level_id', '=', 'levels.id')  // Join with the levels table
->join('subjects', 'schedules.subject_id', '=', 'subjects.id')  // Join with the subjects table
->join('class_types', 'schedules.class_type_id', '=', 'class_types.id')  // Join with the class_types table
->where('schedules.id', $schedule_id)  // Filter by schedule_id
->select(
'schedules.*', 
'levels.name as level_name', 
'subjects.subject as subject_name',
'class_types.name as class_type_name'  // Assuming 'name' column in class_types table
)
->first();
@endphp
@if($bank_type == 1)

{{-- <form id="payment-form" method="POST" class="p-4 border rounded shadow-sm" style="background-color: #f9f9f9;">
    @csrf
    <h3 class="mb-4">Payment Information</h3>

    <div class="col-xl mb-md-0 mb-4">
        <div class="card border-primary border shadow-none">
          <div class="card-body position-relative">
            <div class="position-absolute end-0 me-4 top-0 mt-4">
              <span class="badge bg-label-primary">{{ $schedule->class_type_name }}</span>
            </div>
     
            <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{ $schedule->level_name }}</h3>
            <p class="text-center">Create your {{ $schedule->subject_name }} Classes schedule </p>
            <ul class="ps-3 my-2 pt-2">
              <li class="mb-2">Classes Quantity {{ $schedule->qty }} </li>
              <li class="mb-2">Classes Duration {{ $schedule->minute }}</li>
            </ul>
            <a href="javascript:void(0);" class="btn btn-primary d-grid w-100 mt-3 waves-effect waves-light">Total Amount : {{ $schedule->total_amount }}</a>
          </div>
        </div>
      </div>

    <div class="mb-3">
        <label class="form-label">Card Holder Name <span class="text-danger">*</span></label>
        <input type="text" id="card-holder-name" name="card_holder_name" class="form-control" placeholder="Enter Card Holder Name" required />
    </div>
    <div class="mb-3">
        <label class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required />
    </div>
    <div class="mb-3">
        <label class="form-label">Card Details <span class="text-danger">*</span></label>
        <div id="card-element" class="form-control" style="min-height: 50px; border-radius: 4px;"></div>
    </div>
    <div class="mb-3">
        <label class="form-label">Postal Code <span class="text-danger">*</span></label>
        <input type="text" id="postal-code" name="postal_code" class="form-control" placeholder="Enter Postal Code" required />
    </div>
    <button id="payment-button" type="submit" class="btn btn-primary w-100">Submit Payment</button>
</form> --}}
@else
<form action="{{ url('payment/prove') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card p-4 mt-3">
<div class="row">
    <div class="col-md-6">
        <h5>Bank Transfer Details</h5>
        <p>Please transfer the amount to the following bank account:</p>
        <ul class="list-unstyled">
            <li><strong>Bank Name:</strong> {{ $bank->bank_name }}</li>
            <li><strong>Account Holder:</strong> {{ $bank->account_holdername }} </li>
            <li><strong>Account Number:</strong> {{ $bank->account_number }}</li>
        </ul>
    </div>
    <div class="col-md-6">
        <div class="col-xl mb-md-0 mb-4">
            <div class="card border-primary border shadow-none">
              <div class="card-body position-relative">
                <div class="position-absolute end-0 me-4 top-0 mt-4">
                  <span class="badge bg-label-primary">{{ $schedule->class_type_name }}</span>
                </div>
         
                <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{ $schedule->level_name }}</h3>
                <p class="text-center">Create your {{ $schedule->subject_name }} Classes schedule </p>
                <ul class="ps-3 my-2 pt-2">
                  <li class="mb-2">Classes Quantity {{ $schedule->qty }} </li>
                  <li class="mb-2">Classes Duration {{ $schedule->minute }}</li>
                </ul>
                <a href="javascript:void(0);" class="btn btn-primary d-grid w-100 mt-3 waves-effect waves-light">Total Amount : {{ $schedule->total_amount }} MYR</a>
              </div>
            </div>
          </div>
    </div>
    
    </div>        
        <!-- QR Code Image -->
        <p class="mt-2 text-center">After completing the transfer, please upload the transaction receipt.</p>
        <div class="qr-code mt-3 d-flex justify-content-center">
        <img src="{{ asset('public/files/' . $bank->image) }}" alt="Bank QR Code" class="" width="200" height="200">
        </div>
        <p class="text-center mt-4">Scan this QR code to make the payment</p>

        <div class="mt-4">
            <input type="hidden" name="schedule_id" id="schedule_id" value="{{ $schedule_id }}">
            <label for="transaction-receipt" class="form-label">Upload Transaction Receipt:</label>
            <input type="file" class="form-control" id="prove" name="prove" required>
            <button type="submit" class="btn btn-primary mt-2">Submit Receipt</button>
        </div>
    </div>
</form>

@endif
