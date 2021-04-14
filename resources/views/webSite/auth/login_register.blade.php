@extends('webSite.layouts.master')
@section('content')
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="contact-form-right">
                        <h2>New User SignUp !</h2>
                        <form action="{{route('front.register')}}" method="POST" id="contactForm registerForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Your Name" id="name" name="name"  data-error="Please Enter Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error("name")
                                        <div class="text-center">
                                            <div class="help-block with-errors" style="Right:204px">{{$message}} </div>
                                        </div>
                                        @enderror

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" id="email" name="email" value="{{ old('name') }}" required autocomplete="name" autofocus  data-error="Please Enter Your Email">
                                        @error("email")
                                        <div class="text-center">
                                            <div class="help-block with-errors" style="Right:204px">{{$message}} </div>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password"  required data-error="Please Enter Your Password">
                                        @error("password")
                                        <div class="text-center">
                                            <div class="help-block with-errors" style="Right:204px">{{$message}} </div>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password Again" id="password" name="password_confirmation" required data-error="Please Enter Your Password Again">
                                        @error("password")
                                        <div class="text-center">
                                            <div class="help-block with-errors" style="Right:204px">{{$message}} </div>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Signup</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-1 col-md-4 col-sm-2" id="or">
                   <p  style="background: #d33b33;color: wheat;text-align: center;border-radius: 11px;font-weight: bold;">OR</p>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Already a Member ? Just SignIn !</h2>
                        <form action="{{route('front.login')}}" method="post" id="contactForm LoginForm"> {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required data-error="Please Enter Your Email">
                                        @error("email")
                                        <div class="text-center">
                                            <div class="help-block with-errors" style="Right:204px">{{$message}} </div>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-error="Please Enter Your Password">

                                        <a href="{{route('password.request')}}" style="margin-top:2px;"> I Forget My Password ! </a>
                                        @error("password")
                                        <div class="text-center">
                                            <div class="help-block with-errors" style="Right:204px">{{$message}} </div>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
