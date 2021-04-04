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
    @include('admin.includes.breadcrumb',['title'=>'Users','var'=>'Show All Users','link'=>'<a class="btn btn-outline-primary"  href="/admin/dashboard"><i class="typcn typcn-chevron-left"> </i></a>'])
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Users</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Email</th>
                                <th class="wd-20p border-bottom-0">Address</th>
                                <th class="wd-15p border-bottom-0">Country</th>
                                <th class="wd-10p border-bottom-0">City</th>
                                <th class="wd-25p border-bottom-0">State</th>
                                <th class="wd-25p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Created At</th>
                                <th class="wd-25p border-bottom-0">Operations</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">{{$user->name}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$user->email}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        {{$user->address}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        {{$user->country}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$user->city}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$user->state}}</td>
                                    <td style="text-align: center; vertical-align: middle;"><span
                                            class="badge badge-pill badge-success">@if($user->status == 1 )Active @else Not Active @endif</span>  </td>
                                    <td style="text-align: center; vertical-align: middle;"> {{ $user->created_at->format('d/m/y')}}</td>

                                    <td>

                                       <div class="main-toggle-group-demo "><a
                                               href="{{route('users.delete',[$user->id])}}" title="Delete User"
                                               class='btn btn-danger btn-icon'
                                               style="margin-right:5px;height: 25px ;width: 61px"><i
                                                   class="typcn typcn-delete"></i></a>

                                           <a href="{{route('users.status',$user->id)}}">
                                           <div @if($user->status==0) class="main-toggle main-toggle-success " @else class="main-toggle main-toggle-success on" @endif>
                                              <span>  </span>
                                           </div>
                                           </a>
                                       </div>
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

    {{-- plugin status--}}
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>


    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
