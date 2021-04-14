@extends('admin.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>
@stop
@section('content')

    @include('admin.includes.breadcrumb',['title'=>'Setting','var'=>'Edit Setting','link'=>'<a class="btn btn-outline-primary"  href="/admin"><i class="typcn typcn-chevron-left"> </i></a>'])

    <!-- row -->
    @include('admin.includes.success')
    @include('admin.includes.errors')
    <div class="row ">
        <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Adding New Settings</h4>

                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('setting.save')}}"
                          method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$settings->id}}">

                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" name="address"
                                   value="{{$settings->address}}" placeholder="ادخل مقر الشركة ">
                            @error("address")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="inputEmail3" name="email"
                                   value="{{$settings->email}}" placeholder="Add Company Ema">
                            @error("email")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="desc" name="desc"
                                      placeholder="Add Description">  {{$settings->desc}}</textarea>
                            @error("desc")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->phone}}"
                                   name="phone" placeholder="Enter Company Phone Number">
                            @error("phone")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->fac_url}}"
                                   name="fac_url" placeholder="Enter Facebook Url">
                            @error("fac_url")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->youtube_url}}"
                                   name="youtube_url" placeholder="Enter Youtube Url">
                            @error("youtube_url")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->ln_url}}"
                                   name="ln_url" placeholder="Enter Linked In Url">
                            @error("ln_url")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->whats_url}}"
                                   name="whats_url" placeholder="Enter What's Url">
                            @error("whats_url")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->tw_url}}"
                                   name="tw_url" placeholder="Enter Twitter Url">
                            @error("tw_url")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->shipping}}"
                                   name="shipping" placeholder="Enter Shipping Delivery">
                            @error("shipping")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputEmail3" value="{{$settings->vat}}"
                                   name="vat" placeholder="Enter Vat">
                            @error("vat")
                            <div class="text-center">
                                <span class="text-danger" style="text-align: center;">{{$message}} </span>
                            </div>
                            @enderror
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
