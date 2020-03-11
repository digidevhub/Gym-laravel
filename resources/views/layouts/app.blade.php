<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="favicon.png" rel="shortcut icon" type="image/x-icon">
    <title>Tech City | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .login{
            background:url('background.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
        .logo-name {
            color: #000;
            font-size: 80px;}
        .btn-primary {
            background-color: #226fb9 ;
            border-color: #226fb9 ;
            color: #FFFFFF;}
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary,
        .btn-primary:active:focus,
        .btn-primary:active:hover,
        .btn-primary.active:hover,
        .btn-primary.active:focus{
            background-color: #1babea;
            border-color: #1babea ;}
    </style>

</head>

<body class="gray-bg login">

<div class="middle-box text-center loginscreen animated fadeInDown" style="background:#fff;border-radius: 10px;width: 70%;margin-top: 70px;padding:40px;">
    <div>
        <div>

            <h3 class="logo-name"><img src="techcity.png" width="100%" height="100px"></h3>

        </div>
        <h3>Gym Management Portal</h3>
        <p>Admin Login</p>
        @yield('form')
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
