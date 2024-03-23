@extends('admin.include.master')
@section('body')
<div class="main-content-inner font">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="menu-icon fa fa-shopping-cart"></i> Product Area
            </li>
            <li class="active">Category Information</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content font">
        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" method="POST" action="{{route('categories.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Category name  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Category Name :</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" placeholder="Category Name"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                            <span>
                                @error('title')
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
            </div>
        </div>
    </div>
</div>

<div class="container font">
    <?php
    $categoryCount = $categories->count();    
    ?>
    <!-- div.dataTables_borderWrap -->
    <div>
        @if (session('delete'))
        <div class="alert alert-success">{{session('delete')}}</div>
        @endif
    @if (session('update'))
    <div class="alert alert-success">{{session('update')}}</div>
    @endif

        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <div class="row">
                <div class="table-header">
                    All Category ({{ $categoryCount }})
                </div>
                <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer"
                    role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=" ">
                                S/N
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1"
                                colspan="1" aria-label="service Name: activate to sort column ascending">Category Name
                            </th>
                            
                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                aria-label="Status: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                <td class="center">
                                    {{ $sn++ }}
                                </td>
                                <td>{{ $category->name }}</td>
                                <td class="btn-group" style="display: flex ; justify-content: center">
                                    <a class="btn btn-sm btn-primary" href="{{route('categories.edit',$category->id)}}">Edit</a>
                                   
                                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
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