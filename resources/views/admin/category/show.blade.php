@extends('admin.layouts.master')

@section('content')

    @include('admin.includes.breadcrumb',['title'=>'Section','var'=>'Show-All Section','link'=>'
        <a href="create" class="btn btn-primary">Add More Categories</a>
'])

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
                                <th style="text-align: center; vertical-align: middle;">sub_Category</th>
                                <th style="text-align: center; vertical-align: middle;">PHOTO</th>
                                <th style="text-align: center; vertical-align: middle;">operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row" style="text-align: center; vertical-align: middle;">{{$category->id}}</th>
                                <td style="text-align: center; vertical-align: middle;">{{$category->name}}</td>
                                <td style="text-align: center; vertical-align: middle;"> <a href="{{route('sub-category-show',[$category->id])}}" class="btn btn-primary">Sub_Categories</a> </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    @if($category->getMedia("photos")->first())
                                        <img class="rounded" src="{{$category->getMedia("photos")->first()->getFullUrl()}}"
                                             width="50" height="50"></td>
                                @else
                                    not set yet !
                                @endif
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a style="margin-bottom: 5px" href="{{route('category-edit',[$category->id])}}" class='btn btn-primary btn-with-icon '><i class="typcn typcn-edit"></i></a>
                                    <a href="{{route('category-delete',[$category->id])}}" class='btn btn-danger btn-with-icon '><i class="typcn typcn-delete"></i></a>
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
    <!-- row closed -->
    @stop
