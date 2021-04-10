@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}} - Products Details
@stop
@section('content')

<!-- End All Title Box -->
@include('webSite.layouts.breadcrumb',['var'=>'Shop Details','link'=>"<a href='/'> Shop</a>"])
<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($productsAllImage as $key => $img)
                         <div class="carousel-item {{$key==0?'active':''}} ">
                             @if($img->getMedia("photos")->first())
                                 <img class="d-block w-100"
                                      src="{{$img->getMedia("photos")->first()->getFullUrl()}}"
                                      ></td>
                             @else
                                 not set yet !
                             @endif
                         </div>
                        @endforeach
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
                        @foreach($productsAllImage as $key => $img)
                        <li data-target="#carousel-example-1" data-slide-to="{{$key}}" class="{{$key==0?'active':''}}">
                            @if($img->getMedia("photos")->first())
                                <img class="d-block w-100 img-fluid"
                                     src="{{$img->getMedia("photos")->first()->getFullUrl()}}"
                                     ></td>
                            @else
                                not set yet !
                            @endif
                        </li>
                        @endforeach

                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
            <form method="POST" action="{{route('Add.carts',$products->id)}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$products->id}}" name="product_id">
                <input type="hidden" @if(empty( auth()->user())) value="" @else value="{{auth()->user()->id}}" @endif  name="user_id">
                <input type="hidden" value="" name="session_id">
                <input type="hidden" value="{{$products->name}}" name="product_name">
                <input type="hidden" value="{{$products->stock}}" name="stock">
                <input type="hidden" value="{{$products->sale_price}}" name="sale_price">
                <div class="single-product-details">
                    <h2>Product Name is : {{$products->name}}</h2>
                    <h5> Product Price Is : $ {{$products->sale_price}} </h5>
                    <p class="available-stock"><span> More than {{$products->stock}} available</span>
                    <p>
                    <h4>Short Description:</h4>
                    <p>  {{$products ->description}}</p>

                            <div class="form-group quantity-box ">
                                <label class="control-label text-center">Quantity</label>
                                <input class="form-control text-lg-center" value="1" min="1" max="50" name="quantity" type="number">
                            </div>

                    <div class="price-box-bar">
                        <div class="cart-and-bay-btn">
                            <a class="btn hvr-hover" data-fancybox-close="" href="{{route('get.cat')}}">Buy New</a>
                            <a class="btn hvr-hover" data-fancybox-close="" href="{{route('toggle-favourite',$products->id)}}">Add To wishlist</a>

                            <button class="btn hvr-hover" data-fancybox-close="" type="submit" style="color:white;">Add to cart</button>                        </div>
                    </div>

                    <div class="add-to-btn">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>

                    </div>
                </div>
            </form>
            </div>
        </div>
        <br>
        <br>
        <!-- Recently Viewed -->

        <div class="viewed">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Product Details</h3>
                        </div>


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br> <h4> {!! $products->description !!}</h4> </div>

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>

                                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>





        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                    @inject('productss',"App\Models\Products")
                    <div class="row special-list">
                        @foreach($productss->where('id','!=',$products->id)->where('stock',">",0)->take(4)->get() as $product)
                            <div class="col-lg-3 col-md-6 special-grid top-featured" >
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <div class="type-lb">
                                            <p class="sale">Sale</p>
                                        </div>
                                        @if($product->getMedia("photos")->first())
                                            <img class=" img-fluid" style="width: 300px; height:200px"
                                                 src="{{$product->getMedia("photos")->first()->getFullUrl()}}"
                                            ></td>
                                        @else
                                            not set yet !
                                        @endif
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="{{route('details.page',$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                <li><a href="{{route('toggle-favourite',$product->id)}}" data-toggle="tooltip" data-placement="right" title="Favoriets">@if(DB::table('product_user')->where('product_id',$product->id)->first())<i class="fas fa-heart"></i>@else <i class="far fa-heart"></i> @endif</a></li>

                                            </ul>
                                            <a class="cart" href="{{route('details.page',$product->id)}}" >Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4> Product Name : {{$product->name}}</h4>
                                        <h5> Price : $ {{$product->sale_price}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>



            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
@endsection
@section('js')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=608445939755359&autoLogAppEvents=1" nonce="2XbK5PfB"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6072086b9507c34f"></script>

@stop
