@extends('admin.include.master')
@section('body')
<div class="container font">
    <?php
    $activityCount = $activities->count();    
    ?>
    <h3 class="header smaller lighter blue">All We Do ({{ $activityCount }})</h3>
    <!-- div.dataTables_borderWrap -->
    <div>

        {{-- message --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @if (session('success'))
            <div id="autoCloseAlert" class="alert alert-success">
                {{ session('success') }}     
            </div>

            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        $("#autoCloseAlert").alert('close');
                    }, 5000);
                });
            </script>
        @endif
        <form class="col-md-offset-3 text-right">
            <a href="{{ route('activities.create') }}" class="align-items-center btn btn-theme btn-primary">
                <i class="menu-icon fa fa-plus"></i> Add New
            </a>
        </form>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <div class="row">
                <table id="example" class="table table-striped table-bordered table-hover dataTable no-footer"
                    role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=" ">
                                S/N
                            </th>
                            <th class="sorting_disabled center" tabindex="0" aria-controls="dynamic-table" rowspan="1"
                                colspan="1" aria-label="service Name: activate to sort column ascending">Title
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1"
                            colspan="1" aria-label="service Name: activate to sort column ascending">Description
                            </th>
                            <th class="sorting_disabled center" rowspan="1" colspan="1"
                               aria-label="Status: activate to sort column ascending">Image
                            </th>
                            <th class="sorting_disabled center" rowspan="1" colspan="1"
                                aria-label="Status: activate to sort column ascending">Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($activities as $activity)
                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                <td class="center">
                                    {{ $sn++ }}
                                </td>
                                <td class="center">{{ $activity->title }}</td>
                                <td>{{ Str::limit($activity->about, 40) }}</td>
                                <td class="center">
                                    @if ($activity->image)
                                        <img src="{{ asset('images/activitie/' . $activity->image) }}"
                                            alt="{{ $activity->name }}" style="max-width: 50px; max-height: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="btn-group" style="display: flex; justify-content: center">
                                    <a class="btn btn-sm btn-primary mx-1" href="{{ route('activities.edit', $activity->id) }}">Edit</a>
                                   
                                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
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
