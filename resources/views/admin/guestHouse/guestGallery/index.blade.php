@extends('admin.include.master')
@section('body')
<div class="container font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li class="active"><i class="menu-icon fa fa-bed"></i> GuestHouse</li>
            <li class="active" style="font-weight: bold;">Guest Gallery Image</li>
        </ul>
    </div>
    <div class=
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
                <form class="form-horizontal" role="form" method="POST" action="{{route('gursthouesegallerysimg.store')}}"
                    enctype="multipart/form-data">
                    @csrf

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
            </div>
        </div>
    </div>
    <?php
    $activitieProgramsCount = $guestGalleys->count();    
    ?>
    <!-- div.dataTables_borderWrap -->
    @if (session('delete'))
    <div class="alert alert-success">{{session('delete')}}</div>
   @endif
    <div>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <div class="row">
                <div class="table-header">
                    All GuestHouse Gallery Image ({{ $activitieProgramsCount }})
                </div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=" ">S/N</th>
                            <th class=" center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="service Name: activate to sort column ascending">Image</th>
                            <th class=" center sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($guestGalleys as $activitie)
                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                <td class="center">{{ $sn++ }}</td>
                                <td class="text-center">
                                    <img width="50" class="mx-auto d-block" src="{{ asset('images/guestHouseGallery/' . $activitie->image) }}" alt="">
                                </td>
                                
                                <td class="btn-group" style="display: flex; justify-content: center">
                                    <form action="{{ route('gursthouesegallerys.destroy',$activitie->id) }}" method="POST">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This!')">
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