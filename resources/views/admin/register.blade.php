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
                Create New User
            </h1>
        </section>
        <div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <!-- Main content -->
        <section class="content" style="margin-top: 20px">
            <form role="form" action="/admin/create-user" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input name="name" type="text" class="form-control" id="fullName"
                               placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" class="form-control"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="rePassword">Re-Password</label>
                        <input type="password" class="form-control" id="rePassword" name="rePassword"
                               placeholder="Re-Password">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                            style="padding: 10px 30px 10px 30px; font-size: 20px;">Create
                    </button>
                </div>
            </form>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>

@include('admin.footer')
</body>
</html>