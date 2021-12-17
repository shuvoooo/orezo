@extends('layouts.admin-base')

@section('title', 'Residency Details')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <residency-details></residency-details>
        </div>

        <div class="col-md-6">
            <table class="table table-bordered table-responsive table-sm">
                <thead>
                <tr>
                    <th>Tax Payer</th>
                    <th>Start Time</th>
                    <th>End Date</th>
                    <th>Spouse</th>
                    <th>Start Time</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($residency_details as $item)
                    <tr>
                        <td>{{$item->payer}}</td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>{{$item->spouse}}</td>
                        <td>{{$item->spouse_start_date}}</td>
                        <td>{{$item->spouse_end_date}}</td>
                        <td>
                            <form method="post"
                                  action="{{route('residency_details_destroy',['residency'=>$item->id])}}">
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
