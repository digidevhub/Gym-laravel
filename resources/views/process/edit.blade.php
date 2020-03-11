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
                                <form method="POST" action="{{route('process.update',['process'=>$process])}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    @method('PATCH')
                                    <div class="row">


                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> Parent Question </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-10">


                                                    <!--  Name  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">  Name</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder="   Name "
                                                                                     name="pr_name"
                                                                                     class="form-control"
                                                                                     value="{{ old('pr_name') ?? $process->pr_name }}"
                                                                                     required>
                                                            <div>{{$errors->first('pr_name')}}</div>
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



    <script>

        function myFunction() {
            var greeting_score = document.getElementById("greeting_score").value;
            var greeting_score2 = document.getElementById("greeting_score2").value;
            var greeting_score_res = +greeting_score + +greeting_score2;

            document.getElementById("greetingScore").innerHTML = ": " + greeting_score_res;
        }

        function communicationFunction() {
            var communication_understandable = document.getElementById("communication_understandable").value;
            var communication_interruption = document.getElementById("communication_interruption").value;
            var communication_responsiveness = document.getElementById("communication_responsiveness").value;
            var communication_pronunciations = document.getElementById("communication_pronunciations").value;
            var communication_skill_res = +communication_understandable + +communication_interruption + +communication_responsiveness + +communication_pronunciations ;

            document.getElementById("communication").innerHTML =  communication_skill_res;
        }

        function callCourtesyFunction() {
            var call_reflection = document.getElementById("call_reflection").value;
            var call_politeness = document.getElementById("call_politeness").value;
            var call_personalize = document.getElementById("call_personalize").value;
            var call_avoiding = document.getElementById("call_avoiding").value;
            var call_courtesy_res = +call_reflection + +call_politeness + +call_personalize + +call_avoiding ;

            document.getElementById("callCourtesy").innerHTML =  call_courtesy_res;
        }
        // issueIdentificationFunction
        function issueIdentificationFunction() {
            var issue_identify = document.getElementById("issue_identify").value;
            var issue_clear = document.getElementById("issue_clear").value;
            var issue_attentive = document.getElementById("issue_attentive").value;
            var issue_identify_res = +issue_identify + +issue_clear + +issue_attentive ;

            document.getElementById("issueIdentify").innerHTML =  issue_identify_res;
        }

        //issueResolutionFunction
        function issueResolutionFunction() {
            var com_information = document.getElementById("com_information").value;
            var correct_information = document.getElementById("correct_information").value;
            var alter_information = document.getElementById("alter_information").value;
            var issue_identify_res = +com_information + +correct_information + +alter_information ;

            document.getElementById("issueResolution").innerHTML =  issue_identify_res;
        }
        //followedProcessFunction

        function followedProcessFunction() {
            var fol_comp = document.getElementById("fol_comp").value;
            var ver_prop = document.getElementById("ver_prop").value;
            var followed_process_res = +fol_comp + +ver_prop  ;

            document.getElementById("followedProcess").innerHTML =  followed_process_res;
        }



    </script>





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


            $(".select2_demo_blood").select2({
                placeholder: "Select Blood Group",
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

