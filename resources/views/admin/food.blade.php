<!DOCTYPE html>
<html>
@include('admin.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.header')
@include('admin.sidebar')
<?php $foodList = isset($foods) ? $foods : array();?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Food List
            </h1>
            <ol class="breadcrumb">
                <button onclick="location.href='{{ url('admin/addfood') }}'" type="submit"
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
                            <?php $counter = 0;?>
                            <?php foreach ($foodList as $food) :?>
                            <tr onclick="location.href='{{ url('admin/food-detail') }}' + '/<?php echo $food->id?>'">
                                <?php $counter++?>
                                <td><?php echo $counter ?></td>
                                <td><?php echo $food->name ?></td>
                                <td><?php echo number_format(($food->price / 100), 3)?>VND</td>
                                <td><?php echo $food->thumbnail ?></td>
                                <td><?php echo $food->description ?></td>
                                <td><?php echo $food->is_feature ?></td>
                                <td>
                                    <a href="{{ url('admin/edit-food')}}<?php echo '/' . $food->id?>">
                                        <i id="edit-img" class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/delete-food')}}<?php echo '/' . $food->id?>">
                                        <i class="glyphicon glyphicon-remove" style="color: red"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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