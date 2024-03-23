@extends('admin.include.master')
@section('body')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li class="">About Us</li>
        <li class="">Basic Info</li>
        <li class="active">
            <a href="">Who We Are Image</a>
        </li>
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
                    <h4 class="widget-title">Generate Image</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
            <div class="col-12 col-md-12 col-xs-12 col-sm-12">
                <form action="{{ route('weare.image') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image">We Are Image:</label>
                        <div class="col-sm-9">
                            <div class="col-sm-5">
                                <div class="widget-body">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="ace-file-input ace-file-multiple">
                                                <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                                                <span class="ace-file-container" data-title="Choose Image...">
                                                    <span class="ace-file-name" data-title="No File ...">
                                                        <i class="ace-icon ace-icon fa fa-cloud-upload"></i>
                                                    </span>
                                                </span>
                                                <a class="remove" href="#"><i class="ace-icon fa fa-times"></i></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <img height="145" id="blah" width="155" src="{{ asset('images/temp.jpg') }}" alt="Image">
                                </label>
                            </span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
</div>

<div class="col-12 col-md-12 col-xs-12">
    <div class="widget-box">
        <div class="row" style="margin: 3px;">
            <div class="col-md-12" style="padding:10px 0px">
                <div class="col-xs-12">
                    <div class="table-header">
                        Who We Are Image List
                    </div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">Si</th>
                                <th class="center">Image</th>
                                <th class="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($weAres as $key => $weAre)
                                <tr>
                                    <td class="center">{{ $key + 1 }}</td>
                                    <td class="center">
                                        <img width="50" class="mx-auto d-block" src="{{ asset('images/weAre/' . $weAre->image) }}" alt="">
                                    </td>
                                    <td class="btn-group" style="display: flex ; justify-content: center">
                                        <form action="{{ route('weare.destroy', $weAre->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This!')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <!-- page specific plugin scripts -->
    <script src="{{ asset('admin-asset/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            //initiate dataTables plugin
            var myTable = 
            $('#dynamic-table')
            .DataTable( {
                bAutoWidth: false,
                "aoColumns": [
                  { "bSortable": false },
                  null, 
                  { "bSortable": false }
                ],
                
            } );
        })
    </script>
@endpush
