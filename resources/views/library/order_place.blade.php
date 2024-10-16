@extends('layouts.laibrary')
@section('main')
    <style>
        #progressbar-1 {
            color: #455A64;
        }

        #progressbar-1 li {
            list-style-type: none;
            font-size: 13px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        #progressbar-1 #step1:before {
            content: "1";
            color: #fff;
            width: 29px;
            margin-left: 22px;
            padding-left: 11px;
        }

        #progressbar-1 #step2:before {
            content: "2";
            color: #fff;
            width: 29px;
        }

        #progressbar-1 #step3:before {
            content: "3";
            color: #fff;
            width: 29px;
            margin-right: 22px;
            text-align: center;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Palce /</span> Order</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Payment Methods</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <form id="creditCardForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework fv-plugins-icon-container" action="{{url('profile/update')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                                        <input type="hidden" name="order_place" value="{{$id}}">
                                        <div class="col-md-12">
                                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                            @error('name')
                                                <p class="invalid-feedback">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Enter Email">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="phone_number">Phone No <span class="text-danger">*</span></label>
                                            <input type="text" id="phone_number" name="phone_number" value="{{Auth::user()->phone_number}}" class="form-control @error('phone_number') is-invalid @enderror"  placeholder="Enter Phone Number">
                                            @error('phone_number')
                                                <p class="invalid-feedback">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="4" placeholder="Enter Address">{{Auth::user()->address}}</textarea>
                                            @error('address')
                                                <p class="invalid-feedback">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-sm btn-primary me-sm-3 me-1 waves-effect waves-light">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5">
                                    <div class="card shadow-sm mt-4">
                                        <div class="row">
                                            <div class="col-md-6 p-3">
                                                <div class="image-container" style="position: relative; display: inline-block;">
                                                    <img src="{{ asset('public') }}/files/{{ @$product->image }}" style="width: 12rem;" class="card-img-top border ms-4" alt="Book Image">
                                                    <div class="tagline d-flex justify-content-end" style="position: absolute; bottom: 3px; right: 3px;">
                                                        <span class="align-middle btn btn-xs btn-label-success">{{ $product->tags }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-body">
                                                    <div class="flex-fill">
                                                        <h5 class="bold">{{$product->name}}</h5>
                                                        <p class="text-muted mb-1"> Qt : <span class="fw-bold text-body">1 item</span></p>
                                                        <p class="text-muted mb-3">Description :  <span class="text-body fw-bold">{{Str::limit($product->short_description, 50)}}</span></p>
                                                        <p class="text-muted mb-3"> Order ID : <span class="fw-bold text-body">1222528743</span></p>
                                                        <h4 class="">{{$product->price}}&nbsp;&nbsp;<span class="align-middle btn btn-xs btn-label-success mr-2">{{$product->type}}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="col-12 text-center">
                                    <a href=""><button type="submit" class="btn btn-md btn-success me-sm-3 me-1 waves-effect waves-light">Place Order</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="{{ asset('public') }}/assets//js/pages-pricing.js"></script>
        {{-- /assets//js/pages-pricing.js --}}
    </div>=
    </div>
@endsection
