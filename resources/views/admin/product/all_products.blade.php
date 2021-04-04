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
    @include('admin.includes.breadcrumb',['title'=>'Products','var'=>'Show All Products','link'=>'<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                   data-toggle="modal" href="#modaldemo8">Add New Product</a>'])
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
                                    <td style="text-align: center; vertical-align: middle;">
                                        ${{$product->purchase_price}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        ${{$product->sale_price}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$product->stock}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        @if($product->getMedia("photos")->first())
                                            <img class="rounded"
                                                 src="{{$product->getMedia("photos")->first()->getFullUrl()}}"
                                                 width="50" height="50"></td>
                                    @else
                                        not set yet !
                                    @endif
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a style="margin-bottom: 5px" href="{{route('product-edit',[$product->id])}}"
                                           class='btn btn-primary btn-with-icon '><i class="typcn typcn-edit"></i></a>
                                        <a href="{{route('product-delete',[$product->id])}}"
                                           class='btn btn-danger btn-with-icon '><i class="typcn typcn-delete"></i></a>
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

    <!-- start add Categoty-->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Sub Category</h6>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="category_name"
                                           placeholder="Name Of Product" name="name">
                                    @error("name")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1"> Stock</label>
                                    <input type="number" class="form-control" name="stock"
                                           placeholder="stock">
                                    @error("stock")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Purchase Price</label>
                                    <input type="number" class="form-control" name="purchase_price"
                                           placeholder="purchase_price">
                                    @error("purchase_price")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Sale Price</label>
                                    <input type="number" class="form-control" name="sale_price"
                                           placeholder="purchase_price">
                                    @error("sale_price")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select type="text" class="form-control" id="category_name" name="category_id">
                                        <option value="" selected disabled> Get Category</option>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}} </option>
                                        @endforeach
                                    </select>
                                    @error("category_id")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Sub Category</label>
                                    <select type="text" class="form-control" id="category_name" name="sub_category_id">
                                        <option value="" selected disabled> Get Sub Category</option>
                                        @foreach($subCats as $subCat)
                                            <option value="{{$subCat->id}}">{{$subCat->name}} </option>
                                        @endforeach

                                    </select>
                                    @error("sub_category_id")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                              rows="1" cols="2"></textarea>
                                    @error("description")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlTextarea1">Photo</label>
                                    <input type="file" class="dropify" data-height="200" name="photo"/>
                                    @error("photo")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add It !!</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End add category -->

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
