@extends('layouts.admin-base')

@section('title', $title)

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"/>
@endsection

@push('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{$dataTable->scripts()}}
@endpush

@section('content')
    <div class="table-responsive">
        {{$dataTable->table(['class' => 'table table-bordered table-hover table-striped'], false)}}
    </div>
@endsection
