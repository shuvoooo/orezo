@extends('layouts.admin-base')


@section('content')
    <personal-info :personal-info='@json($personal_information)'></personal-info>
@endsection
