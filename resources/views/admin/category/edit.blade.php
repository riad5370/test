@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{route('categories.index')}}">Category</a>
            </li>
            <li class="active">Edit Category Information</li>
        </ul>
    </div>
    <div class="page-content font">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('categories.update',$category->id)}}">
                    @csrf
                    @method('PUT')
                    {{--  name  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Name :</label>

                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$category->name}}" placeholder="slider Title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            save
                        </button>
                    </div>
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

 {{-- live image preview  --}}
 <script>
    function previewImage() {
        var input = document.getElementById('imageInput');
        var previewLabel = document.getElementById('imagePreviewLabel');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                previewLabel.innerHTML = '<img src="' + e.target.result +
                    '" alt="Image Preview" style="max-width:155px;max-height:145px;">';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            previewLabel.innerHTML = '<span class="lbl"> Image Preview</span>';
        }
    }
</script>









@endsection
