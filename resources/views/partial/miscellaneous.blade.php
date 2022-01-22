<div class="card">
    <div class="card-header">
        Miscellaneous
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-striped table-sm">
                <tr>
                    <th class="sl_no">SL No</th>
                    <th class="">Particulars</th>
                    <th class="">Tax Payer</th>
                    <th class="">Amount</th>
                    <th class="">Remarks</th>
                    <th class="">Spouse</th>
                    <th class="">Amount</th>
                    <th class="">Remarks</th>
                </tr>

                @foreach(range(0,10) as $index)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{ $miscell_details['title'][$index] ?? ''}}</td>
                        <td>{{ $miscell_details['taxpayer'][$index] ?? ''}}</td>
                        <td>{{ $miscell_details['amount'][$index] ?? ''}}</td>
                        <td>{{ $miscell_details['remark'][$index] ?? ''}}</td>
                        <td>{{ $miscell_details['spouse'][$index] ?? ''}}</td>
                        <td>{{ $miscell_details['s_amount'][$index] ?? ''}}</td>
                        <td>{{ $miscell_details['s_remark'][$index] ?? ''}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
