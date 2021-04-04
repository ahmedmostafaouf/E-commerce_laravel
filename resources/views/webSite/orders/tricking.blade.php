@extends('webSite.layouts.master')
@section('content')
    <div class="cart-box-main">
        <div class="container">

            <h1 align="center">Status Code With Us!</h1> <br><br>
            <div class="row">
                <div class="col-5 offset-lg-1">
                    <div class="contact-form-title">
                        <h4> Your Order Status </h4>
                    </div>
                    <div class="progress">
                        @if($orders->status==0)
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif($orders->status==1)
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                        @elseif($orders->status==2)
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                        @elseif($orders->status==3)
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        @else
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        @endif

                    </div> <br>
                    @if($orders->status==0)
                        <h4> Note :Your Order Under Review</h4>
                    @elseif($orders->status==1)
                        <h4> Note :Your Order Under Process</h4>
                    @elseif($orders->status==2)
                            <h4> Note :Your Order Handover Delivery </h4>
                    @elseif($orders->status==3)
                            <h4> Note :Your Order Complete</h4>
                    @else
                        <h4> Note :Your Order Cancel</h4>
                    @endif
                </div>

                <div class="col-5 offset-lg-1">
                    <div class="contact-form-title">
                        <h4> Your Order Details </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Payment Type :</th>
                                <th>@if($orders->bank_transaction_id) Master Card @else Cache On
                                    Delivery
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>Payment Id :</th>
                                <th>@if($orders->bank_transaction_id) {{$orders->bank_transaction_id}} @else
                                        Cache On Delivery @endif</th>
                            </tr>
                            <tr>
                                <th>Total :</th>
                                <th>$ {{$orders->total_price}}</th>
                            </tr>
                            <tr>
                                <th>Month :</th>
                                <th>{{$orders->created_at->format('M')}}</th>
                            </tr>
                            <tr>
                                <th>Date :</th>
                                <th>{{$orders->created_at->format('Y,M,d')}}</th>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

@endsection


