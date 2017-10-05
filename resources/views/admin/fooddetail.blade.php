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
                Food Detail
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
            <form role="form" action="/admin/edit-food/{!!$food->id!!}" method="get">
                <div class="box-body">
                    <div>
                        <img src="{{ asset('storage/foods/' . $food->thumbnail)}}" width="150">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Food</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" disabled
                               value="{!! $food->name !!}"
                               placeholder="Enter name food">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input id="price" name="price" type="text" class="form-control" id="exampleInputPassword1"
                               placeholder="Price VND" disabled value="{!! $food->price !!}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="textarea" placeholder="Description"
                                  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                  disabled> {!! $food->description !!}
                        </textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input disabled name="is-feature" type="checkbox" value="1"
                                   @if(($food->is_feature) === 1) checked @else '' @endif > Is Feature
                        </label>
                    </div>
                    <div>
                        <label>Category:</label>
                        <span>{!! $nameCategory !!}</span>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                            style="padding: 10px 30px 10px 30px; font-size: 20px;">Edit
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