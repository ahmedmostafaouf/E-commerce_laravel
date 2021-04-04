@extends('webSite.layouts.master')
@section('content')
        <div class="cart-box-main">
        <div class="container">
            @if(isset($success))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Payment was successful </strong>
                </div>
            @endif
                @if(isset($carts))
            <h1 align="center">Thanks For Purchasing With Us!</h1> <br><br>
            <div class="row">
                <div class="col-lg-12">
                    <div align="center">
                        <h2>YOUR Paymant  ORDER HAS BEEN PLACED Please Enter Apply To Active Order </h2>
                        <form name="paymentForm" id="paymentForm" action="{{route('place.order.master')}}" method="post">
                            @csrf
                                <?php $total_mount=0 ?>
                            <input type="hidden" value="{{$id_payment}}" name="id_payment">

                        @foreach($carts as $id => $cart)
                                <?php $total_mount = $total_mount + ($cart->product->sale_price*$cart->quantity);?>
                                <input type="hidden" value="{{$cart['quantity']}}" name="products[{{$cart->product_id}}][quantity]">
                                <input type="hidden" value="{{$total_mount}}" name="total">

                            @endforeach
                            <div class="col-12 d-flex shopping-box">
                                <button  type="submit" class="ml-auto btn hvr-hover"  style="color:white;">Place Order</button>
                            </div>
                        </form>

                        @else
                            <h1 align="center">Thanks For Purchasing With Us!</h1> <br><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div align="center">
                                    <h2>YOUR COD ORDER HAS BEEN PLACED</h2>
                                    @endif




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

