@extends('layouts.laibrary')
@section('main')
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="col-lg-3 col-md-4 col-12 ">
        <div class="d-flex justify-content-center flex-column ">
          <ul class="nav nav-align-center nav-pills flex-column">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#payment">                        
                <span class="align-middle fw-semibold">Class 1 - 1</span>
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#delivery">
                <span class="align-middle fw-semibold">Class 2 - 2 </span>
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cancellation">
                <span class="align-middle fw-semibold">Class 3-3 </span>
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders">
                <span class="align-middle fw-semibold">Class 4 - 4</span>
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product">
                <span class="align-middle fw-semibold">Class 5 - 5 </span>
              </button>
            </li>
          </ul>
        </div>
      </div> 
  </aside>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">BOOK /</span> LAIBRARY
      </h4> -->
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">

        <div class="col-md-3"></div>        
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-1.jpeg" height="250"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">The Rule </h5>
              <p class="card-text">
                The 10X Rule grant cardone The only difference between success and Failure.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-2.jpeg" height="250"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Be Obsessed</h5>
              <p class="card-text">
                Be obsessed or be average Grant Cardone Bestselling author of the 10x rule.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-3.jpeg" height="250"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Rich Dad</h5>
              <p class="card-text">
                What the Rich teach their kids about money that the poor Admin middle class do not.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-4.jpeg" height="250"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Robert T.Kiyosaki</h5>
              <p class="card-text">
                Rich Das's cashflow quadrant guide to financial freedom. <br>Robert T.Kiyosaki
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-5.jpeg" height="250"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Power</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-6.jpeg" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">5 Second Rule</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-7.jpg" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Next 5 Movie</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book-8.jpeg" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Mastery</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book9.jpg" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Atomic Habits</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book10.png" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Cracking the Coding</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book11.jpeg" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Can't hurt Me</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{asset('public')}}/assets/img/elements/images/book12.jpeg" height="310"
              alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Deep Work</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural lead-in to additional content.
              </p>
              <div class="Button-cart">
                <h5>
                  <button type="button" class="btn btn-xs btn-outline-primary">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                  </button>
                  <span class="text-primary" style="float: right;">$59.95</span>
                </h5>
                <span class="align-middle btn btn-xs btn-label-danger" style="float: right;"><a href=""
                    class="text-danger">Free <i class="fas fa-download"></i></a></span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
