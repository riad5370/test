@extends('admin.include.master')
@section('body')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{route('guesthousepackege.index')}}">GuestHous Packege</a>
        </li>
        <li class="active">Packege Edit Information</li>
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
                        <h4 class="widget-title">Edit GuestHouse Packege</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                    <form action="{{route('guesthousepackege.update',$guesthousepackege->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     {{-- Donar name  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="head">Heding/packege Name :</label>

                        <div class="col-sm-9">
                            <input type="text" name="head" value="{{$guesthousepackege->head}}" id="head" placeholder="Header"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>
                     {{-- Donar name  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title">Title :</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" value="{{$guesthousepackege->title}}" id="title" placeholder="title"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="desp">Description :</label>

                        <div class="col-sm-9">
                            <textarea id="desp" name="details" 
                            class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 80px; width: 92%;">{{$guesthousepackege->details}}</textarea>
                            <br> <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="price">Price :</label>

                        <div class="col-sm-9">
                            <input type="number" name="price" value="{{$guesthousepackege->price}}" id="price" placeholder="price"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
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
@endsection
