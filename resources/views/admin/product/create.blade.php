@extends('admin.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@stop
@section('content')

    @include('admin.includes.breadcrumb',['title'=>'Product','var'=>'Adding-New Product','link'=>''])
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Adding New Products</h4>

                </div>

                <div class="card-body pt-0">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('product-save',[$id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name"  placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="description">
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" name="purchase_price" placeholder="purchase_price">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="sale_price" placeholder="sale_price">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="stock" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="discount" >
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Status</label>
                                    <input type="checkbox"  name="status"
                                           placeholder="Status">
                                    @error("status")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Hot New</label>
                                    <input type="checkbox"  name="hot_new"
                                           placeholder="Hot New">
                                    @error("hot_new")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Best Rated</label>
                                    <input type="checkbox"  name="best_rated"
                                           placeholder="Best Rated">
                                    @error("best_rated")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Trend Products</label>
                                    <input type="checkbox"  name="trend_product"
                                           placeholder="Trend Products">
                                    @error("trend_product")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Slider Discount</label>
                                    <input type="checkbox"  name="slider_discount"
                                           placeholder="Slider Discount">
                                    @error("slider_discount")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class=" mb-4">
                            <div class="col-sm-12 col-md-12 form-group mb-0 mt-3 justify-content-start">
                                <input type="file" class="dropify"  data-height="200" name="photo"/>
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <input type="submit" value="!Add iT" class="btn btn-primary"/>
                                <input type="submit" value="Cancel" class="btn btn-secondary"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row -->


@stop
@section('js')
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
@stop
