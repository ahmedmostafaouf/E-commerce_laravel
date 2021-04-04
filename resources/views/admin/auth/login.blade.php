<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">


    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/admin/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('assets/css/admin/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('assets/css/admin/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/admin/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset('assets/css/admin/styleAdminlogin.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/admin/style-responsive.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/admin/html5shiv.js')}}"></script>


</head>

<body class="login-img3-body">

<div class="container">

    <form class="login-form" action="{{route('adminLogin')}}" method="post">
        @csrf
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i> Admin</p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" name="email" placeholder="E-mail" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

        </div>
    </form>
    <div class="text-right">
        <div class="credits">

            Designed by <a href="#">Ahmed Salem & Mohamed Hany</a>
        </div>
    </div>
</div>


</body>

</html>
