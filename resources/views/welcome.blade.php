<?php
$uri = $_SERVER['REQUEST_URI'];
$index = '';

$transaction='';
$cost='';
$revenue_report='';


switch ($uri) {
    case '/home':
        $index = "class=active";
        $title = 'Dashboard';
        break;



    case '/revenue':
        $revenue = "class=active";
        $title = 'Revenue Report';
        $transaction = "class=active";
        break;
    default:
        $index = 'class="active"';
        $title = 'Dashboard';
        break;
}

?>


    <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> GYM </title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="favicon.png" rel="shortcut icon" type="image/x-icon">

    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">


    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom-style.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/clockpicker/clockpicker.css')}}" rel="stylesheet">

    <!--CSS for Image Uploaded -->
    <link href="{{asset('css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">

    <!--Datbase table view-->
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="" src="{{asset('techcity.png')}}" width="70%" height="50px" padding-left="40px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold"> </strong>
                             </span>
                            </span>
                        </a>

                    </div>
                    <div class="logo-element">
                       GYM
                    </div>
                </li>
                <li {{$index}} >
                    <a href="{{ route('home') }}"><i class="fa fa-hospital-o"></i> <span
                            class="nav-label">Dashboards</span>
                    </a>
                </li>



                <li {{route('user.index')}} >
                    <a href="{{ route('user.index') }}"><i class="fa fa-user-o"></i> <span class="nav-label">User</span>
                    </a>
                </li>
                <li {{route('employee.index')}} >
                    <a href="{{ route('employee.index') }}"><i class="fa fa fa-user-plus"></i> <span class="nav-label">Game Zone/Sauna</span>
                    </a>
                </li>
                <li {{route('user.index')}} >
                    <a href="{{ route('user.index') }}"><i class="fa fa fa-archive"></i> <span class="nav-label">Equipments</span>
                    </a>
                </li>

                <li {{route('parent_question.index')}} >
                    <a href="{{ route('parent_question.index') }}"><i class="fa fa-gear fa-spin"></i> <span class="nav-label">Damage Report</span>
                    </a>
                </li>

                <li {{$transaction}} >
                    <a href="#"><i class="fa fa-money"></i> <span class="nav-label" >Transactions</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">


                        <li {{$cost}} >
                            <a href=""><i class="fa fa-tasks" ></i> <span class="nav-label" > Daily Task</span>
                            </a>
                        </li>
                        <li {{$revenue_report}} >
                            <a href=""><i class="fa fa-comment-o" ></i> <span class="nav-label" > Help</span>
                            </a>
                        </li>
                        {{--Nav SIde Menu end--}}
                    </ul>
                </li>




            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!--        put sidebar on start of page-wrapper -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm welcome-message">Welcome Admin</span>
                </li>

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf
                    </form>
                </li>
            </ul>

        </nav>
        <div class="row  border-bottom "></div>

        @yield('content')

        <div class="footer">

            <div>
                <strong>Copyright</strong> Digicon Developer's Hub &copy; <strong id="ff"></strong>
            </div>
        </div>


        <!-- Mainly scripts -->
        <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- Flot -->
        <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

        <!-- Peity -->
        <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('js/demo/peity-demo.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('js/inspinia.js')}}"></script>
        <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <!-- GITTER -->
        <script src="{{asset('js/plugins/gritter/jquery.gritter.min.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Sparkline demo data  -->
        <script src="{{asset('js/demo/sparkline-demo.js')}}"></script>

        <!-- ChartJS-->
        <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>

        <!-- Toastr -->
        <script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('js/plugins/clockpicker/clockpicker.js')}}"></script>

        <script type="text/javascript">n = new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            d = n.getDate();
            document.getElementById('ff').innerHTML = y;
            document.getElementById('asd').value = m + '/' + d + '/' + y;
            document.getElementById('asdf').value = m + '/' + d + '/' + y;
        </script>
        <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
        <!-- Clock picker -->
        <script src="{{asset('js/plugins/clockpicker/clockpicker.js')}}"></script>


        <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
        <script src="{{asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

        <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    </div>

</div>
</body>
</html>
@include('sweetalert::alert')
@yield('extra')
