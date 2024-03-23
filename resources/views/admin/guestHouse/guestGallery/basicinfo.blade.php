@extends('admin.include.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('body')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li class="active"><i class="menu-icon fa fa-bed"></i> GuestHouse</li>
        <li class="active" style="font-weight: bold;">Basic Info</li>
    </ul>
</div>
<div class="col-12 col-md-12 col-xs-6">
    <div class="widget-box">
        <div class="widget-header">
            <div class="row">
                <div class="col-md-6 col-6 col-xs-6">
                    <h4 class="widget-title">Update Guest House Basic Information</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
              
            <form class="form-horizontal" role="form" method="POST" action="{{route('gursthouesegallerys.store')}}"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$activitiebasic->id}}">
            {{-- activitie title  --}}
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="slider_name">Guest House Slide Name :</label>

                <div class="col-sm-9">
                    <input type="text" name="name" value="{{ $activitiebasic ? $activitiebasic->name : '' }}" id="name" placeholder="Guest House Slide Name"
                        class="col-xs-12 col-md-11 col-sm-12" />
                    <br> <br>
                </div>
            </div>
            {{-- activitie title  --}}
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="slider_name">Guest House Slide Title :</label>

                <div class="col-sm-9">
                    <input type="text" name="title" value="{{ $activitiebasic ? $activitiebasic->title : '' }}" id="name" placeholder="Guest House Slide Title"
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
                        style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->details : '' }}</textarea>
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
                            <img height="145" id="blah" width="155" src="{{ asset('images/basicGallery/'.$activitiebasic->image) }}"
                                alt="Image">
                        </label>
                    </span>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


             {{-- activitie icon  --}}
             <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">Guest House Slide Down Details :</label>

                <div class="col-sm-8">
                    <textarea id="summer" name="slideDownDetails" placeholder="slideDownDetails" class="col-xs-12 col-md-11 col-sm-12"
                    style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->slideDownDetails : '' }}</textarea>
                </div>
            </div>


            {{-- activitie icon  --}}
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">Guest House Video Link :</label>

                <div class="col-sm-9">
                    <input type="text" name="vdo_link" value="{{ $activitiebasic ? $activitiebasic->vdo_link : '' }}" placeholder="Activitie Video Link"
                        class="col-xs-12 col-md-11 col-sm-12" />
                    <br> <br>
                </div>
            </div>

             {{-- activitie icon  --}}
             <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">Guest House Packege two Image Header :</label>

                <div class="col-sm-9">
                    <textarea id="description" name="bottom_content" placeholder="Guest House Packege two Image Header" class="col-xs-12 col-md-11 col-sm-12"
                    style="height: 80px; width: 92%;">{{ $activitiebasic ? $activitiebasic->bottom_content : '' }}</textarea>
                </div>
            </div>
            

           <div class="form-group">
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
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    {{-- summernote --}}
    <script>
        $(document).ready(function() {
            $('#summer').summernote();
        });

    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });

    </script>
@endpush