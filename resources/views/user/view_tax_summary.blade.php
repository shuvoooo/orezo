@extends('layouts.admin-base')


@section('title', 'Invoice')


@section('content')
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <h3 class="font-weight-light pb-5">Invoice Details - E TAX PAYMENT FOR AMENDMENT</h3>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="50">Serial</th>
                            <th>Invoice Item</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoiceItems as $item)
                            <tr>
                                <td>{{$loop->index +1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>${{ $item->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" class="text-right">Total</td>
                            <td>${{ $invoice->total_amount }}</td>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="" class="col-form-label text-dark">Remakes</label>
                        <textarea class="form-control">{{$invoice->description}}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                {{--<a href="#">--}}
                {{--<img src="https://www.paytabs.com/theme/express_checkout/images/checkout.png" height="60"/>--}}
                {{--</a>--}}

                <!-- Button Code for PayTabs Express Checkout -->
                    @if($invoice->payment_status == 0)
                        <div class="text-center">
                            <div class="PT_express_checkout"></div>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="alert alert-success">
                                <strong> Payment has been made.</strong>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://www.paytabs.com/theme/express_checkout/css/express.css">
    <script src="https://www.paytabs.com/theme/express_checkout/js/jquery-1.11.1.min.js"></script>
    <script src="https://www.paytabs.com/express/express_checkout_v3.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            Paytabs("#express_checkout").expresscheckout({
                settings: {
                    merchant_id: "{{env('MERCHANT_ID')}}",
                    secret_key: "{{env('SECRET_KEY')}}",
                    amount: {{$invoice->total_amount}},
                    currency: "USD",
                    title: "{{$invoice->user->name}}",
                    product_names: "{{ $invoice->name }}",
                    order_id: {{$invoice->id}},
                    url_redirect: "{{ route('invoice.paytabs.response') }}",
                    display_customer_info: 1,
                    display_billing_fields: 1,
                    display_shipping_fields: 0,
                    language: "en",
                    redirect_on_reject: 0,
                }
            });
        })
    </script>
    <style type="text/css">
        #en_button {
            height: 50px;
            width: 300px;
            background-size: contain;
        }

        input, select, textarea {
            display: inline-block;
            width: 80%;
            padding: 3px;
        }

        table td {
            padding-bottom: 10px;
        }
    </style>

@endpush
