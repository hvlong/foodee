<!DOCTYPE html>
<html>
@include('admin.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.header')
@include('admin.sidebar')
<?php $userList = isset($users) ? $users : array();?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User List
            </h1>
            <ol class="breadcrumb">
                <button type="button" class="btn btn-block btn-primary btn-lg">Add User</button>
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
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Create at</th>
                                <th>Role</th>
                                <th>Is Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $counter = 0;?>
                            <?php foreach ($userList as $user) :?>
                            <tr>
                                <?php $counter++?>
                                <td><?php echo $counter ?></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo $user->name ?></td>
                                <td><?php echo $user->created_at ?></td>
                                <td> Admin</td>
                                <td>active</td>
                                <td>
                                    <i class="fa fa-edit"></i>
                                </td>
                                <td>
                                    <i class="glyphicon glyphicon-remove" style="color: red"></i>
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