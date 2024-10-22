@extends('layouts.laibrary')

@section('main')
<style>
    :root {
        --font1: 'Heebo', sans-serif;
        --font2: 'Fira Sans Extra Condensed', sans-serif;
        --font3: 'Roboto', sans-serif;

        --btnbg: #ffcc00;
        --btnfontcolor: rgb(61, 61, 61);
        --btnfontcolorhover: rgb(255, 255, 255);
        --btnbghover: #ffc116;
        --btnactivefs: rgb(241, 195, 46);


        --label-index: #960796;
        --danger-index: #5bc257;
        /* PAGINATE */
        --link-color: #000;
        --link-color-hover: #fff;
        --bg-content-color: #ffcc00;

    }
    .card {
    --bs-card-spacer-y: 0.5rem;
    }

    .container-fluid {
        max-width: 1400px;

    }

    .card {
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        border: 0;
        border-radius: 1rem;
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(1rem - 1px);
        border-top-right-radius: calc(1rem - 1px);
    }


    .card h5 {
        overflow: hidden;
        /* height: 55px; */
        font-weight: 300;
        font-size: 0.8rem;
    }

    .card h5 a {
        color: black;
        text-decoration: none;
    }

    .card-img-top {
        /* width: 100%; */
        /* min-height: 250px; */
        max-height: 250px;
        /* object-fit: contain; */
        padding: 15px;
    }

    .card h2 {
        font-size: 1rem;
    }


    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    /* Centered text */
    .label-top {
        position: absolute;
        background-color: var(--label-index);
        color: #fff;
        top: 8px;
        right: 8px;
        padding: 5px 10px 5px 10px;
        font-size: .7rem;
        font-weight: 600;
        border-radius: 3px;
        text-transform: uppercase;
    }

    .top-right {
        position: absolute;
        top: 24px;
        left: 24px;

        width: 90px;
        height: 90px;
        border-radius: 50%;
        font-size: 1rem;
        font-weight: 900;
        background: #8bc34a;
        line-height: 90px;
        text-align: center;
        color: white;
    }

    .top-right span {
        display: inline-block;
        vertical-align: middle;
        /* line-height: normal; */
        /* padding: 0 25px; */
    }

    .aff-link {
        /* text-decoration: overline; */
        font-weight: 500;
    }

    .over-bg {
        background: rgba(53, 53, 53, 0.85);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(0.0px);
        -webkit-backdrop-filter: blur(0.0px);
        border-radius: 10px;
    }

    .bold-btn {

        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        padding: 5px 50px 5px 50px;
    }

    .box .btn {
        font-size: 1.5rem;
    }

    @media (max-width: 1025px) {
        .btn {
            padding: 5px 40px 5px 40px;
        }
    }

    @media (max-width: 250px) {
        .btn {
            padding: 5px 30px 5px 30px;
        }
    }

    /* START BUTTON */
    .btn-warning {
        background: var(--btnbg);
        color: var(--btnfontcolor);
        fill: #ffffff;
        border: none;
        text-decoration: none;
        outline: 0;
        /* box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25); */
        border-radius: 100px;
    }

    .btn-warning:hover {
        background: var(--btnbghover);
        color: var(--btnfontcolorhover);
        /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
    }

    .btn-check:focus+.btn-warning,
    .btn-warning:focus {
        background: var(--btnbghover);
        color: var(--btnfontcolorhover);
        /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
    }

    .btn-warning:active:focus {
        box-shadow: 0 0 0 0.25rem var(--btnactivefs);
    }

    .btn-warning:active {
        background: var(--btnbghover);
        color: var(--btnfontcolorhover);
    }
</style>

<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        @foreach ($products as $p)
        <div class="col hp col-md-3">
            <div class="card h-100 shadow-sm">
                <a target="_blank" href="">
                    <img src="{{ asset('public') }}/files/{{ @$p->image }}" class="card-img-top"
                        alt="product.title" />
                </a>
                <h5 class="card-title text-center fw-bold">{{ $p->name }}</h5>

            @if ($p->tags)
                <div class="label-top shadow-sm">
                    <span class="">{{ $p->tags }}</span>
                </div>
                @endif
                <div class="card-body">
                    <div class="clearfix mb-3">
                        <span class="float-start badge  bg-primary">${{ $p->price }}</span>

                        <div class="d-flex mt-3 justify-content-between">
                            <div class="text-primary float-end"></div>
                            @if (@$p->type == 'Free')
                                <div class="align-middle btn btn-xs btn-label-success float-end">
                                    <a href="{{ asset('public/files/' . @$p->pdf_file) }}" class="text-success"
                                        download>
                                        {{ $p->type }} <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            @else
                                <div class="align-middle btn btn-xs btn-label-warning float-end">
                                    <a href="javascript:void(0)" class="text-warning">
                                        {{ $p->type }}
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                    <h5 class="card-title">
                        <a target="_blank" href="#">{{ Str::limit($p->short_description, 50) }}</a>
                    </h5>


                    <div class="d-grid gap-2 my-4">
                        @if ($p->type !== 'Free')
                            <button type="button" class="btn btn-outline-primary">
                                <a href="{{ url('place/order') . '/' . $p->id }}" class="text-decoration-none text-primary"><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-primary">
                                <a href="{{ url('place/order') . '/' . $p->id }}" class="text-decoration-none text-primary"><i class="fas fa-download"></i> Download</a>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

                {{-- <div class="col-md-3">
                    <!-- Sidebar -->
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-tab" data-toggle="tab"
                            href="{{ url('/library') }}" role="tab" aria-controls="list-home" aria-selected="true">
                            Categories
                        </a>
                        @foreach ($category as $c)
                            <a class="list-group-item list-group-item-action" id="list-help-tab" data-toggle="tab"
                                href="{{ route('library.index', ['category_id' => $c->id]) }}" role="tab"
                                aria-controls="list-help" aria-selected="false">
                                {{ $c->name }}
                            </a>
                        @endforeach
                    </div>
                    <!-- End sidebar -->
                    @if (Session::has('success'))
                        <div class="alert alert-success mt-3">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                </div> --}}


@endsection
