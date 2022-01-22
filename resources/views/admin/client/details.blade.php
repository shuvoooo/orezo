@extends("layouts.admin-base")

@section("title", "Client Details")



@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h4">User View</div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb py-0 my-0">
                            @foreach(range(request('year')-1, request('year')+1 ) as $year)
                                <li class="breadcrumb-item @if($year == request('year')) active @endif ">
                                    @if($year != request('year'))
                                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['user'=>$user->id, 'year'=>$year])}}">
                                            {{$year}}
                                        </a>
                                    @else
                                        {{$year}}
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

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

        <div class="col-md-6 my-3">
            @include('partial.asset')
        </div>


        <div class="col-md-6 my-3">
            @include('partial.expenses')
        </div>

        <div class="col-md-6 my-3">
            @include('partial.miscellaneous')
        </div>

        <div class="col-md-6 my-3">
            @include('partial.residency')
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

        .card-header {
            font-weight: bold;
            color: #00588d;
        }
    </style>















@endsection
