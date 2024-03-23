@extends('admin.include.master')
@section('body')


<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="">Home</a>
            </li>
            <li class="active">Edit slider Information</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content font">

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('sliders.update',$slider->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- service name  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="slider_name">Service Name :</label>

                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" value="{{$slider->name}}" placeholder="slider Name"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- slider image --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">slider Image :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple"><input type="file"
                                                    id="imageInput" name="image" accept=".jpg, .jpeg, .png,gif"
                                                    onchange="previewImage()" /><span class="ace-file-container"
                                                    data-title="Choose sliders Image..."><span class="ace-file-name"
                                                        data-title="No File ..."><i
                                                            class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a
                                                    class="remove" href="#"><i
                                                        class=" ace-icon fa fa-times"></i></a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle" id="imagePreviewLabel">
                                    <img height="145" width="155" src="{{asset('image/slider/'.$slider->image)}}"
                                        alt="slider Image">
                                </label>
                            </span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
