@extends('layouts.auth-base')

@section('title', 'Thank You')


@section('content')
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <h3 class="font-weight-light pb-5">Thank You</h3>

                <div class="table-responsive">
                    <h1>Thank you!</h1>
                    <br>
                    <h3>Your invoice payment has been sent successfully.</h3>
                    <br>
                    <h4>Thank you for being with us. <br>{{ env('APP_NAME') }}</h4>
                </div>

            </div>
        </div>
    </div>
@endsection
