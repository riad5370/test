@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li class="active">Edit Company Primary Information</li>
        </ul><!-- /.breadcrumb -->
    </div>
    <!-- end breadcrumb --> 

    <div class="page-content font">
        <div class="row">
            <div class="col-xs-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                  <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('widgets.update')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $widget ? $widget->id : '' }}">

                    {{-- about headline  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title">Company Title :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{ $widget ? $widget->title : '' }}" name="title" id="title" placeholder="Company title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                     {{-- about Description  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="desp">Company Description :</label>

                        <div class="col-sm-9">
                            <textarea id="desp" name="description" 
                            class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 150px; width: 92%;">{{ $widget ? $widget->description : '' }}</textarea>
                            <br> <br>
                            <span>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- about image --}}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image"> Image :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple"><input type="file"
                                                    id="imageInput" name="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                    data-title="Choose Company Image..."><span class="ace-file-name"
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
                                    <img height="145" id="blah" width="155" src="{{ $widget && $widget->image ? asset('images/about/'.$widget->image) : '' }}"
                                        alt="About Image">
                                </label>
                            </span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- email  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="email">Email :</label>

                        <div class="col-sm-9">
                            <input type="email" value="{{ $widget ? $widget->email : '' }}" name="email" id="email" placeholder="email"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- Contact number --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="number">Number :</label>

                        <div class="col-sm-9">
                            <input type="number" value="{{ $widget ? $widget->number : '' }}" name="number" id="number" placeholder="number"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- address --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="address">Address :</label>

                        <div class="col-sm-9">
                            <textarea id="address" name="address" 
                            class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 80px; width: 92%;">{{ $widget ? $widget->address : '' }}</textarea>
                            <br> <br>
                            <span>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    {{-- fb_link link --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="map">Fb link :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{ $widget ? $widget->fb_link : '' }}" name="fb_link" id="map" placeholder="fb link here"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('fb_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    {{-- youtube_link link --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="map">Youtube link :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{ $widget ? $widget->youtube_link : '' }}" name="youtube_link" id="map" placeholder="youtube link here"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('youtube_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- google map link --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="map">Map link :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{ $widget ? $widget->map_link : '' }}" name="map_link" id="map" placeholder="map link here"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('map_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
