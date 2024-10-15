@extends('layouts.laibrary')

@section('main')
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            object-fit: cover;
            /* Ensures the image covers the entire area */
        }

        .tagline {
            margin-top: 10px;
        }

        .tagline {
            position: relative;
            top: -20px;
            z-index: 1000;
        }

        .badge {
            font-size: 1rem;
            /* Adjust size */
            padding: 5px 10px;
            border-radius: 20px;
        }

        .button-cart button {
            transition: background-color 0.3s, color 0.3s;
        }

        .button-cart button:hover {
            background-color: #007bff;
            /* Bootstrap primary color */
            color: white;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">

                <div class="col-md-3">
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

                </div>
                @foreach ($products as $p)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <img class="card-img-top" src="{{ asset('public') }}/files/{{ @$p->image }}" height="250"
                                alt="Card image cap" />
                            @if ($p->tags)
                                <div class="tagline d-flex flex-start">
                                    <span class="align-middle btn btn-xs btn-label-success mr-2">{{ $p->tags }}</span>
                                </div>
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $p->name }}</h5>
                                <p class="card-text">{{ Str::limit($p->short_description, 50) }}</p>
                                <div class="Button-cart mt-3">
                                    @if ($p->type !== 'Free')
                                        <div>
                                            <button type="button" class="btn btn-outline-primary">
                                                <a href="" class="text-decoration-none text-primary"><i
                                                        class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="text-primary float-end">${{ $p->price }}</div>
                                        @if (@$p->type == 'Free')
                                            <div class="align-middle btn btn-xs btn-label-success">
                                                <a href="{{ asset('public/files/' . @$p->pdf_file) }}" class="text-success"
                                                    download>
                                                    {{ $p->type }} <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        @else
                                            <div class="align-middle btn btn-xs btn-label-warning">
                                                <a href="javascript:void(0)" class="text-warning">
                                                    {{ $p->type }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
