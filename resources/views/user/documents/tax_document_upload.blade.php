@extends('layouts.admin-base')


@section('title', 'Tax Document Upload')

@section('content')
    <tax-document-uploader :document-details='@json($document??[])'></tax-document-uploader>
@endsection
