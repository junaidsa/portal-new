@if($bank_type == 1)
<form id="payment-form" method="POST" class="p-4 border rounded shadow-sm" style="background-color: #f9f9f9;">
    @csrf
    <h3 class="mb-4">Payment Information</h3>
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
</form>
@else
<form action="{{ url('payment/prove') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card p-4 mt-3">
        <h5>Bank Transfer Details</h5>
        <p>Please transfer the amount to the following bank account:</p>
        
        <ul class="list-unstyled">
            <li><strong>Bank Name:</strong>AmBank</li>
            <li><strong>Account Holder:</strong>  Shahbid Hussain </li>
            <li><strong>Account Number:</strong> 123456789</li>
        </ul>
        
        <!-- QR Code Image -->
        <p>After completing the transfer, please upload the transaction receipt.</p>
        <div class="qr-code mt-3 d-flex justify-content-center">
            <img src="{{ asset('public') }}/assets/svg/QR_code_for_mobile_English_Wikipedia.svg.png" alt="Bank QR Code" class="" width="200" height="200">
        </div>
        <p>Scan this QR code to make the payment</p>

        <div class="mt-4">
            <input type="hidden" name="schedule_id" id="schedule_id" value="{{ $schedule_id }}">
            <label for="transaction-receipt" class="form-label">Upload Transaction Receipt:</label>
            <input type="file" class="form-control" id="prove" name="prove" required>
            <button type="submit" class="btn btn-primary mt-2">Submit Receipt</button>
        </div>
    </div>
</form>

@endif
