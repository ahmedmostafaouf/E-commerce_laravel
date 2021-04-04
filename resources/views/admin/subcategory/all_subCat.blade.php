@extends('admin.layouts.master')

@section('content')

    @include('admin.includes.breadcrumb',['title'=>'Subcategory','var'=>'Show-All-Sub-Categories','link'=>''])

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">All Categories</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Categories Data ... </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">ID</th>
                                <th style="text-align: center; vertical-align: middle;">Name</th>
                                <th style="text-align: center; vertical-align: middle;">Description</th>
                                <th style="text-align: center; vertical-align: middle;">Products</th>
                                <th style="text-align: center; vertical-align: middle;">PHOTO</th>
                                <th style="text-align: center; vertical-align: middle;">Operation</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($subCats as $subCat)
                                    <tr>
                                        <th scope="row" style="text-align: center; vertical-align: middle;">{{$subCat->id}}</th>
                                        <td style="text-align: center; vertical-align: middle;">{{$subCat->name}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$subCat->description}}</td>
                                        <td style="text-align: center; vertical-align: middle;"><a href="{{route('product-show',[$subCat->id])}}" class="btn btn-primary">products</a></td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            @if($subCat->getMedia("photos")->first())
                                                <img class="rounded" src="{{$subCat->getMedia("photos")->first()->getFullUrl()}}"
                                                     width="50" height="50"></td>
                                        @else
                                            not set yet !
                                        @endif
                                        <td style="text-align: center; vertical-align: middle;">
                                            <a style="margin-bottom: 5px" href="{{route('sub-category-edit',[$subCat->id])}}" class='btn btn-primary btn-with-icon '><i class="typcn typcn-edit"></i></a>
                                            <a href="{{route('sub-category-delete',[$subCat->id])}}" class='btn btn-danger btn-with-icon '><i class="typcn typcn-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                   data-toggle="modal" href="#modaldemo8">Add New Sub Category</a>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->


    <!-- start add Categoty-->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Sub Category</h6>
                </div>
                <div class="modal-body">
                    <form action="{{route('subCat.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="category_name" name="name">
                            @error("name")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <select type="text" class="form-control" id="category_name" name="category_id">
                                <option value="" selected disabled> Get Category </option>
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}} </option>
                                @endforeach

                            </select>
                            @error("category_id")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            @error("description")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Photo</label>
                            <input type="file" class="dropify" data-height="200" name="photo"/>
                            @error("photo")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add It !!</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End add category -->
    @endsection
