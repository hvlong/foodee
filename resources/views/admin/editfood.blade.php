<!DOCTYPE html>
<html>
@include('admin.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.header')
    @include('admin.sidebar')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit food
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
            <form role="form" method="post" enctype="multipart/form-data" action="/admin/edit-food/{!! $food->id !!}">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Food</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                               value="{!! $food->name !!}"
                               placeholder="Enter name food">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input id="price" name="price" type="text" class="form-control" id="exampleInputPassword1"
                               placeholder="Price VND" value="{!! $food->price !!}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="textarea" placeholder="Description"
                                  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {!! $food->description !!}
                        </textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="is-feature" type="checkbox" value="1"
                                   @if(($food->is_feature) === 1) checked @else '' @endif > Is Feature
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            @foreach ($categoryFoods as $key => $item)
                                <option @if($item->id == $categorySelected->id) selected="selected"
                                        @endif value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <img id="thumbnail-img-tag" src="{{ asset('storage/foods/' . $food->thumbnail)}}" width="150">
                        <input id="thumbnail-img" style="margin-top: 10px" type="file" id="exampleInputFile"
                               name="thumbnail"
                               accept="image/*">
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