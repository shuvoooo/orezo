@extends("layouts.admin-base")

@section("title", "Client Details")



@section('content')
    <div class="row">

        <div class="col-md-6 my-3">
            @include('partial.personal_info')
        </div>


        <div class="col-md-6 my-3">
            @include('partial.spouse_info')
        </div>

        <div class="col-md-6 my-3">
            @include('partial.dependent_details')
        </div>

        <div class="col-md-6 my-3">
            @include('partial.bank_details')
        </div>

        <div class="col-md-6 my-3">
            @include('partial.employe')
        </div>

        <div class="col-md-6 my-3">
            @include('partial.project_details')
        </div>
    </div>
@endsection




@section('css')
    <style>
        .control-group {
            display: flex;
            margin-top: 5px;
            border-bottom: 1px solid #e9ecef;
        }

        .control-label {
            font-weight: bold;
            color: #000000;
        }

        .controls {
            margin-left: .5rem;
        }
    </style>
@endsection
