@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #F79517"> User Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('user.create')}} "
                           data-toggle="modal">Add User </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>
                                    <th>Name </th>
                                    <th>Email Address</th>
                                    <th>Mobile Number</th>

                                    <th >Address</th>
                                    <th >Current Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($users as $user)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td> {{$user->process['pr_name']}} </td>
                                        <td> {{$user->employee_id}} </td>
                                        <td> {{$user->user_name}} </td>
                                        <td> {{$user->email}} </td>
                                        <td> {{$user->email}} </td>

                                        <td class="center">

                                            <a href="{{route('user.edit', ['user' => $user])}} "><i
                                                    class="fa fa-edit"></i></a>
                                            <a>
                                                <form action="{{route('user.destroy', ['user' => $user]) }}"
                                                      method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button
                                                        style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="fa fa-trash"></i></button>
                                                </form>
                                            </a>
                                            <a href="{{route('user.edit', ['user' => $user])}} "><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{route('user.edit', ['user' => $user])}} "><i
                                                    class="fa fa-money"></i></a>

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



