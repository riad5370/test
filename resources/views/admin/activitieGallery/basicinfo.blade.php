@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="menu-icon fa fa-heartbeat"></i> Activities
            </li>
            <li class="active" style="font-weight: bold;">Edit Activitie Basic Information</li>
        </ul>
    </div>
    
    <div class="page-content font">

        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
               @endif
               
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('activitiebasics.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$activitiebasic->id}}">
                    {{-- activitie title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="slider_name">Activitie Slide Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" value="{{ $activitiebasic ? $activitiebasic->title : '' }}" id="name" placeholder="Activitie Name / Title "
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>

                    {{-- slider mini description --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description">Description
                            :</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="details" placeholder="Write details" class="col-xs-12 col-md-11 col-sm-12"
                                style="height: 150px; width: 92%;">{{ $activitiebasic ? $activitiebasic->details : '' }}</textarea>
                        </div>
                    </div>

                    {{-- slider image --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">Image :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple"><input type="file" name="image"
                                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                    data-title="Choose Image..."><span class="ace-file-name"
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
                                    <img height="145" id="blah" width="155" src="{{ asset('images/basicActivitie/'.$activitiebasic->image) }}"
                                        alt="Slider Image">
                                </label>
                            </span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- activitie icon  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Activitie Gallery Image Header :</label>

                        <div class="col-sm-9">
                            <input type="text" name="gallery_header" value="{{ $activitiebasic ? $activitiebasic->gallery_header : '' }}" placeholder="Activitie Gallery Image Header"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>

                     {{-- activitie icon  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Activitie Video Header :</label>

                        <div class="col-sm-9">
                            <input type="text" name="vdo_header" value="{{ $activitiebasic ? $activitiebasic->vdo_header : '' }}" placeholder="Activitie Video Header"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>
                    {{-- activitie icon  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Activitie Video Link :</label>

                        <div class="col-sm-9">
                            <input type="text" name="vdo_link" value="{{ $activitiebasic ? $activitiebasic->vdo_link : '' }}" placeholder="Activitie Video Link"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>

                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
