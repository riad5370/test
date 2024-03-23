@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <!-- /.breadcrumb-list -->
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>Home</li>
            <li class="active">CeoInfo</li>
            <li>Edit Ceo Information</li>
        </ul>
    </div>
    <!-- end breadcrumb --> 

    <div class="page-content font">
        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('ceos.update')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$ceo->first()->id}}">
                    {{-- Name --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Name :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{$ceo->first()->name}}" name="name" id="name" placeholder="name"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Title :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{$ceo->first()->title}}" name="title" id="title" placeholder="Title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                     {{-- Description  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="desp"> Description :</label>

                        <div class="col-sm-9">
                            <textarea id="desp" name="description" 
                            class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 150px; width: 92%;">{{$ceo->first()->description}}</textarea>
                            <br> <br>
                            <span>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- Video link --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="vdo_link">Video link :</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{$ceo->first()->vdo_link}}" name="vdo_link" id="vdo_link" placeholder="Video link here"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('vdo_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- about image --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">Image :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple"><input type="file"
                                                    id="imageInput" name="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                    data-title="Choose Ceo Image..."><span class="ace-file-name"
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
                                    <img height="145" id="blah" width="155" src="{{asset('images/ceo/'.$ceo->first()->image)}}"
                                        alt="Ceo Image">
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
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

