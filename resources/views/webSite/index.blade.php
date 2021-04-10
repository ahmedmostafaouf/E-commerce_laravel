@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}}
@stop
@section('content')
    @include('webSite.layouts.alerts.errors')
    @include('webSite.layouts.alerts.success')
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="{{asset('assets/webSite/images/banner-01.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> {{config('app.name')}}</strong></h1>
                            <p class="m-b-40">{{$settings->desc}} <br> {{$settings->desc}}</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{asset('assets/webSite/images/banner-02.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> {{config('app.name')}}</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends
                                to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="{{asset('assets/webSite/images/banner-03.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> {{config('app.name')}}</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends
                                to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                @foreach($categories->take(8) as $cat)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="shop-cat-box">
                            @if($cat->getMedia("photos")->first())
                                <img class="img-fluid" alt="Image" style="width: 341px; height:200px "
                                     src="{{$cat->getMedia("photos")->first()->getFullUrl()}}">
                            @else
                                not set yet !
                            @endif
                            <a class="btn hvr-hover" href="{{route('get.cat')}}">{{$cat ->name}}</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Slider Discount -->
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Slider Discount</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($newProducts ->where('slider_discount',1)->take(8) as $product)
                        <div class="item" style="padding: 10px;">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <div class="type-lb">
                                        @if($product->discount==0)
                                            <p class="sale">New</p>
                                        @else
                                            <p class="sale">
                                                @php
                                                    $amount=$product->sale_price - $product->discount;
                                                    $discount=$amount/$product->sale_price*100;
                                                @endphp
                                                {{ intval($discount) }} %
                                            </p>
                                        @endif


                                    </div>
                                    @if($product->getMedia("photos")->first())
                                        <img class="img-fluid" style="width: 300px; height:200px; padding: 10px; "
                                             alt="Image"
                                             src="{{$product->getMedia("photos")->first()->getFullUrl()}}">
                                    @else
                                        not set yet !
                                    @endif
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="{{route('details.page',$product->id)}}" data-toggle="tooltip"
                                                   data-placement="right" title="View"><i class="fas fa-eye"></i></a>
                                            </li>
                                            @auth
                                                <li><a href="{{ route('toggle-favourite',$product->id) }}"
                                                       data-toggle="tooltip" data-placement="right"
                                                       title="Favoriets"> @if(DB::table('product_user')->where('product_id',$product->id)->where('user_id',auth()->user()->id)->first())
                                                            <i class="fas fa-heart"></i>@else <i
                                                                class="far fa-heart"></i> @endif</a></li> @endauth

                                        </ul>
                                        <a class="cart" href="{{route('details.page',$product->id)}}">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text text-center">
                                    <h4> {{$product->name}}</h4>
                                    @if( $product->discount ==0)
                                        <h5 style="color: darkred"> $ {{$product->sale_price}}</h5>
                                    @else
                                        <del>$ {{$product->sale_price}}</del>
                                        <span style="color: darkred">   ${{$product->discount}} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Cart -->
    </div>











    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Featured</button>
                            <button data-filter=".top-featured">Trend Products</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach($newProducts ->where('status',1)->take(6) as $product)
                    <div class="col-lg-3 col-md-6 special-grid">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    @if($product->discount==0)
                                        <p class="sale">New</p>
                                    @else
                                        <p class="sale">
                                            @php
                                                $amount=$product->sale_price - $product->discount;
                                                $discount=$amount/$product->sale_price*100;
                                            @endphp
                                            {{ intval($discount) }} %
                                        </p>
                                    @endif
                                </div>
                                @if($product->getMedia("photos")->first())
                                    <img class="img-fluid" style="width: 300px; height:200px " alt="Image"
                                         src="{{$product->getMedia("photos")->first()->getFullUrl()}}">
                                @else
                                    not set yet !
                                @endif
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{route('details.page',$product->id)}}" data-toggle="tooltip"
                                               data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        @auth
                                            <li><a href="{{ route('toggle-favourite',$product->id) }}"
                                                   data-toggle="tooltip" data-placement="right"
                                                   title="Favoriets"> @if(DB::table('product_user')->where('product_id',$product->id)->where('user_id',auth()->user()->id)->first())
                                                        <i class="fas fa-heart"></i>@else <i
                                                            class="far fa-heart"></i> @endif</a></li> @endauth

                                    </ul>
                                    <a class="cart" href="{{route('details.page',$product->id)}}">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text text-center">
                                <h4> {{$product->name}}</h4>
                                @if( $product->discount ==0)
                                    <h5 style="color: darkred"> $ {{$product->sale_price}}</h5>
                                @else
                                    <del>$ {{$product->sale_price}}</del>
                                    <span style="color: darkred">   ${{$product->discount}} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Trend Product --}}
                @foreach($newProducts ->where('trend_product',1)->take(8) as $product)
                    <div class="col-lg-3 col-md-6 special-grid top-featured  ">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    @if($product->discount==0)
                                        <p class="sale">New</p>
                                    @else
                                        <p class="sale">
                                            @php
                                                $amount=$product->sale_price - $product->discount;
                                                $discount=$amount/$product->sale_price*100;
                                            @endphp
                                            {{ intval($discount) }} %
                                        </p>
                                    @endif
                                </div>
                                @if($product->getMedia("photos")->first())
                                    <img class="img-fluid" style="width: 300px; height:200px " alt="Image"
                                         src="{{$product->getMedia("photos")->first()->getFullUrl()}}">
                                @else
                                    not set yet !
                                @endif
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{route('details.page',$product->id)}}" data-toggle="tooltip"
                                               data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        @auth
                                            <li><a href="{{ route('toggle-favourite',$product->id) }}"
                                                   data-toggle="tooltip" data-placement="right"
                                                   title="Favoriets"> @if(DB::table('product_user')->where('product_id',$product->id)->where('user_id',auth()->user()->id)->first())
                                                        <i class="fas fa-heart"></i>@else <i
                                                            class="far fa-heart"></i> @endif</a></li> @endauth

                                    </ul>
                                    <a class="cart" href="{{route('details.page',$product->id)}}">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text text-center">
                                <h4> {{$product->name}}</h4>
                                @if( $product->discount ==0)
                                    <h5 style="color: darkred"> $ {{$product->sale_price}}</h5>
                                @else
                                    <del>$ {{$product->sale_price}}</del>
                                    <span style="color: darkred">   ${{$product->discount}} </span>


                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Best Saler --}}
                @foreach($newProducts ->where('best_rated',1)->take(8) as $product)
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    @if($product->discount==0)
                                        <p class="sale">New</p>
                                    @else
                                        <p class="sale">
                                            @php
                                                $amount=$product->sale_price - $product->discount;
                                                $discount=$amount/$product->sale_price*100;
                                            @endphp
                                            {{ intval($discount) }} %
                                        </p>
                                    @endif
                                </div>
                                @if($product->getMedia("photos")->first())
                                    <img class="img-fluid" style="width: 300px; height:200px " alt="Image"
                                         src="{{$product->getMedia("photos")->first()->getFullUrl()}}">
                                @else
                                    not set yet !
                                @endif
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{route('details.page',$product->id)}}" data-toggle="tooltip"
                                               data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        @auth
                                            <li><a href="{{ route('toggle-favourite',$product->id) }}"
                                                   data-toggle="tooltip" data-placement="right"
                                                   title="Favoriets"> @if(DB::table('product_user')->where('product_id',$product->id)->where('user_id',auth()->user()->id)->first())
                                                        <i class="fas fa-heart"></i>@else <i
                                                            class="far fa-heart"></i> @endif</a></li> @endauth
                                    </ul>
                                    <a class="cart" href="{{route('details.page',$product->id)}}">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text text-center">
                                <h4> {{$product->name}}</h4>
                                @if( $product->discount ==0)
                                    <h5 style="color: darkred"> $ {{$product->sale_price}}</h5>
                                @else
                                    <del>$ {{$product->sale_price}}</del>
                                    <span style="color: darkred">   ${{$product->discount}} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="update-box">
                    <div class="col-12 d-flex shopping-box"><a href="{{route('get.cat')}}"
                                                               class="ml-auto btn hvr-hover">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->










@endsection
