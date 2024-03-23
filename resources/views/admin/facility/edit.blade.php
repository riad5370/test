@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li><i class="menu-icon fa fa-info-circle"></i> About Us</li>
            <li>
                <a href="{{route('facilities.index')}}">Facilities</a>
            </li>
            <li class="active">Edit Facilities Information</li>
        </ul><!-- /.breadcrumb -->
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-content font">

        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
               @endif
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('facilities.update',$facility->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- activitie title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="slider_name">Facility Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" value="{{$facility->title}}" id="name" placeholder="Facility Title "
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>

                    {{-- activitie title  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="slider_name">Facility Icon :</label>

                        <div class="col-sm-9">
                            <input type="text" name="icon" value="{{$facility->icon}}" id="name" placeholder="Icon "
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
                                style="height: 80px; width: 92%;">{{$facility->details}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
