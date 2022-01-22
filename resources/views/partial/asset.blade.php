<div class="card">
    <div class="card-header">
        Assets
    </div>

    <div class="card-body">

        <style type="text/css">
            .asset_details_table input {
                width: 90px;
            }
        </style>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered">
                <tr class="asset_tex_payer_table_header">
                    <th class="">SL No</th>
                    <th class="">Asset Name</th>
                    <th class="">Date Of Purchase</th>
                    <th class="">% Used in Business</th>
                    <th class="">Cost of Acquisition</th>
                    <th class="">Any Reiumbersement</th>
                </tr>


                @foreach(range(0, 10) as $item)

                    <tr class="">
                        <td>{{$item + 1}}</td>
                        <td>{{$asset_details->details['title'][$item] ?? ''}}</td>
                        <td>{{$asset_details->details['dateofpurchase'][$item] ?? ''}}</td>
                        <td>{{$asset_details->details['business'][$item] ?? ''}}</td>
                        <td>{{$asset_details->details['acquisition'][$item] ?? ''}}</td>
                        <td>{{$asset_details->details['reiumbersement'][$item] ?? ''}}</td>
                    </tr>

                @endforeach


            </table>
        </div>
    </div>
</div>
