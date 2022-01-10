@extends('layouts.base')

@section('title', $page->title)


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->title }}</h1>
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection
