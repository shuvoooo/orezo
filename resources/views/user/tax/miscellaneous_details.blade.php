@extends('layouts.admin-base')

@section('title', 'Miscellaneous Details')

@section('content')
    <miscellaneous-information :miscellaneous-details='@json($miscellaneous_details)'></miscellaneous-information>
@endsection
