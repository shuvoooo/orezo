@extends('layouts.admin-base')

@section('title', 'Project Details')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <project-details></project-details>
        </div>

        <div class="col-md-6">
            <table class="table table-bordered table-responsive table-sm">
                <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Project Name</th>
                    <th>Start Time</th>
                    <th>End Date</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($project_details as $item)
                    <tr>
                        <td>{{$item->client}}</td>
                        <td>{{$item->project}}</td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->state}}</td>
                        <td>
                            <form method="post" action="{{route_with_year('project_details_destroy',['project'=>$item->id])}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
