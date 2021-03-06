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
                                <form method="POST" action="{{route('question.store')}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> Question
                                                   </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">


                                                    <!-- Question Name  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">Question  Name</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" Question  Name "
                                                                                     name="question_name"
                                                                                     class="form-control"
                                                                                     value="{{ old('question_name') ?? $question->question_name }}"
                                                                                     required>
                                                            <div class="alert-danger" >{{$errors->first('question_name')}} </div>
                                                        </div>
                                                    </div>
                                                    <!-- Question Score  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label"> Score</label>

                                                        <div class="col-sm-8"><input type="number"
                                                                                     placeholder=" Question Score   "
                                                                                     name="question_score"
                                                                                     class="form-control"
                                                                                     value="{{ old('question_score') ?? $question->question_score }}"
                                                                                     required>
                                                            <div class="alert-danger" >{{$errors->first('question_score')}} </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-sm-6">

                                                    <!-- Parent Question Name-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Parent Question Name</label>
                                                        <div class="col-sm-8">
                                                            <select class="elect2_demo_pq  form-control"
                                                                    name="parent_question_id" required>
                                                                @foreach($parent_questions as $parent_question)
                                                                    <option></option>
                                                                    <option {{ $parent_question->id == old('parent_question_id') ?'selected':""}} value="{{$parent_question->id}}">{{$parent_question->pq_name}}</option>

                                                                    @endforeach

                                                            </select>

                                                            <div class="alert-danger" >{{$errors->first('parent_question_id')}} </div>
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


            $(".elect2_demo_pq ").select2({
                placeholder: "Select Parent Question Name",
                allowClear: false,

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

