<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
        <!-- Title -->
        <title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>
        <!-- Favicon -->
        <link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
        <!-- Icons css -->
        <link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
        <!--  Custom Scroll bar-->
        <link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
        <!--  Sidebar css -->
        <link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
        <!-- Sidemenu css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
        @yield('css')
        <!--- Style css -->
        <link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
        <!--- Dark-mode css -->
        <link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
        <!---Skinmodes css-->
        <link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
	</head>

	<body class="main-body bg-primary-transparent">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->


		@yield('content')


        <!-- JQuery min js -->
        <script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap Bundle js -->
        <script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Ionicons js -->
        <script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
        <!-- Moment js -->
        <script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

        <!-- Rating js-->
        <script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

        <!--Internal  Perfect-scrollbar js -->
        <script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
        <!--Internal Sparkline js -->
        <script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <!-- Custom Scroll bar Js-->
        <script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <!-- right-sidebar js -->
        <script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
        <!-- Eva-icons js -->
        <script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
        @yield('js')
        <!-- Sticky js -->
        <script src="{{URL::asset('assets/js/sticky.js')}}"></script>
        <!-- custom js -->
        <script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
        <script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
	</body>
</html>
