<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('assets/webSite/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('assets/wbSite/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/webSite/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('assets/webSite/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/webSite/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/webSite/css/custom.css')}}">
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
@include('webSite.layouts.header')
@include('webSite.layouts.alerts.errors')
@include('webSite.layouts.alerts.success')
@yield('content')
@include('webSite.layouts.footer')
<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="{{asset('assets/webSite/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/popper.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('assets/webSite/js/jquery.superslides.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/webSite/js/inewsticker.js')}}"></script>
<script src="{{asset('assets/webSite/js/bootsnav.js')}}"></script>
<script src="{{asset('assets/webSite/js/images-loded.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/isotope.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/baguetteBox.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/webSite/js/contact-form-script.js')}}"></script>
<script src="{{asset('assets/webSite/js/custom.js')}}"></script>


@yield('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

</body>

</html>
