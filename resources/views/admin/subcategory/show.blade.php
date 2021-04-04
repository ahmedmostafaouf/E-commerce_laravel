@extends('admin.layouts.master')

@section('content')

    @include('admin.includes.breadcrumb',['title'=>'Subcategory','var'=>'Show-All Subsection','link'=>''])

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
                                <th style="text-align: center; vertical-align: middle;">Products</th>
                                <th style="text-align: center; vertical-align: middle;">PHOTO</th>
                                <th style="text-align: center; vertical-align: middle;">Operation</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($subCategories as $subcategory)
                                    <tr>
                                        <th scope="row" style="text-align: center; vertical-align: middle;">{{$subcategory->id}}</th>
                                        <td style="text-align: center; vertical-align: middle;">{{$subcategory->name}}</td>
                                        <td style="text-align: center; vertical-align: middle;"><a href="{{route('product-show',[$subcategory->id])}}" class="btn btn-primary">products</a></td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            @if($subcategory->getMedia("photos")->first())
                                                <img class="rounded" src="{{$subcategory->getMedia("photos")->first()->getFullUrl()}}"
                                                     width="50" height="50"></td>
                                        @else
                                            not set yet !
                                        @endif
                                        <td style="text-align: center; vertical-align: middle;">
                                            <a style="margin-bottom: 5px" href="{{route('sub-category-edit',[$subcategory->id])}}" class='btn btn-primary btn-with-icon '><i class="typcn typcn-edit"></i></a>
                                            <a href="{{route('sub-category-delete',[$subcategory->id])}}" class='btn btn-danger btn-with-icon '><i class="typcn typcn-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <a href="{{route('sub-category-create',[$id])}}" class="btn btn-primary">Add More Sub_Categories</a>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->
    @endsection
