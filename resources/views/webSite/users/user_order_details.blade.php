@extends('webSite.layouts.master')
@section('content')
        <div class="cart-box-main">
        <div class="container">
            <h1 align="center">User Orders</h1> <br><br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered text-center" style="width:100%">
                      <thead>
                          <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Size</th>
                            <th>Product Color</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Order Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($orderDetails->products as $pro)
                        <tr>
                        <td>{{$pro->id}}</td>
                            <td>{{$pro->name}}</td>
                            <td></td>
                            <td></td>
                            <td>$ {{$pro->sale_price}}</td>
                            <td>{{$pro->pivot->quantity}}</td>
                            <td> @if($orderDetails->status==0) Pending @else Delivered @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


