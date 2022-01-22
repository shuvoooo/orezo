<div class="card">
    <div class="card-header">
        Expenses
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-sm table-striped">
                <tr>
                    <th class="">SL No</th>
                    <th class="">Particulars</th>
                    <th class="">Tax Payer</th>
                    <th class="">Spouse</th>
                    <th class="">Remarks</th>
                </tr>

                @foreach(range(0,12) as $item)

                    <tr class="expenses_table_body">
                        <td>{{$item + 1}}</td>
                        <td>{{$expense_details['title'][$item] ?? ''}}</td>
                        <td>{{$expense_details['taxpayer'][$item] ?? ''}}</td>
                        <td>{{$expense_details['spouse'][$item] ?? ''}}</td>
                        <td>{{$expense_details['remark'][$item] ?? ''}}</td>
                    </tr>

                @endforeach

            </table>
        </div>
    </div>
</div>
