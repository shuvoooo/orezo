@extends('layouts.admin-base')

@section('title', 'Edit Invoice')


@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header  d-flex justify-content-between align-items-center">
                    <div class="h4">Edit Invoice</div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb py-0 my-0">
                            @foreach(range((request('year')??date("Y"))-1, (request('year')??date("Y"))+1 ) as $year)
                                <li class="breadcrumb-item @if($year == request('year')) active @endif ">
                                    @if($year != request('year'))
                                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['user'=>$invoice->user_id, 'year'=>$year])}}">
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

                <invoice-edit :user='@json($user)' :invoice='@json($invoice)'
                              :last-invoice-items='@json($invoiceItems)' invoice-link="{{$invoiceLink}}"></invoice-edit>
            </div>
        </div>
    </div>
@endsection


