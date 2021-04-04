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
                                    <p> $ {{$or->product->sale_price}} </p>
                                </td>
                                <td class="quantity-box">

                                    <input type="text" disabled size="4" value="{{$or ->quantity}}" min="0" step="1" class="c-input-text qty text">

                                </td>
                                <td class="total-pr">
                                    <p> $ {{$or->quantity * $or->product->sale_price}} </p>
                                </td>
                                <td class="remove-pr">
                                    <a href="">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td class="remove-pr">
                                <a
                                  href="{{ route('edit.cart',$or->id) }}" title="edit"><i
                                        class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php $total_mount = $total_mount + ($or->product->sale_price*$or->quantity);
                              $quantity= $quantity + $or->quantity;
                        ?>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>





    <div class="row my-5">
        <div class="col-lg-12 col-sm-12">
            <div class="update-box">
                <div class="col-12 d-flex shopping-box"><a href="{{route('get.cat')}}" class="ml-auto btn hvr-hover">Update Card</a>
                </div>
            </div>
        </div>
        <br>
        <div class="col-lg-12 col-sm-6">
            <div class="order-box">
                <h3 class="text-center ">Order summary</h3>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Quantity</h5>
                        <div class="ml-auto h5">  {{$quantity}} Qe </div>
                    </div>
                    <hr>

                    <div class="d-flex gr-total">
                        <h5>Total</h5>
                        <div class="ml-auto h5"> $ {{number_format($total_mount,2,",",".")}}   </div>
                    </div>
            </div>
            <hr class="my-1">
            <br>

            <div class="col-12 d-flex shopping-box"><a href="{{ route('get.checkout') }}" class="ml-auto btn hvr-hover">CheckOut</a>
            </div>
        </div>
    </div>

    </div>
</div>
<!-- End Cart -->


@endsection
@section('js')


@endsection
