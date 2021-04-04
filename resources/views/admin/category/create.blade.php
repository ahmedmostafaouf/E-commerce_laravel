@extends('admin.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@stop
@section('content')

    @include('admin.includes.breadcrumb',['title'=>'Section','var'=>'Adding-New-CategoryReq','link'=>''])
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Adding New Category</h4>

                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('category-save')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" id="Name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" name="description" placeholder="description">
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-4">
                                <input type="file" class="dropify" data-height="200" name="photo"/>
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
