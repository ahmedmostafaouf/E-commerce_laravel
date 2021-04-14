@extends('webSite.layouts.master')
@section('content')

    <div class="contact-box-main">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Billing Address</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{auth()->user()->name}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{auth()->user()->address}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{auth()->user()->city}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{auth()->user()->state}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{auth()->user()->country}}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {{auth()->user()->phone}}
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Shipping Details</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$delivaryAddress->name}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$delivaryAddress->address}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$delivaryAddress->city}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$delivaryAddress->state}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$delivaryAddress->country}}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$delivaryAddress->phone}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- start cart --}}

    <div class="cart-box-main">
        <div class="container">
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

                            </tr>
                            </thead>
                            <tbody>
                            <?php $total_mount=0; $quantity=0; ?>
                            @foreach($carts as $cart)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            @if($cart->product->getMedia("photos")->first())
                                                <img class="img-fluid"
                                                     src="{{$cart->product->getMedia("photos")->first()->getFullUrl()}}">
                                            @else
                                                not set yet !
                                            @endif
                                        </a>
                                    </td>
                                    <td class="name-pr">

                                        {{$cart->product->name}}
                                    </td>
                                    <td class="price-pr">
                                        <p>$ {{$cart->product->sale_price}}</p>
                                    </td>
                                    <td class="quantity-box">
                                        <input type="number" value="{{$cart->quantity}}" disabled>

                                    </td>
                                    <td class="total-pr">
                                        <p>$ {{$cart->quantity * $cart->product->sale_price}} </p>
                                    </td>

                                </tr>
                                <?php

                                $total_mount = $total_mount + ($cart->product->sale_price*$cart->quantity);
                                $quantity= $quantity + $cart->quantity;
                                $product_id=$cart->product->id
                                ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
                <hr class="my-1">
                <br>

            <form name="paymentForm" id="paymentForm" action="{{route('place.order')}}" method="post">
                @csrf
                @if(Session::has('coupon'))
                    @php
                        $discounts=Session::get('coupon')['balance'];

                    @endphp
                    <input type="hidden" value="{{$discounts+$shipping+$vat}}" name="total">

                @else
                    <input type="hidden" value="{{$total_mount+$shipping+$vat}}" name="total">

                @endif

                @foreach($carts as $id => $cart)
                    <input type="hidden" value="{{$cart['quantity']}}" name="products[{{$cart->product_id}}][quantity]">
                @endforeach
                <hr class="mb-4">
                <div class="title-left">
                    <h3>Payments</h3>
                </div>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="payment_method" value="cod"  type="radio" class="custom-control-input cod">
                        <label class="custom-control-label" for="credit">Cash On Delivery</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="payment_method" value="paypal" type="radio" class="custom-control-input stripe" >
                        <label class="custom-control-label" for="debit">Stripe</label>
                    </div>
                    <div class="col-12 d-flex shopping-box">
                        <button  type="submit" class="ml-auto btn hvr-hover" onclick="return selectPaymentMethod();" style="color:white;">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Cart -->




@endsection
@section('js')
    <script>
     function selectPaymentMethod(){
         if($('.stripe').is(':checked')||$('.cod').is(':checked')){
         }else{
             alert('please select payment method')
             return false
         }
     }
    </script>




@stop
