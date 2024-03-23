@extends('admin.include.master')
@section('body')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="menu-icon fa fa-globe"></i> The Latest
        </li>
        <li>
            <a href="{{route('latesphotos.index')}}">Photos</a>
        </li>
    </ul>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" id="error-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif

    <div class="col-12 col-md-12 col-xs-6">
        <div class="widget-box">
            <div class="widget-header">
                <div class="row">
                    <div class="col-md-6 col-6 col-xs-6">
                        <h4 class="widget-title">Edit Photo Album Info</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                    <form action="{{route('latesphotos.update',$latesphoto->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     {{-- Donar name  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title">year :</label>

                        <div class="col-sm-9">
                            <select name="year_id" id="" class="col-xs-12 col-md-11 col-sm-12">
                                <option value="">select year</option>
                                @foreach ($years as $year)
                                  <option value="{{$year->id}}" {{ ($year->id == $latesphoto->year_id?'selected':'') }}>{{$year->year}}</option>
                                @endforeach
                            </select>
                            <br> <br>
                        </div>
                    </div>
                     {{-- Donar name  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title">Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" value="{{$latesphoto->title}}" id="title" placeholder="title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="desp">Description :</label>

                        <div class="col-sm-9">
                            <textarea id="desp" name="details" 
                            class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 80px; width: 92%;">{{$latesphoto->details}}</textarea>
                            <br> <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="vdo_link">Video Link :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{$latesphoto->vdo_link}}" name="vdo_link" id="vdo_link" placeholder="vdo_link"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">Preview Image  :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple"><input type="file" name="image"
                                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                    data-title="Choose Logo..."><span class="ace-file-name"
                                                        data-title="No File ..."><i
                                                            class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a
                                                    class="remove" href="#"><i
                                                        class=" ace-icon fa fa-times"></i></a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <img height="145" id="blah" width="155" src="{{ asset('images/latest/photoAlbum/' . $latesphoto->image) }}"
                                        alt="Image">
                                </label>
                            </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">Gallery Image  :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple">
                                                <input type="file" name="albumGalleryImage[]" multiple onchange="previewImages(this)" />
                                                <span class="ace-file-container" data-title="Choose Images...">
                                                    <span class="ace-file-name" data-title="No Files...">
                                                        <i class="ace-icon ace-icon fa fa-cloud-upload"></i>
                                                    </span>
                                                </span>
                                                <a class="remove" href="#"><i class="ace-icon fa fa-times"></i></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <div id="image-preview-container">
                                    <label class="middle">
                                        @foreach ($photos as $photo)
                                            <img height="40" id="blah" width="40" src="{{ asset('images/latest/photoGalleryImg/' . $photo->albumGalleryImage) }}"
                                            alt="Image">
                                        @endforeach
                                    </label>
                                </div>
                            </span>
                        </div>
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-info">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImages(input) {
            var previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = ''; // Clear previous previews
    
            if (input.files) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        var imgElement = document.createElement('img');
                        imgElement.setAttribute('height', '40'); // Adjusted height
                        imgElement.setAttribute('width', '40');  // Adjusted width
                        imgElement.src = e.target.result;
    
                        previewContainer.appendChild(imgElement);
                    };
    
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
    
@endsection
