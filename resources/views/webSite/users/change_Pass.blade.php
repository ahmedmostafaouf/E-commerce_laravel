@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}} - Change Password
@stop
@section('content')
<div class="contact-box-main">

    <div class="container">
        @if(Session::has('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="contact-form-right">
                    <h2>Change Password</h2>
                    <form action="{{route('update.password')}}" method="POST" id="contactForm registerForm"\>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{request()->user()->id}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Current Password" id="current_password" name="oldPassword" required data-error="Please Enter Your Email">
                                    <div class="help-block with-errors">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="New Password" id="new_pwd" name="newPassword" required data-error="Please Enter Your Password">
                                    <div class="help-block with-errors">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password"   name="newPassword_confirmation" placeholder="New Password confirmation"  class="form-control ">
                                    <div class="help-block with-errors">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" type="submit">Save</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</div>

@endsection
