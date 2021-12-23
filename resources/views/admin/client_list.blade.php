@extends('layouts.admin-base')

@section('title', 'Client List')



@section('css')
    <link rel="stylesheet" href="{{ asset('css/data_table.css') }}"/>
@endsection

@push('scripts')
    <script src="{{ asset('js/data_table.js') }}"></script>
    {{$dataTable->scripts()}}
@endpush

@section('content')
    {{$dataTable->table()}}
@endsection
