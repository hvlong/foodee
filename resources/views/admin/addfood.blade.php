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
                Add New Food
            </h1>
        </section>

        <div class="has-error" style="margin-left: 20px; margin-top: 10px;">
            @if(session('message'))
                @php($message = session('message'))
                @if($message['type'] === 'Success')
                    <div class="alert alert-success">
                        @foreach ($message['content'] as $msg)
                            {{$msg}}
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-error">
                        @foreach ($message['content'] as $msg)
                            {{$msg}}<br>
                        @endforeach
                    </div>
                @endif
            @endif

        </div>
        <!-- Main content -->
        <section class="content" style="margin-top: 20px">
            <form role="form" action="/admin/addfood" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Food</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                               value="{{ old('name') }}"
                               placeholder="Enter name food">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input id="price" name="price" type="text" class="form-control" id="exampleInputPassword1"
                               placeholder="Price VND" value="{{ old('price')  }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea name="description" class="textarea" placeholder="Description"
                                  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="is-feature" type="checkbox" value="1"> Is Feature
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            @foreach ($categoryFoods as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label></br>
                        <img id="thumbnail-img-tag" width="150">
                        <input id="thumbnail-img" style="margin-top: 10px" type="file" id="exampleInputFile"
                               name="thumbnail"
                               accept="image/*">
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumbnail-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#thumbnail-img").change(function () {
        readURL(this);
    });
</script>
</body>
</html>