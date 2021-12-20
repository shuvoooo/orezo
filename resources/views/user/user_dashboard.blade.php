@extends('layouts.admin-base')


@section('content')
    <div class="row">
        <div class="col">
            <h4 class="font-weight-light text-info">Welcome back! {{ Auth::user()->name }}</h4>
            <hr/>
        </div>
    </div>

    <div class="row">
        @foreach(range(date('Y')+1, 2016) as $year)
            <div class="col-auto">
                <a class="py-3 px-5 shadow-sm m-3 border d-flex flex-column rounded-lg"
                   href="{{route_with_year('year_redirect',['year'=>$year])}}">
                    <img src="{{asset('images/folder.png')}}" height="100" alt="2016"/>
                    <h5 class="text-center">Tax {{$year}}</h5>
                </a>
            </div>
        @endforeach
    </div>

@endsection
