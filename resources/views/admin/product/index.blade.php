@extends('admin.include.master')

@section('body')
    <div class="col-xs-12">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <?php
        $productCount = $products->count();    
        ?>
        <form class="col-md-offset-3 text-right">
            <a href="{{route('products.create')}}" class="align-items-center btn btn-theme btn-success" style="margin-bottom:2px;">
                <i class="menu-icon fa fa-plus"></i> Add New
            </a>
        </form>
        @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="table-header">
            All Products ({{ $productCount }})
        </div>
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">S/N</th>
                        <th class="center">Category</th>
                        <th class="center">Name</th>
                        <th class="center">Price</th>
                        <th class="center">Preview</th>
                        <th class="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $sn = 1;
                    @endphp
                    @foreach ($products as $product)
                        <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                            <td class="center">{{ $sn++ }}</td>
                            <td class="center">{{ $product->category->name ?: 'Unknown Category' }}</td>
                            <td class="center">{{ $product->name ?: 'null' }}</td>
                            <td class="center">{{ $product->price ?: 'null' }}</td>
                            <td class="center">
                                <img width="50" src="{{ asset('images/products/preview/' . $product->preview) }}" alt="">
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">
                                   
                                    <a class="green" href="{{ route('products.edit', $product->id) }}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    
                                    <i class="red ace-icon fa fa-trash-o bigger-130" onclick="confirmAndSubmit({{ $product->id }})"></i>
                                </div>
                            </td>
                            {{-- <td class="btn-group" style="display: flex; justify-content: center">
                                <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This!')">
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                  null, null, null, null, 
                  { "bSortable": false }
                ],
                
            } );
        })
    </script>
    <script>
        function confirmAndSubmit(productId) {
            if (confirm('Are You Sure Delete This!')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>
@endpush
