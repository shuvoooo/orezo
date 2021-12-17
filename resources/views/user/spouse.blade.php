@extends('layouts.admin-base')


@section('content')
    <spouse-details :spouse-details='@json($spouse_information??[])'
                    :user-spouse-status="{{$spouse_status}}"></spouse-details>
@endsection
