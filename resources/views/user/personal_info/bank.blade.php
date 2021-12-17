@extends('layouts.admin-base')


@section('content')
    <bank-details :bank-details='@json($bank_details??[])'></bank-details>
@endsection
