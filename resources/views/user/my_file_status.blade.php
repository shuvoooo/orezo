@extends('layouts.admin-base')


@section('title', 'My File Status')

@section('content')

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">My File Status</h5>
        </div>

        <div class="card-body">
            <div class="row border-bottom bg-info text-white py-2">
                <div class="col-4">Status By</div>
                <div class="col-4">Status</div>
                <div class="col-4">Date Time</div>
            </div>

            @foreach($fileStatus as $status)
                <div class="row">
                    <div class="col-4">{{ $status->user->name }}</div>
                    <div class="col-4">{{$statusList[$item->status]}}</div>
                    <div class="col-4">{{ $status->created_at }}</div>
                </div>
            @endforeach

            @if(count($fileStatus) == 0)
                <div class="row">
                    <div class="col-12">
                        <h5 class="font-weight-light text-center text-muted">No Data found</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
