@extends('admin.include.master')
@section('body')


<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="menu-icon fa fa-info-circle"></i> About Us
            </li>
            <li>Donar</li>
            <li class="active" style="font-weight: bold;">Add Donar Information</li>
            <li>
                <a href="{{route('donars.index')}}">Go Donar List</a>
            </li>
        </ul>
    </div>

    <div class="page-content font">

        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
               @endif
               @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('donars.store')}}"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Donar name  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Name :</label>

                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" placeholder="Donar Name"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>

                    {{-- Donar title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title">Donar Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" id="title" placeholder="Donar title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>

                     {{-- Donar title  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="social_link">Donar social link :</label>

                        <div class="col-sm-9">
                            <input type="text" name="social_link" id="social_link" placeholder="Social Link"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>


                    {{-- donar image --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">Slider Image :</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple"><input type="file" name="image"
                                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                    data-title="Choose Slider Image..."><span class="ace-file-name"
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
                                    <img height="145" id="blah" width="155" src="{{ asset('images/temp.jpg') }}"
                                        alt="Slider Image">
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
                            Create
                        </button>
                    </div>
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
@endsection
