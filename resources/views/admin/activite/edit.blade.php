@extends('admin.include.master')
@section('body')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">We Do</li>
        <li>
            <a href="{{route('activities.index')}}">Go We Do List</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="col-12 col-md-12 col-xs-6">
    <div class="widget-box">
        <div class="widget-header">
            <div class="row">
                <div class="col-md-6 col-6 col-xs-6">
                    <h4 class="widget-title">Edit We Do Info</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{route('activities.update',$activity->id)}}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- activitie title  --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="title">Title :</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$activity->title}}" name="title" id="title" placeholder="Activite Title"
                            class="col-xs-12 col-md-11 col-sm-12" />
                        <br> <br>
                        <span>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>
                {{-- Supporter heade tag --}}
                 
                {{-- About Supporter --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="about">Activitie Description
                        :</label>
                    <div class="col-sm-9">
                        <textarea id="about" name="about" placeholder="Write details about activitie" class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 150px; width: 92%;">{{$activity->about}}</textarea>
                        <span>
                            @error('about')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>
              {{-- supporter Image --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="image">Image :</label>
                    <div class="col-sm-9">
                        <div class="col-sm-5">
                            <div class="widget-body">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-12">
                                        <label class="ace-file-input ace-file-multiple">
                                            <input type="file"
                                                id="imageInput" name="image"
                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                data-title="Choose Activitie Image..."><span class="ace-file-name"
                                                    data-title="No File ..."><i
                                                        class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a
                                                class="remove" href="#"><i
                                                    class=" ace-icon fa fa-times"></i></a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="help-inline col-xs-12 col-sm-7">
                            <label class="middle">
                                <img height="145" id="blah" width="155" src="{{ asset('images/activitie/'.$activity->image) }}"
                                    alt="Activitie Image">
                            </label>
                        </span>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Create
                        </button>
                    </div>
                </div>
            </div>
            </form>
            
        </div>
    </div>
</div>
@endsection
