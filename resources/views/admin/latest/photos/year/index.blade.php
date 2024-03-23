@extends('admin.include.master')
@section('body')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="menu-icon fa fa-globe"></i> The Latest
        </li>
        <li class="active" style="font-weight: bold;">Year</li>
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
                        <h4 class="widget-title">Generate Year</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                    <form action="{{route('year.photostore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Year :</label>

                        <div class="col-sm-7">
                            <input type="number" name="year" id="name" placeholder="Year"
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


    {{-- <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" /> --}}
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                @if (session('delete'))
                    <div class="alert alert-success" id="success-alert">{{ session('delete') }}</div>
                @endif
                <div class="row" style="margin: 3px;">
                    <div class="col-md-12">
                        <div class="col-xs-12">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">Si</th>
                                        <th class="center">Year</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($years as $key => $year)
                                        <tr>
                                            <td class="center">{{$key+1}}</td>
                                            <td class="center">{{$year->year}}</td>
                                            <td class="btn-group" style="display: flex ; justify-content: center">
                                                <form action="{{ route('year.delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$year->id}}">
                                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm"  onclick="return confirm('Are You Sure Delete This!')">
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
