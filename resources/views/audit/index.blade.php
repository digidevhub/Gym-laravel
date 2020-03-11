@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5> Monthly Received amount Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('audit.create')}}"
                           data-toggle="modal">Add Audit Form</a>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>
                                    <th>Agent Id</th>
                                    <th>Agent Name</th>
                                    <th hidden>Evaluator Name</th>
                                    <th hidden>Category</th>
                                    <th hidden>Contact Date</th>
                                    <th hidden>Evaluation Date</th>
                                    <th> MSISDN</th>

                                    <th hidden> Applicant Email</th>
                                    <th hidden> Applicant mobile</th>
                                    <th hidden> Applicant website</th>
                                    <th hidden> Existing employee It Professional</th>
                                    <th hidden> Existing employee Supporting Staff</th>
                                    <th hidden> Planned employment It Professional</th>
                                    <th hidden> Planned employment Supporting Staff</th>
                                    <th hidden> Trade Body Organization</th>
                                    <th hidden> Trade Body No</th>

                                    <th> Rent area</th>
                                    <th hidden> Rent Rate per (sft)</th>
                                    <th hidden> Service charge rate per (sft)</th>
                                    <th> Increment Percentage</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>




                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row  border-bottom "></div> -->

    <!--   Put all the body contenet here -->





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



