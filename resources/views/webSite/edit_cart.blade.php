@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}} - Edit Order
@stop
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('get.home')}}">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                            <div class="  ">
                                @if($carts->product->getMedia("photos")->first())
                                    <img class="d-block w-100"
                                         src="{{$carts->product->getMedia("photos")->first()->getFullUrl()}}">
                                @else
                                    not set yet !
                                @endif
                            </div>
                    </div>


                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators">

                        <li data-target="#carousel-example-1"  class="">
                            @if($carts->product->getMedia("photos")->first())
                                <img class="d-block w-100 img-fluid"
                                     src="{{$carts->product->getMedia("photos")->first()->getFullUrl()}}"
                                ></td>
                            @else
                                not set yet !
                            @endif
                        </li>


                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
            <form method="POST" action="{{route('update.cart',$carts->id)}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$carts->product->id}}" name="product_id">
                <input type="hidden" value="{{$carts->product->id}}" name="order_id">
                <input type="hidden" value="{{$carts->user_id}}"   name="user_id">
                <input type="hidden" value="{{$carts->session_id}}" name="session_id">
                <input type="hidden" value="{{$carts->product->name}}" name="product_name">
                <input type="hidden" value="{{$carts->product->stock}}" name="stock">
                <input type="hidden" value="{{$carts->product->sale_price}}" name="sale_price">
                <input type="hidden" value="{{$carts->quantity}}" name="quantity">
                <div class="single-product-details">
                    <h2>Product Name is : {{$carts->product->name}}</h2>
                    <h5> Product Price Is : {{$carts->product->sale_price}} $</h5>
                    <p class="available-stock"><span> More than {{$carts->product->stock}} available</span>
                    <p>
                    <h4>Short Description:</h4>
                    <p>  {{$carts->product->description}}</p>

                            <div class="form-group quantity-box ">
                                <label class="control-label text-center">Quantity</label>
                                <input class="form-control text-lg-center" value="{{$carts->quantity}}" min="1" max="50" name="quantity"  type="number">
                            </div>

                    <div class="price-box-bar">
                        <div class="cart-and-bay-btn">
                            <a class="btn hvr-hover" data-fancybox-close="" href="{{route('get.cat')}}">Buy New</a>
                            <button class="btn hvr-hover" data-fancybox-close="" type="submit" style="color:white;">Add to cart</button>                        </div>
                    </div>

                    <div class="add-to-btn">

                        <div class="share-bar">
                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </form>
            </div>
        </div>



    </div>
</div>
<!-- End Cart -->
@endsection
