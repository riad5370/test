@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{route('sliders.index')}}">Slider</a>
            </li>
            <li class="active">Add Menu Information</li>
        </ul><!-- /.breadcrumb -->
    </div>
    <div class="page-content font">

        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('sliders.store')}}"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- slider title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="slider_name">Slider Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" id="name" placeholder="slider title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- slider mini description --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description">About
                            :</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="description" placeholder="Write details about slider" class="col-xs-12 col-md-11 col-sm-12"
                                style="height: 150px; width: 92%;"></textarea>
                            <span>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
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
