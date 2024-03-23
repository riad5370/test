@extends('admin.include.master')
@section('body')
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
                        <h4 class="widget-title">Guest House Basic Image</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                    <form action="{{route('guest.edtable.image.update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $logo ? $logo->id : '' }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="image">Image One  :</label>
                                <div class="col-sm-9">
                                    <div class="col-sm-5">
                                        <div class="widget-body">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-md-12">
                                                    <label class="ace-file-input ace-file-multiple"><input type="file" name="imageOne"
                                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                            data-title="Choose Logo..."><span class="ace-file-name"
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
                                            <img height="145" id="blah" width="155" src="{{ asset('images/guetHouseEditableImage/folder1/'.($logo->imageOne??'')) }}"
                                                alt="Image">
                                        </label>
                                    </span>
                                    @error('imageOne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             {{-- image-two --}}
                             <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="image">Image Two  :</label>
                                <div class="col-sm-9">
                                    <div class="col-sm-5">
                                        <div class="widget-body">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-md-12">
                                                    <label class="ace-file-input ace-file-multiple"><input type="file" name="imageTwo"
                                                            onchange="document.getElementById('blahh').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                            data-title="Choose Logo..."><span class="ace-file-name"
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
                                            <img height="145" id="blahh" width="155" src="{{ asset('images/guetHouseEditableImage/folder2/'.($logo->imageTwo??'')) }}"
                                                alt="Image">
                                        </label>
                                    </span>
                                    @error('imageTwo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="image">Image Three  :</label>
                                <div class="col-sm-9">
                                    <div class="col-sm-5">
                                        <div class="widget-body">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-md-12">
                                                    <label class="ace-file-input ace-file-multiple"><input type="file" name="imageThree"
                                                            onchange="document.getElementById('blahhh').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                            data-title="Choose Logo..."><span class="ace-file-name"
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
                                            <img height="145" id="blahhh" width="155" src="{{ asset('images/guetHouseEditableImage/folder3/'.($logo->imageThree??'')) }}"
                                                alt="ImageThree">
                                        </label>
                                    </span>
                                    @error('imageThree')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             {{-- image-two --}}
                             <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="image">Image Four  :</label>
                                <div class="col-sm-9">
                                    <div class="col-sm-5">
                                        <div class="widget-body">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-md-12">
                                                    <label class="ace-file-input ace-file-multiple"><input type="file" name="imageFour"
                                                            onchange="document.getElementById('blahhhh').src = window.URL.createObjectURL(this.files[0])" /><span class="ace-file-container"
                                                            data-title="Choose Logo..."><span class="ace-file-name"
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
                                            <img height="145" id="blahhhh" width="155" src="{{ asset('images/guetHouseEditableImage/folder4/'.($logo->imageFour??'')) }}"
                                                alt="Image">
                                        </label>
                                    </span>
                                    @error('imageFour')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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


    {{-- <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" /> --}}
     
    
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dynamic-table').DataTable();
            });
        </script>
        <script>
            $.noConflict();
            jQuery(document).ready(function($)
     {
                $('#dynamic-table').DataTable();
            });
        </script>
    
    <script>
        window.onload = function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000);
            }
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000);
            }
        };
    </script> --}}

@endsection
