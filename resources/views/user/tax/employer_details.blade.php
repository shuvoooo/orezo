@extends('layouts.admin-base')

@section('title', 'Employer Details')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <employer-details></employer-details>
        </div>

        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-bordered  table-sm">
                    <thead>
                    <tr>
                        <th>Employer Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($employer_details as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>{{$item->city}}</td>
                            <td>{{$item->state}}</td>
                            <td>
                                <form method="post"
                                      action="{{route_with_year('employer_details_destroy',['tax'=>$item->id])}}">
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
    </div>

@endsection
