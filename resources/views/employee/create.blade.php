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
                                <form method="POST" action="{{route('employee.store')}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> Employee
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
                                                                                     name="emp_id"
                                                                                     class="form-control"
                                                                                     value="{{ old('emp_id') ?? $employee->emp_id }}"
                                                                                     required>
                                                            <div class="alert-danger" >{{$errors->first('emp_id')}} </div>
                                                        </div>
                                                    </div>
                                                    <!-- Employee Name  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">Employee  Name</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" Employee  Name "
                                                                                     name="employee_name"
                                                                                     class="form-control"
                                                                                     value="{{ old('employee_name') ?? $employee->employee_name }}"
                                                                                     required>
                                                            <div class="alert-danger" > {{$errors->first('employee_name')}}</div>
                                                        </div>
                                                    </div>
                                                    <!-- TL Name-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                           TL Name</label>

                                                        <div class="col-sm-8">
                                                            <select class="select2_tl form-control"
                                                                    name="tl_id" required>
                                                                <option></option>
                                                                @foreach($tl_list as $tl)
                                                                    <option {{$tl->id == old('tl_id') ?'selected':""}}  value="{{$tl->id}}">{{$tl->user_name}}</option>

                                                                @endforeach
                                                            </select>
                                                            <div class="alert-danger" > {{$errors->first('tl_id')}}</div>


                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-sm-6">

                                                    <!-- QA Name-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            QA Name</label>

                                                        <div class="col-sm-8">
                                                            <select class="select2_qa form-control"
                                                                    name="qa_id" required>
                                                                <option></option>
                                                                @foreach($qa_list as $qa)
                                                                    <option  {{ $qa->id == old('qa_id') ?'selected':""}}  value="{{$qa->id}}">{{$qa->user_name}}</option>

                                                                @endforeach
                                                            </select>
                                                            <div class="alert-danger" > {{$errors->first('qa_id')}}</div>


                                                        </div>
                                                    </div>
                                                    <!-- Process  Name-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Process Name</label>

                                                        <div class="col-sm-8">
                                                            <select class="select2_pn form-control"
                                                                    name="process_id" required>
                                                                <option></option>
                                                                @foreach($processes as $process)
                                                                    <option {{ $process->id == old('process_id') ?'selected':""}}  value="{{$process->id}}">{{$process->pr_name}}</option>

                                                                @endforeach
                                                            </select>
                                                            <div class="alert-danger" > {{$errors->first('process_id')}}</div>


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


            $(".select2_tl").select2({
                placeholder: "Select TL Name",
                allowClear: true,

            });
            $(".select2_qa").select2({
                placeholder: "Select QA  Name",
                allowClear: true,

            });
            $(".select2_pn").select2({
                placeholder: "Select Process Name",
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

