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
                Add New Event
            </h1>
        </section>
        <div class="has-error" style="margin-left: 20px">
            @if(!empty($message))
                @foreach ($message['content'] as $msg)
                    <span class="help-block">{{$msg}}</span>
                @endforeach
            @endif
        </div>
        <!-- Main content -->
        <section class="content" style="margin-top: 20px">
            <form role="form" action="/admin/events/create" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title Event</label>
                        <input name="title" type="text" class="form-control" id="title"
                               placeholder="Enter event">
                    </div>
                    <div class="form-group">
                        <label>Date Event Start:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="start-date" name="start-date" type="text"
                                   class="form-control pull-right datepicker">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date Event End:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="end-date" name="end-date" type="text" class="form-control pull-right datepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" name="description" type="text" class="form-control" id="description"
                               placeholder="Description">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                            style="padding: 10px 30px 10px 30px; font-size: 20px;">Add
                    </button>
                </div>
            </form>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>

@include('admin.footer')
<script src="../../admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
</script>
</body>
</html>