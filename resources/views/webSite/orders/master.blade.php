@extends('webSite.layouts.master')
@section('content')
    <div class="cart-box-main">
        <div class="container">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('flash_message_error') }}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('flash_message_success') }}</strong>
                </div>
            @endif
            <h1 align="center">Thanks For Purchasing With Us!</h1> <br><br>
            <div class="row">
                <div class="col-lg-6">
                    <div align="center">
                        <h2>YOUR  ORDER HAS BEEN PLACED</h2>
                        <p>total payable about is PKR ( {{$request->total}})</p>
                        <b>Please make payment by entering your credit or debit card</b>
                    </div>
                </div>
                <div class="col-lg-6">
                    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$res->id}}"></script>


                    <form action="{{route('get.thanks')}}" data-total="{{$request->total}}" class="paymentWidgets" data-brands="VISA MASTER AMEX">
                        @csrf

                        <div class="form-row">

                        </div>
                    </form>





                    <div id="card-error" role="alert"></div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


