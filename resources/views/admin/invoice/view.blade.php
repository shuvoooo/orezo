@extends('layouts.auth-base')

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
                        <textarea class="form-control"></textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="#">
                        <img src="https://www.paytabs.com/theme/express_checkout/images/checkout.png" height="60"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
