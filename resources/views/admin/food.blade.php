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
                <button onclick="location.href='{{ url('admin/foods/create') }}'" type="submit"
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
                                <th>Name Food</th>
                                <th>Price</th>
                                <th>Thumbnail</th>
                                <th>Description</th>
                                <th>Is Feature</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($foods))
                                @php($counter = 0)
                                @foreach($foods as $food)
                                    <tr onclick="location.href='{{ url('admin/foods/') }}'{{$food->id}}">
                                        @php($counter++)
                                        <td>{{$counter}}</td>
                                        <td><a href="{{ url('admin/foods')}}/{{$food->id}}">{{$food->name}}</a></td>
                                        <td>{{number_format(($food->price / 100), 3)}}VND</td>
                                        <td>{{$food->thumbnail}}</td>
                                        <td>{{$food->description}}</td>
                                        <td>{{$food->is_feature}}</td>
                                        <td>
                                            <a href="{{ url('admin/foods')}}/{{$food->id}}/edit">
                                                <i id="edit-img" class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form role="form" method="post" enctype="multipart/form-data"
                                                  action="{{ url('admin/foods')}}/{{$food->id}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit">
                                                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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