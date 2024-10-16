@extends('layouts.laibrary')
@section('main')
<div class="container mt-5">
    <h1>Stripe CHeckout</h1>
    <hr>
    @if(Session::has('success'))
        <div class="alert alert-success">
           {{ Session::get('success') }}
           @php
               Session::forget('success')
           @endphp
        </div>
    @endif

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://dummyimage.com/300x200/000/fff" class="card-image-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Silver</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla?</p>
                    <a href="{{ route('stripe.checkout',['price' => 10, 'product' => 'silver']) }}">Make Payment</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://dummyimage.com/300x200/000/fff" class="card-image-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Gold</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla?</p>
                    <a href="{{ route('stripe.checkout',['price' => 100, 'product' => 'gold']) }}">Make Payment</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://dummyimage.com/300x200/000/fff" class="card-image-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Platinum</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla?</p>
                    <a href="{{ route('stripe.checkout',['price' => 1000, 'product' => 'platinum']) }}">Make Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
