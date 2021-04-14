@extends('webSite.layouts.master')
@section('content')

<div class="contact-box-main">

    <div class="container">
        @include('webSite.layouts.alerts.success')
        @include('webSite.layouts.alerts.errors')

     <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6">
             <div class="contact-form-right">
                 <h2 class="text-center">Change Address</h2>
                 <form action="/updateAddress" method="POST" id="contactForm registerForm">
                     @csrf
                     <input type="hidden" name="id" value="{{request()->user()->id}}">
                     @method('post')
                     <div class="row">

                         <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" title="Please Enter Your Name" class="form-control" value="{{ auth()->user()->name }}" id="name" name="name"  data-error="Please Enter Your Name" placeholder="Please Enter Your Name">
                                @error("name")
                                <span class="text-danger">{{$message}} </span>                                @enderror
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" title="Please Enter Your Email" value="{{ auth()->user()->email }}" id="email" name="email"  data-error="Please Enter Your Email" placeholder="Please Enter Your Email">
                                @error("email")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" title="Please Enter Your Address" value="{{ auth()->user()->address }}" id="address" name="address"  data-error="Please Enter Your Email" placeholder="Please Enter Your Address" >
                                @error("address")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ auth()->user()->city }}" title="Please Enter Your City" id="city" name="city"  data-error="Please Enter Your Email" placeholder="Please Enter Your City">
                                @error("city")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-12">
                             <div class="form-group">
                                 <input type="text" class="form-control" value="{{ auth()->user()->state }}" title="Please Enter Your City" id="state" name="state"  data-error="Please Enter Your Email" placeholder="Please Enter Your state">
                                 @error("state")
                                 <span class="text-danger">{{$message}} </span>
                                 @enderror
                             </div>
                         </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" title="Please Enter Your Country" disabled value="{{ auth()->user()->country }}" id="country" name="country" required data-error="Please Enter Your Email" placeholder="Please Enter Your Country">
                                @error("country")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" title="Please Enter Your Phone" value="{{ auth()->user()->phone }}" id="phone" name="phone" required data-error="Please Enter Your Password" placeholder="Please Enter Your Phone">
                                @error("phone")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
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
