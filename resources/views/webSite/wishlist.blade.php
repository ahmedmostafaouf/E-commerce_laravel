@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}} - Carts
@stop
@section('content')
@include('webSite.layouts.breadcrumb',['var'=>'WishList','link'=>"<a href='/'> Shop</a>"])

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
                            <th>Stock</th>
                            <th>Add Item</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total_mount=0; $quantity=0; ?>
                    @foreach($users as $user)
                        @foreach($user->product as $wishlist)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <a href="#">
                                            @if($wishlist->getMedia("photos")->first())
                                                <img class="img-fluid"
                                                     src="{{$wishlist->getMedia("photos")->first()->getFullUrl()}}">
                                            @else
                                                not set yet !
                                            @endif
                                        </a>

                                    </a>
                                </td>
                                <td class="name-pr">
                                    {{$wishlist->name}}
                                </td>
                                <td class="price-pr">
                                    <p> $ {{$wishlist->sale_price}} </p>
                                </td>
                                <td class="price-pr">
                                    <p> {{$wishlist->stock}} </p>
                                </td>
                                <td class="add-pr">
                                   <a class="btn hvr-hover" href="{{ route('details.page',$wishlist->id) }}" style="color: white"> Add To Cart</a>
                                </td>
                                <td class="remove-pr">
                                    <a href="{{route('delete.wishlist',$wishlist->id)}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>


        </div>


    </div>
</div>
<!-- End Cart -->


@endsection
@section('js')


@endsection
