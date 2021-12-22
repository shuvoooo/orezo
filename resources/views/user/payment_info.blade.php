@extends('layouts.admin-base')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Payment Info
                </div>
                <div class="card-body">
                    <form class="cmxform form-horizontal" method="POST" action="">
                        @csrf
                        <input class="span12 " name="user_id" type="hidden" required value="{{auth()->user()->id}}"/>

                        <table class="table">

                            <tr>
                                <th>Invoice</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Payment Status</th>
                                <th>Details</th>
                            </tr>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{$item->invoice_id or ''}}</td>
                                    <td>{{$item->name or ''}}</td>
                                    <td>{{$item->total_amount or ''}}</td>
                                    <td>{{$item->updated_at or ''}}</td>
                                    <td><span class="btn btn-success btn-xs">Paid</span></td>
                                    <td><a href="{{ route('invoice-details',['id'=>$item->id]) }}">View Details</a></td>
                                </tr>
                            @endforeach
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection





