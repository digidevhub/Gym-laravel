@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #F79517"> Process   Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('process.create')}} "
                           data-toggle="modal">Add Process </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>



                                    <th >Name</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($processes as $process)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td> {{$process->pr_name}} </td>
                                        <td class="center">

                                            <a href="{{route('process.edit', ['parent_question' => $process])}} "><i
                                                    class="fa fa-edit"></i></a>


                                        </td>
                                    </tr>







                                    <?php $counter+=1;?>
                                @endforeach


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



