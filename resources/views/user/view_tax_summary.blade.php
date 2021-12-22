@extends('layouts.admin-base')


@section('content')


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    View Tax Summary
                </div>
                <div class="card-body">
                    <form class="cmxform form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        @if( empty($invoice) )

                            <div class="text-muted">Not Enough Information Here To Provide</div>

                        @else
                            <input class="span12" name="id" type="hidden" required value="{{$invoice->id}}"/>

                            <table class="upload_tax_document_table">

                                @foreach($invoiceitems as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><input type="text" class="readonly" readonly value="{{$item->title or ''}}">
                                        </td>
                                        <td><input type="text" class="readonly" readonly value="{{$item->price or 0}}">$
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td></td>
                                    <td><b>Total Fee</b></td>
                                    <td><input type="text" class="readonly" readonly value="{{$total or 0}}">$</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>Remarks</b></td>
                                    <td class="view_tax_summery_textarea">
                                        <textarea rows="5" class="readonly"
                                                  readonly>{{$invoice->description or ''}}</textarea>
                                    </td>

                                </tr>

                            </table>

                            <div class="form-actions expenses_blade_button">
                                <select name="payment_method" required class="hide">
                                    <option value="2">PayTabs</option>
                                    {{--                                  <option value="1">PayPal</option>--}}
                                </select>
                                <br>
                                {{--                              <button class="btn btn-success" type="submit">Make Payment with <img src="{{ asset('images/paytabs-logo.png') }}"> </button>--}}
                            </div>

                            <!-- Button Code for PayTabs Express Checkout -->
                            <div class="text-center">
                                <div class="PT_express_checkout"></div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
