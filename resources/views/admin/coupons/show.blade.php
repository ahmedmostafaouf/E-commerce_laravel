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
    @include('admin.includes.breadcrumb',['title'=>'Users','var'=>'Show All Users','link'=>'<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                   data-toggle="modal" href="#modaldemo8">Add New Coupon</a>'])
    <!-- row opened -->
    @include('admin.includes.success')
    @include('admin.includes.errors')
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Coupons</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Id</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-20p border-bottom-0">Discount (%)</th>
                                <th class="wd-25p border-bottom-0">Operations</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">{{$coupon->id}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$coupon->name}}</td>

                                    <td style="text-align: center; vertical-align: middle;">{{$coupon->discount}}</td>
                                    <td>
                                       <div class="main-toggle-group-demo "><a
                                               title="Delete User" data-effect="effect-scale"
                                               data-toggle="modal" href="#modaldemo9"
                                               data-id="{{$coupon->id}}" data-name="{{$coupon->name}}"
                                               class='btn btn-danger btn-icon'
                                               style="margin-right:5px;height: 25px ;width: 61px"><i
                                                   class="typcn typcn-delete"></i></a>

                                           <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                              data-id="{{$coupon->id }}" data-name="{{$coupon->name }}"
                                              data-discount="{{$coupon->discount }}" data-toggle="modal"
                                              href="#exampleModal2" title="Edit"><i class="las la-pen"></i></a>


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


    <!-- start add Coupon-->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Coupons</h6>
                </div>
                <div class="modal-body">
                    <form action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="category_name"
                                           placeholder="Name Of Coupon" name="name">
                                    @error("name")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1"> Discount (%)</label>
                                    <input type="number" class="form-control" name="discount"
                                           placeholder="Discount (%)">
                                    @error("discount")
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
    <!-- End add Coupon -->

    <!-- edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action='coupon/update' method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label">Name Coupon:</label>
                            <input class="form-control" id="name" name="name"  type="text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Discount:</label>
                            <input class="form-control" id="discount" name="discount"  type="text">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add IT</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit closed-->



    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Coupon</h6>
                </div>

                <div class="modal-body">
                    <form action="coupon/destroy" method="post">
                        @method('delete')
                        @csrf

                        <div class="form-group">
                            <p>Are You Sure Delete This Coupon ?</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" disabled name="name" id="name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add IT </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <!-- modal body closed-->
            </div>
            <!-- modat-content closed-->
        </div>
        <!-- document closed-->
    </div>
    <!-- delete closed -->


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

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var discount = button.data('discount')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #discount').val(discount);
        })
    </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>

@endsection
