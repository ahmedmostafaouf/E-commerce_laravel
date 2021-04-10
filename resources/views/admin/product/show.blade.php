@extends('admin.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    @include('admin.includes.breadcrumb',['title'=>'Product','var'=>'Show All Products','link'=>'
'])
    <a href="{{route("product-create",[$id])}}" class="btn btn-success btn-with-icon"><i class="typcn typcn-document-add"></i>Add New Product</a>
    <br>
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Name</th>
                                    <th class="wd-15p border-bottom-0">description</th>
                                    <th class="wd-20p border-bottom-0">Purchase_Price</th>
                                    <th class="wd-15p border-bottom-0">sale_Price</th>
                                    <th class="wd-10p border-bottom-0">quantity</th>
                                    <th class="wd-25p border-bottom-0">img</th>
                                    <th class="wd-25p border-bottom-0">operations</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;">{{$product->name}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$product->description}}</td>
                                        <td style="text-align: center; vertical-align: middle;">${{$product->purchase_price}}</td>
                                        <td style="text-align: center; vertical-align: middle;">${{$product->sale_price}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$product->stock}}</td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            @if($product->getMedia("photos")->first())
                                                <img class="rounded" src="{{$product->getMedia("photos")->first()->getFullUrl()}}"
                                                     width="50" height="50"></td>
                                        @else
                                            not set yet !
                                        @endif
                                        <td style="text-align: center; vertical-align: middle;">
                                            <a style="margin-bottom: 5px" href="{{route('product-edit',[$product->id])}}" class='btn btn-primary btn-with-icon '><i class="typcn typcn-edit"></i></a>
                                            <a href="{{route('product-delete',[$product->id])}}" class='btn btn-danger btn-with-icon '><i class="typcn typcn-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->

@stop
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
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
