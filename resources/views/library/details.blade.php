@extends('layouts.app')

@section('main')
    <section class="section-4 bg-2">
        {{-- <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="jobs.html"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    &nbsp;Back to Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> --}}
        <div class="container job_details_area">
            <h4 class="fw-bold py-3  ms-1"><span class="text-muted fw-light">Product /</span> Details</h4>
            <div class="row pb-5">
                <div class="col-md-8">
                    <div class="card shadow border-0 p-4">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">

                                    <div class="jobs_conetent">
                                        <a href="#">
                                            <h4>{{$product->name}}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p class="badge  bg-primary"> MYR {{ $product->price }}</p>
                                            </div>
                                            <div class="location ms-4">
                                                <p class=" btn btn-sm btn-label-warning text-warning"> <i class="fa fa-clock-o"></i> {{$product->type}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a class="heart_mark" href="#"> <i class="fa fa-heart-o"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="descript_wrap white-bg">
                            <div class="single_wrap">
                                <h4>Description</h4>
                                <p>{{$product->short_description}}</p>
                                <p>{!!$product->description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0 p-4">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex flex-column justify-content-between">
                                <div class="jobs_left d-flex flex-column align-items-center">
                                    <!-- Job title -->
                                    <div class="jobs_content border-bottom w-100">
                                        <a href="#">
                                            <h4>Book Image</h4>
                                        </a>
                                    </div>
                                    <!-- Job image -->
                                    <div class="apply_now mt-3">
                                        <img src="{{ asset('public') }}/files/{{ @$product->image }}" alt="..." class="img-thumbnail" width="100%"><!--width="160" mai ne esko update kar diya han-->
                                    </div>
                                    
                                     <div class="d-grid gap-2 my-4">
                                @if ($product->type !== 'Free')
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="{{ url('place/order') . '/' . $product->id }}"
                                            class="text-decoration-none text-primary"><i
                                                class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="{{ asset('public/files/' . @$product->pdf_file) }}"
                                            class="text-decoration-none text-primary" download><i
                                                class="fas fa-download"></i> Download</a>
                                    </button>
                                @endif
                            </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
