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
                                <form method="POST" action="{{route('audit.store')}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> Agent Basic
                                                    Information </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">


                                                    <!-- Agent Name  -->

                                                    <div class="form-group"><label class="col-sm-4 control-label"> Agent
                                                            Name</label>

                                                        <div class="col-sm-8">
                                                            <select class="select2_agent form-control"
                                                                    name="employee_id" required>

                                                                <option></option>
                                                                @foreach($employees as $employee)
                                                                    <option {{ $employee->id == old('employee_id') ?'selected':""}}  value="{{$employee->id}}">{{$employee->employee_name}}-{{$employee->emp_id}}</option>

                                                                @endforeach
                                                            </select>
                                                            <div class="alert-danger" >{{$errors->first('employee_id')}} </div>



                                                        </div>
                                                    </div>
                                                    <!-- Evaluator Name-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Evaluator Name</label>

                                                        <div class="col-sm-8">
                                                            <select disabled class="select2_demo_3 form-control"
                                                                    name="user_id" required>
                                                                <option value="{{$user->id}}">{{$user->user_name}}</option>
                                                            </select>


                                                        </div>
                                                    </div>


                                                    <!-- Category  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Category</label>

                                                        <div class="col-sm-8">
                                                            <select class="select2_category form-control" name="category"
                                                                    required>
                                                                <option></option>
                                                                @foreach($categories as $category)
                                                                    <option {{ $category->id == old('$category_id') ?'selected':""}}  value="{{$category->id}}">{{$category->category_name}}</option>

                                                                @endforeach
                                                            </select>


                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Contact Date-->


                                                    <div class="form-group" id="data_1">

                                                        <label class="col-sm-4 control-label">Contact Date </label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group date"><span
                                                                    class="input-group-addon"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                <input id="asd" name="contact_date" type="text"
                                                                       value=" Contact Date"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Evaluation Date-->


                                                    <div class="form-group" id="data_1">

                                                        <label class="col-sm-4 control-label">Evaluation Date </label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group date"><span
                                                                    class="input-group-addon"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                <input id="asd" name="evaluation_date" type="text"
                                                                       value=" Evaluation Date"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- MSISDN -->

                                                    <div class="form-group"><label
                                                            class="col-sm-4 control-label">MSISDN </label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" MSISDN  "
                                                                                     name="msisdn"
                                                                                     class="form-control"

                                                                                     required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr/>



                                                @foreach($parents as $i=>$parent)
                                                    <?php
                                                    $questions= \Illuminate\Support\Facades\DB::table('questions')->where('parent_question_id',$parent->id)->get();
                                                    $total=$questions->sum('question_score');
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox">
                                                                <div class="ibox-title">
                                                                    <h5 style="color: red"> {{$parent->pq_name}}: <span id="score{{$i}}">{{$total}}</span> </h5>
                                                                    <div class="ibox-tools">
                                                                        <a class="collapse-link">
                                                                            <i class="fa fa-chevron-up"></i>
                                                                        </a>


                                                                    </div>
                                                                </div>
                                                                <div class="ibox-content">

                                                                    <div class="row">
                                                                        @foreach($questions as $j=>$question)
                                                                            @if($j%2==0)
                                                                                @continue
                                                                            @endif
                                                                            <div class="col-sm-6">
                                                                                <!-- Did agent use standard opening greeting in time -->
                                                                                <div class="form-group"><label class="col-sm-8 control-label">{{$question->question_name}}</label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="select2_demo_3 form-control"
                                                                                                name="score{{$i}}_{{$j}}" id="score{{$i}}_{{$j}}"
                                                                                                onchange="myFunction{{$i}}()">
                                                                                            <option value="{{$question->question_score}}">Pass</option>
                                                                                            <option value="0">Fail</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        @foreach($questions as $j=>$question)
                                                                            @if($j%2!=0)
                                                                                @continue
                                                                            @endif
                                                                            <div class="col-sm-6">
                                                                                <!-- Did agent use standard opening greeting in time -->
                                                                                <div class="form-group"><label class="col-sm-8 control-label">{{$question->question_name}}</label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="select2_demo_3 form-control"
                                                                                                name="score{{$i}}_{{$j}}" id="score{{$i}}_{{$j}}"
                                                                                                onchange="myFunction{{$i}}()">
                                                                                            <option value="{{$question->question_score}}">Pass</option>
                                                                                            <option value="0">Fail</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function myFunction{{$i}}() {
                                                            var score=0;
                                                            @foreach($questions as $j=>$question)
                                                                score =score+ +document.getElementById("score{{$i}}_{{$j}}").value;
                                                            @endforeach

                                                            document.getElementById("score{{$i}}").innerHTML = ": " + score;
                                                        }
                                                    </script>

                                                @endforeach


                                                <hr/>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- Week -->

                                                        <div class="form-group"><label class="col-sm-4 control-label">Week </label>

                                                            <div class="col-sm-8"> <select class="select2_week form-control" name="week"
                                                                                           required>
                                                                    <option></option>
                                                                    <option value="Week 1">Week 1</option>
                                                                    <option value="Week 2">Week 2</option>
                                                                    <option value="Week 3">Week 3</option>
                                                                    <option value="Week 4">Week 4</option>
                                                                    <option value="Week 5">Week 5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Tenure -->

                                                        <div class="form-group"><label class="col-sm-4 control-label">Tenure </label>

                                                            <div class="col-sm-8"><input type="text"
                                                                                         placeholder=" Tenure  "
                                                                                         name="tenure"
                                                                                         class="form-control"
                                                                                         value="Tenure "
                                                                                         required>
                                                            </div>
                                                        </div>

                                                        <!-- Remarks -->

                                                        <div class="form-group"><label class="col-sm-4 control-label">
                                                                Remarks</label>

                                                            <div class="col-sm-8"><textarea type="text"
                                                                                            placeholder="  Remarks "
                                                                                            name="remarks" required
                                                                                            class="form-control"
                                                                                            required>  </textarea>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- Accurate WrapUp-->

                                                        <div class="form-group"><label class="col-sm-4 control-label">Accurate WrapUp </label>

                                                            <div class="col-sm-8"> <select class="select2_accurate form-control" name="accurate_wrap"
                                                                                           required>

                                                                    <option value="1">1</option>
                                                                    <option value="0">0</option>


                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Wrong WrapUpp-->

                                                        <div class="form-group"><label class="col-sm-4 control-label">Wrong WrapUpp </label>

                                                            <div class="col-sm-8"> <select class="select2_accurate form-control" name="wrong_wrap"
                                                                                           required>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>



                                                                </select>
                                                            </div>
                                                        </div>



                                                    </div>

                                                </div>

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


            $(".select2_week").select2({
                placeholder: "Select Week ",
                allowClear: true,

            });


            $(".select2_agent").select2({
                placeholder: "Select Agent Name",
                allowClear: true,

            });
            $(".select2_category").select2({
                placeholder: "Select Category",
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

