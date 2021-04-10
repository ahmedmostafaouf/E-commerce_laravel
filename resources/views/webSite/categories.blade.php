@extends('webSite.layouts.master')
@section('title')
  {{config('app.name')}} - Categories
@stop
@section('content')
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="{{route('get.cat')}}" method="GET">
                                <input autocomplete="off" class="form-control" placeholder="Search here..." type="text" name="search">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3><a href="{{route('get.cat')}}">Categories </a></h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                      @foreach($categories as $cat)
                                    <div class="list-group-collapse sub-men">
                                        <a class="list-group-item list-group-item-action" href="#{{$cat->id}}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{$cat->name}} <small class="text-muted"></small>
                                        </a>
                                        <div class="collapse" id="{{$cat->id}}" data-parent="#list-group-men">
                                            <div class="list-group">
                                                @foreach($cat->subCategories as $subcat)
                                                    <a href="{{route('get.cat.id',$subcat->id)}}" class="list-group-item list-group-item-action">{{$subcat->name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">

                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
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
                                                            <img class="img-fluid" style="width: 300px; height:200px "
                                                                 src="{{$product->getMedia("photos")->first()->getFullUrl()}}">
                                                        @else
                                                            not set yet !
                                                        @endif
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="{{route('details.page',$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="{{route('toggle-favourite',$product->id)}}" data-toggle="tooltip" data-placement="right" title="Favoriets">@if(DB::table('product_user')->where('product_id',$product->id)->first())<i class="fas fa-heart"></i>@else <i class="far fa-heart"></i> @endif</a></li>

                                                            </ul>
                                                            <a class="cart" href="{{route('details.page',$product->id)}}">Detail Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="why-text text-center">
                                                        <h4 > {{$product->name}}</h4>
                                                        @if( $product->discount ==0)
                                                            <h5 style="color: darkred">  $ {{$product->sale_price}}</h5>
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
                                {!! $products->links() !!}



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


@endsection
