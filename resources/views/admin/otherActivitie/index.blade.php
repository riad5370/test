@extends('admin.include.master')
@section('body')
<div class="container font">
    <?php
    $activitieProgramsCount = $activitieOthers->count();    
    ?>
    <h3 class="header smaller lighter blue d-inline">All Other Activities ({{ $activitieProgramsCount }})</h3> 
    <!-- div.dataTables_borderWrap -->
    <div>
        <form class="col-md-offset-3 text-right">
            <a href="{{route('activitieothers.create')}}" class="align-items-center btn btn-theme btn-primary">
                <i class="menu-icon fa fa-plus"></i> Add New
            </a>
        </form>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="row">
                <table id="example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=" ">S/N</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="service Name: activate to sort column ascending">Name</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="service Name: activate to sort column ascending">Title</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Details</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Image</th>
                    
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($activitieOthers as $activitie)
                        <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                            <td class="center">{{ $sn++ }}</td>
                            <td>{{ $activitie->name }}</td>
                            <td>{{ $activitie->title }}</td>
                            <td>{{ Str::limit($activitie->details, 40) }}</td>
                            <td>
                                <img width="50" src="{{ asset('images/activitieOther/' . $activitie->image) }}" alt="">
                            </td>
                            <td class="btn-group" style="display: flex; justify-content: center">
                                <a class="btn btn-sm btn-primary" href="{{ route('activitieothers.edit', $activitie->id) }}">Edit</a>
                                <form action="{{ route('activitieothers.destroy', $activitie->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
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