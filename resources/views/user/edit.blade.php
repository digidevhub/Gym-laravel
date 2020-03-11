@extends('welcome')

@section('content')

    <body>
    <style>
        .button {
            text-align: center;
            padding-top: 20px;
            clear: both;
        }

        #hidden_div {
            display: none;
        }


    </style>


    <!-- <div class="row  border-bottom "></div> -->

    <!--   Put all the body contenet here -->


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">


                    <div class="ibox-content">

                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('user.update',['user'=>$user])}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    @method('PATCH')
                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> User
                                                    Information </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">

                                                    <!-- Employee  Id  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">Employee  Id</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" Employee  Id "
                                                                                     name="employee_id"
                                                                                     class="form-control"
                                                                                     value="{{ old('employee_id') ?? $user->employee_id }}"
                                                                                     required>
                                                            <div class="alert-danger" > {{$errors->first('employee_id')}} </div>
                                                        </div>
                                                    </div>
                                                    <!-- User Name  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">User  Name</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" User  Name "
                                                                                     name="user_name"
                                                                                     class="form-control"
                                                                                     value="{{ old('user_name') ?? $user->user_name }}"
                                                                                     required>
                                                            <div class="alert-danger" >{{$errors->first('employee_id')}} </div>
                                                        </div>
                                                    </div>
                                                    <!-- User Type-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                           user Type</label>

                                                        <div class="col-sm-8">
                                                            <select class="select2_demo_3 form-control"
                                                                    name="user_type" required>
                                                                <option></option>
                                                                <option value="0">Agent </option>
                                                                <option value="1">TL</option>
                                                                <option value="2 ">QA</option>
                                                            </select>


                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-sm-6">

                                                    <!-- Email-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">Email </label>

                                                        <div class="col-sm-8"><input type="email"
                                                                                     placeholder=" Email "
                                                                                     name="email"
                                                                                     value="{{ old('email') ?? $user->email }}"
                                                                                     class="form-control"
                                                                                     required>
                                                            <div class="alert-danger" >{{$errors->first('email')}} </div>
                                                        </div>
                                                    </div>
                                                    <!-- Password-->
                                                    <div class="form-group"><label class="col-sm-4 control-label">Password </label>

                                                        <div class="col-sm-8"><input type="password"
                                                                                     placeholder=" Enter password "
                                                                                     name="password"
                                                                                     value="{{ old('password') ?? $user->password }}"
                                                                                     class="form-control"
                                                                                     required>
                                                            <div class="alert-danger" > {{$errors->first('password')}}</div>
                                                        </div>
                                                    </div>




                                                </div>
                                                <hr/>







                                                <div class="button">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="button text-center">
                                                                <div class="form-group">
                                                                    <p><strong>Note:</strong> <font color="red">All
                                                                            Fields
                                                                            must be filled</font></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="button text-center">
                                                                <div class="form-group">
                                                                    <button id="add-user" class="btn btn-primary">Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </form>


                            </div>


                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>






    @endsection

    @section('extra')
        <!-- Date picker -->
        <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
        <!-- Clock picker -->
        <script src="js/plugins/clockpicker/clockpicker.js"></script>


        <script src="js/plugins/dataTables/datatables.min.js"></script>
        <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <script src="js/plugins/select2/select2.full.min.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <script type="text/javascript">


            $(".select2_ut").select2({
                placeholder: "Select User Type",
                allowClear: true,

            });

        </script>
        <script>
            $(document).ready(function () {
                $('.clockpicker').clockpicker();


                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        {extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {
                            extend: 'print',
                            customize: function (win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });

                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });


            });


        </script>

@endsection

