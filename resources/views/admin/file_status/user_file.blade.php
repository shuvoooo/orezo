@extends('layouts.admin-base')


@section('title', 'File Status')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h4">File Status</div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb py-0 my-0">
                            @foreach(range(request('year')-1, request('year')+1 ) as $year)
                                <li class="breadcrumb-item @if($year == request('year')) active @endif ">
                                    @if($year != request('year'))
                                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['user'=>$user->id, 'year'=>$year])}}">
                                            {{$year}}
                                        </a>
                                    @else
                                        {{$year}}
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="file_status_name" class="text-dark">Update File Status of "{{$user->name}}
                                "</label>

                            <form method="post"
                                  action="{{route('admin.file_status.add_file_status',['user'=>$user->id,'year'=>request('year')])}}">
                                @csrf
                                <div class="input-group">

                                    <select class="form-control" id="filter-status" name="status">
                                        <option value="">Select Status</option>
                                        @foreach($statuses as $key=>$status)
                                            <option value="{{ $key}}">{{ $status }}</option>
                                        @endforeach
                                    </select>

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>

                                </div>

                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </form>
                        </div>
                        <div class="offset-md-8"></div>
                        <div class="col-12">
                            <h5 class="py-3 font-weight-light">File Status</h5>
                        </div>


                        <div class="col-12">
                            {{$dataTable->table()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"/>

    <style>
        .breadcrumb-item + .breadcrumb-item::before {
            content: "|";
        }

    </style>
@endsection

@push('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{$dataTable->scripts()}}
@endpush

