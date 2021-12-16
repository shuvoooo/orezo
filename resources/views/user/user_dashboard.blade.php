@extends('layouts.admin-base')


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @auth
                        <div class="alert alert-success">
                            Hello {{ Auth::user()->name }}
                        </div>
                    @else
                        <div class="alert alert-danger">
                            You are not logged in.
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
