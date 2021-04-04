@extends('admin.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('content')
    @include('admin.includes.breadcrumb',['title'=>'Products','var'=>'Show All Products','link'=>''])
    <!-- row opened -->
    <div class="row row-sm">
        @include('admin.includes.success')
        @include('admin.includes.errors')
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Show Orders</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>

                    </div>
                    <div class="card-body pd-20 pd-sm-40">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong> Order</strong> Details
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Name User :</th>
                                                    <th> {{$order->user->name}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Phone User :</th>
                                                    <th> {{$order->user->phone}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Payment Type :</th>
                                                    <th>@if($order->bank_transaction_id) Master Card @else Cache On
                                                        Delivery @endif</th>
                                                </tr>
                                                <tr>
                                                    <th>Payment Id :</th>
                                                    <th>@if($order->bank_transaction_id) {{$order->bank_transaction_id}} @else
                                                            Cache On Delivery @endif</th>
                                                </tr>
                                                <tr>
                                                    <th>Total :</th>
                                                    <th>$ {{$order->total_price}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Month :</th>
                                                    <th>{{$order->created_at->format('M')}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Date :</th>
                                                    <th>{{$order->created_at->format('Y,M,d')}}</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Delivery </strong> Address
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Name :</th>
                                                    <th>{{$delivery->name}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Phone :</th>
                                                    <th>{{$delivery->phone}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Email :</th>
                                                    <th>{{$delivery->user->email}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <th>{{$delivery->address}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <th>{{$delivery->country}}</th>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <th>{{$delivery->city}}</th>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <th>{{$delivery->state}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Status :</th>
                                                    <th> @if($order->status==0)
                                                            <div class="badge badge-warning">Pending
                                                            </div>
                                                        @elseif($order->status==1)
                                                            <div class="badge badge-info">Payment Accept
                                                            </div>
                                                        @elseif($order->status==2)
                                                            <div class="badge badge-warning">Process
                                                            </div>
                                                        @elseif($order->status==3)
                                                            <div class="badge badge-success">Delivered</div>
                                                        @else
                                                            <div class="badge badge-danger">Cancel</div>
                                                        @endif
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col col-lg-12">
                                <h6 class="card-body-title">
                                    Product Details
                                </h6>
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Product Id</th>
                                            <th class="wd-15p border-bottom-0">Product Name</th>
                                            <th class="wd-15p border-bottom-0">Image</th>
                                            <th class="wd-15p border-bottom-0">Price</th>
                                            <th class="wd-20p border-bottom-0">Quantity</th>
                                            <th class="wd-25p border-bottom-0">Total</th>


                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($order->products as $pro)
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;">{{$pro->id}}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{$pro->name}}</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    @if($pro->getMedia("photos")->first())
                                                        <img class="rounded"
                                                             src="{{$pro->getMedia("photos")->first()->getFullUrl()}}"
                                                             width="50" height="50"></td>
                                                @else
                                                    not set yet !
                                                    @endif
                                                    </td>
                                                    <td>$ {{$pro->sale_price}}</td>
                                                    <td>{{$pro->pivot->quantity}}</td>

                                                    <td> $ {{ $pro->sale_price * $pro->pivot->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                @if($order->status==0)
                                    <a href="{{route('order.payment.accept',$order->id)}}" class="btn btn-primary "> Payment Accept</a>
                                    <a href="{{route('order.payment.cancel',$order->id)}}" class="btn btn-danger "> Cancel</a>
                                @elseif($order->status ==1)
                                    <a href="{{route('order.delivery.process',$order->id)}}" class="btn btn-info "> Process Delivery </a>
                                @elseif($order->status ==2)
                                    <a href="{{route('order.delivery.success',$order->id)}}" class="btn btn-success"> Delivery Done</a>
                                @elseif($order->status ==3)
                                    <br>
                                    <div class="alert alert-success text-center">
                                    <strong> This Product are successfully Delivered </strong>
                                    </div>
                                @else
                                    <br>
                                    <div class="alert alert-success text-center">
                                        <strong>  The Order are Not Valid </strong>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--/div-->



@stop
@section('js')
    <!-- Internal Data tables -->
    <script>
        import Data from "../../../../public/assets/plugins/jquery-ui/ui/data";

        export default {
            components: {Data}
        }
    </script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>


@endsection
