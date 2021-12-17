@extends('layouts.admin-base')


@section('title', 'Process Flow Chart')

@section('content')

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">Process Flow Chart</h5>
        </div>

        <div class="card-body">
            <img src="{{ asset('images/process_flow_chart.png') }}" alt="Process Flow Chart" class="img-fluid"/>
        </div>
    </div>

@endsection
