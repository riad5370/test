@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li class="">About Us</li>
            <li class="">Basic Info</li>
            <li class="active">
                <a href="">Basic Content</a>
            </li>
            <li class="active">Edit About Basic Information</li>
        </ul>
        <!-- /.breadcrumb -->
    </div>
    
    <div class="page-content font">

        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
               @endif
               
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('aboutbasics.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$activitiebasic->id??''}}">
                    {{-- activitie title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="slider_name">About Slide Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" value="{{ $activitiebasic ? $activitiebasic->title : '' }}" id="name" placeholder="Activitie Name / Title "
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
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
                                    <img height="145" id="blah" width="155" src="{{ asset('images/basicAbout/'.($activitiebasic->image??'')) }}"
                                        alt="Image">
                                </label>
                            </span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                     {{-- slider mini description --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description">Description Who we are
                            :</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="we_are_content" placeholder="Write details" class="col-xs-12 col-md-11 col-sm-12"
                                style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->we_are_content : '' }}</textarea>
                        </div>
                      </div>

                    {{-- Home page who we do description --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description">Description Who we do home page
                            :</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="we_do_content" placeholder="Write details" class="col-xs-12 col-md-11 col-sm-12"
                                style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->we_do_content : '' }}</textarea>
                        </div>
                      </div>

                      {{-- missin description --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description">Description Our Mission
                            :</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="missionContent" placeholder="Write details" class="col-xs-12 col-md-11 col-sm-12"
                                style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->missionContent : '' }}</textarea>
                        </div>
                      </div>
                        {{-- vishion description --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description">Description Our Mission
                            :</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="vishionContent" placeholder="Write details" class="col-xs-12 col-md-11 col-sm-12"
                                style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->vishionContent : '' }}</textarea>
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
