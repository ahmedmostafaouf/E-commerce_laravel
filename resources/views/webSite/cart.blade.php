@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}} - Carts
@stop
@section('content')
@include('webSite.layouts.breadcrumb',['var'=>'Cart','link'=>"<a href='/'> Shop</a>"])

<!-- Start Cart  -->

<div class="cart-box-main">

    <div class="container">
        @include('webSite.layouts.alerts.success')
        @include('webSite.layouts.alerts.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total_mount=0; $quantity=0; ?>

                        @foreach($carts as $or)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        @if($or->product->getMedia("photos")->first())
                                            <img class="img-fluid"
                                                 src="{{$or->product->getMedia("photos")->first()->getFullUrl()}}">
                                @else
                                    not set yet !
                                @endif
                                    </a>
                                </td>
                                <td class="name-pr">
                                    {{$or->product->name}}
                                </td>
                                <td class="price-pr">
                                    <p>  @if($or->product->discount==0) $ {{$or->product->sale_price}} @else <del>$ {{$or->product->sale_price}}</del> $ {{$or->product->discount}}@endif </p>
                                </td>
                                <td class="quantity-box">

                                    <input type="text" disabled size="4" value="{{$or ->quantity}}" min="0" step="1" class="c-input-text qty text">

                                </td>
                                <td class="total-pr">
                                    <p> @if($or->product->discount==0) $ {{$or->quantity * $or->product->sale_price}} @else $ {{$or->quantity * $or->product->discount}} @endif </p>
                                </td>
                                <td class="remove-pr">
                                    <a href="{{route('cart.remove',$or->id)}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td class="remove-pr">
                                <a
                                  href="{{ route('edit.cart',$or->id) }}" title="edit"><i
                                        class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php
                            if($or->product->discount==0){
                                $total_mount = $total_mount + ($or->product->sale_price*$or->quantity);
                            }else{
                                $total_mount = $total_mount + ($or->product->discount*$or->quantity);
                            }

                              $quantity= $quantity + $or->quantity;
                        ?>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>





    <div class="row my-5">
        @if(Session::has('coupon'))
            <div class="col-lg-6 col-sm-6">
            </div>
            @else
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <form method="post" action="{{route('apply.coupon')}}">
                        <div class="input-group input-group-sm">

                            @csrf
                            <input type="hidden" name="total" value="{{$total_mount}}">
                            <input class="form-control" placeholder="Enter your coupon code" name="coupon" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            @endif


        <div class="col-lg-6 col-sm-6">
            <div class="update-box">
                <div class="col-12 d-flex shopping-box"><a href="{{route('get.cat')}}" class="ml-auto btn hvr-hover">Update Card</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-lg-12 col-sm-6">
            <div class="order-box">
                <h3 class="text-center ">Order summary</h3>
                <hr>
                @if(Session::has('coupon'))
                <div class="d-flex gr-total">
                    <h5>Sub Total</h5>
                    <div class="ml-auto h5">
                           <p> $ {{Session::get('coupon')['balance']}} </p>
                    </div>
                </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Coupon : ({{Session::get('coupon')['name']}}) <a href="{{route('delete.coupon')}}" class="btn btn-danger btn-sm" style="color: white">X </a></h5>
                        <div class="ml-auto h5">
                            <p> $ {{Session::get('coupon')['discount']}} </p>
                        </div>
                    </div>
                @else
                    <div class="d-flex gr-total">
                    <h5>Sub Total</h5>
                        <div class="ml-auto h5">
                        <p> $ {{$total_mount}} </p>
                        </div>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Shipping</h5>
                        <div class="ml-auto h5">
                            <p> $ {{$settings->shipping}} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Vat</h5>
                        <div class="ml-auto h5">
                            <p> $ {{$settings->vat}} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Quantity</h5>
                        <div class="ml-auto h5">  {{$quantity}} Qe </div>
                    </div>
                    <hr>

                    <div class="d-flex gr-total">
                        <h5>Total</h5>
                        @php

                            $shipping=$settings->shipping;
                            $vat=$settings->vat;

                        @endphp
                        @if(Session::has('coupon'))
                            @php
                              $discount=Session::get('coupon')['balance'];
                              @endphp

                            <div class="ml-auto h5"> $ {{number_format($discount+$shipping+$vat,2,",",".")}}   </div>

                        @else
                            <div class="ml-auto h5"> $ {{number_format($total_mount + $shipping+$vat,2,",",".")}} <hr>  </div>
                        @endif

                    </div>
            </div>
        </div>

        <hr class="my-1">
            <br>
            <div class="col-12 d-flex shopping-box"><a href="{{ route('get.checkout') }}" class="ml-auto btn hvr-hover">CheckOut</a>
            </div>
        </div>
    </div>

    </div>

<!-- End Cart -->


@endsection
@section('js')


@endsection
