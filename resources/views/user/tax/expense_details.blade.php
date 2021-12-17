@extends('layouts.admin-base')

@section('title', 'Expense Details')

@section('content')
    <expense-details :expense='@json($expense->details)'></expense-details>
@endsection
