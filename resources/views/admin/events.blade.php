<!DOCTYPE html>
<html>
@include('admin.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.header')
@include('admin.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Food List
            </h1>
            <ol class="breadcrumb">
                <button onclick="location.href='{{ url('admin/events/create') }}'" type="submit"
                        class="btn btn-block btn-primary btn-lg">Add Food
                </button>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="margin-top: 20px">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter = 0)
                            @foreach($events as $event)
                                @php($counter++)
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{$event->title}}</td>
                                    <td>{{$event->date_start}}</td>
                                    <td>{{$event->date_end}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->status}}</td>
                                    <td>
                                        <a>
                                            <i id="edit-img" class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            <i class="glyphicon glyphicon-remove" style="color: red"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
@include('admin.footer')
</body>
</html>