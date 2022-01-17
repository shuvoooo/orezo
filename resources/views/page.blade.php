@extends('layouts.base')

@section('title', $page->title)


@section('content')
    <hr class="my-0"/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3 font-weight-normal">{{ $page->title }}</h1>
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection
