@extends('layouts.admin-base')

@section('title', 'Asset Details')

@section('content')
    <asset-details :asset-details='@json($asset_details)'></asset-details>
@endsection
