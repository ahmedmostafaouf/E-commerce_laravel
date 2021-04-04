@extends('webSite.layouts.master')
@section('content')

<div class="contact-box-main">

    <div class="container">
        @include('webSite.layouts.alerts.success')
        @include('webSite.layouts.alerts.errors')
    <form name="checkoutFrom" id="checkoutFrom" action="{{route('add.checkout')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="contact-form-right">
                    <h2>Bill To</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"   value="{{auth()->user()->name}}"  name="billing_name" id="billing_name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"   value="{{auth()->user()->address}}"   name="billing_address" id="billing_address" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  value="{{auth()->user()->city}}"  name="billing_city" id="billing_city" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"   value="{{auth()->user()->state}}"  name="billing_state" id="billing_state" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"   value="{{auth()->user()->country}}"  name="billing_country" id="country" required data-error="Please enter your name">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"   value="{{ auth()->user()->phone }}"  name="billing_mobile" id="billing_mobile" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                             <div class="col-md-12">
                                <div class="form-group" style="margin-left:30px;">
                                    <input  type="checkbox" class="form-check-input" id="billtoship">
                                    <label class="form-check-label" for="billtoship">Shipping Address Same As Billing Address</label>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="contact-form-right">
                    <h2>Ship To</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"   value="{{old('shipping_name',$delivary->name)}}"  name="shipping_name" id="shipping_name" required data-error="Please enter your name" placeholder="Please enter your name" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  value="{{old('shipping_address',$delivary->address)}}"  name="shipping_address" id="shipping_address" required data-error="Please enter your name" placeholder="Please enter your address">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('shipping_city',$delivary->city)}}"  name="shipping_city" id="shipping_city" required data-error="Please enter your name" placeholder="Please enter your city">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  value="{{old('shipping_state',$delivary->state)}}" name="shipping_state" id="shipping_state" required data-error="Please enter your name" placeholder="Please enter your state">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"   value="{{ auth()->user()->country }}"  name="billing_country" id="billing_country" required data-error="Please enter your name" placeholder="Please enter your country">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('shipping_mobile',$delivary->phone)}}"   name="shipping_mobile" id="shipping_mobile" required data-error="Please enter your name" placeholder="Please enter your mobile">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="btn hvr-hover" type="submit">Checkout</button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </form>
    </div>

</div>

@endsection
@section('js')
    <script>
        $("#billtoship").click(function(){
      if(this.checked){
        $("#shipping_name").val($("#billing_name").val());
        $("#shipping_address").val($("#billing_address").val());
        $("#shipping_city").val($("#billing_city").val());
        $("#shipping_state").val($("#billing_state").val());
        $("#shipping_country").val($("#billing_country").val());
        $("#shipping_pincode").val($("#billing_pincode").val());
        $("#shipping_mobile").val($("#billing_mobile").val());
      }else{
        $("#shipping_name").val('');
        $("#shipping_address").val('');
        $("#shipping_city").val('');
        $("#shipping_state").val('');
        $("#shipping_country").val('');
        $("#shipping_pincode").val('');
        $("#shipping_mobile").val('');
      }

    });

        </script>

@stop
