@extends('layouts.admin-base')

@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col">
            <h4 class="font-weight-light text-info">Welcome back! {{ Auth::user()->name }}</h4>
            <hr/>
        </div>
    </div>

    <div class="row">

        @if(($role == 'staff' && strpos($permissions, 'client') !== false) || $role == 'admin')
            <a href="{{route('admin.client_details')}}" class="col-12 col-md-4 col-xl-3">
                <div class="d-block p-2 border rounded-lg shadow-sm mb-5">
                    <div class="alert alert-info mt-n4">
                        <i class="fa fa-users"></i>
                        <b>Total User</b>
                    </div>


                    <div class="h2 font-weight-light text-center text-info py-3">
                        {{ $dashboard['total_clients']}}
                    </div>
                </div>
            </a>

        @endif

        @if($role == 'admin' )
            <a href="{{route('admin.staff.index')}}" class="col-12 col-md-4 col-xl-3">
                <div class="d-block p-2 border rounded-lg shadow-sm mb-5">
                    <div class="alert alert-warning mt-n4">
                        <i class="fa fa-address-book"></i>
                        <b>Total Staff</b>
                    </div>


                    <div class="h2 font-weight-light text-center text-warning py-3">
                        {{ $dashboard['total_staff']}}
                    </div>
                </div>
            </a>
        @endif


        @if(($role == 'staff' && strpos($permissions, 'invoice') !== false) || $role == 'admin')
            <a href="{{route('admin.invoice.index')}}" class="col-12 col-md-4 col-xl-3">
                <div class="d-block p-2 border rounded-lg shadow-sm mb-5">
                    <div class="alert alert-primary mt-n4">
                        <i class="fa fa-dollar"></i>
                        <b>Total Pain Invoice</b>
                    </div>
                    <div class="h2 font-weight-light text-center text-primary py-3">
                        {{ $dashboard['invoice_paid']}}
                    </div>
                </div>
            </a>

            <a href="{{route('admin.invoice.index')}}" class="col-12 col-md-4 col-xl-3">
                <div class="d-block p-2 border rounded-lg shadow-sm mb-5">
                    <div class="alert alert-danger mt-n4">
                        <i class="fa fa-ofuser-secret"></i>
                        <b>Total Pain Invoice</b>
                    </div>
                    <div class="h2 font-weight-light text-center text-danger py-3">
                        {{ $dashboard['invoice_unpaid']}}
                    </div>
                </div>
            </a>
        @endif

        @if(($role == 'staff' && strpos($permissions, 'file') !== false) || $role == 'admin')

            <a href="#" class="col-12 col-md-4 col-xl-3">
                <div class="d-block p-2 border rounded-lg shadow-sm mb-5">
                    <div class="alert alert-dark mt-n4">
                        <i class="fa fa-file"></i>
                        <b>File Completed</b>
                    </div>
                    <div class="h2 font-weight-light text-center text-dark py-3">
                        {{ $dashboard['total_file_completed']}}
                    </div>
                </div>
            </a>

            <a href="#" class="col-12 col-md-4 col-xl-3">
                <div class="d-block p-2 border rounded-lg shadow-sm mb-5">
                    <div class="alert alert-secondary mt-n4">
                        <i class="fa fa-file-excel-o"></i>
                        <b>File Uncompleted</b>
                    </div>
                    <div class="h2 font-weight-light text-center text-secondary py-3">
                        {{ $dashboard['total_file_uncompleted']}}
                    </div>
                </div>
            </a>

        @endif
    </div>

    @if(($role == 'staff' && strpos($permissions, 'invoice') !== false) || $role == 'admin')
        <admin-dashboard invoice="{{$dashboard['total_invoice']}}" revenue="{{$dashboard['total_revenue']}}"
                         avg="{{$dashboard['avg_revenue']??0}}"></admin-dashboard>

    @endif



@endsection

