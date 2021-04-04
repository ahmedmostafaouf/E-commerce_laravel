<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                        <option>$ USD</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Call EG : <a href="#"> +201 066 27 30 85</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        @if(empty(Auth::check()))
                        <li><a href="{{route('get.front.login')}}">Login</a></li>
                        @else
                            <li><a href="" data-toggle="modal" data-target="#exampleModal"> My Order Tracking</a></li>
                            <li><a href="{{route('get.account')}}"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="{{route('user-logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('order.tricking')}}" method="POST">
                    @csrf
                    <label> <h4>Status Code </h4></label>
                    <input name="status_code" class="form-control" type="text" placeholder="Your Status Code Here" >
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('get.home')}}"><img style="width: 200px" src="{{asset('assets/webSite/images/logo3.png')}}"class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="{{route('get.home')}}">Home</a></li>
                    @auth
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('cart.show')}}">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="{{route('get.account')}}">My Account</a></li>
                            <li><a href="{{route('get.cat')}}">Shop Detail</a></li>
                        </ul>
                    </li>
                    @endauth
                    <li class="nav-item"><a class="nav-link" href="{{route('get.services')}}">Our Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('get.contact')}}">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    @auth

                    <li class="side-" ><a href="{{ route('wishlist.show') }}">
                            <i class="fa fa-heart"></i>
                            <span class="badge">{{ DB::table('product_user')->count() }}</span>
                        </a></li>
                        <li class="side-menu"><a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">@inject('carts','App\Models\Cart') {{$carts->where('user_id',auth()->user()->id)->count()}}</span>
                        </a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->

        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">

                    @inject('carts','App\Models\Cart')
                    @foreach($carts->where('user_id',auth()->user()->id)->get()  as $cart)

                        <li>
                        <a href="#" class="photo"><img src="{{$cart->product->image}}" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">{{$cart->product->name}} </a></h6>
                        <p>{{$cart->quantity}} Qe  -- <span class="price">${{$cart->product->sale_price}}</span></p>
                    </li>

                    @endforeach
                </ul>
            </li>
            <br>
            <a class="btn hvr-hover" href="{{route('cart.show')}}"> Vest Cart</a>
        </div>
        <!-- End Side Menu -->
            @endauth
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->
