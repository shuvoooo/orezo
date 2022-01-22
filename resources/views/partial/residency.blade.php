<div class="card">
    <div class="card-header">
        Residency
    </div>

    <div class="card-body">

        <div class="table-responsive">

            @if($residency_details->count())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tax Payer</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Spouse</th>
                        <th>Start Date</th>
                        <th>End Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($residency_details as $item)
                        <tr>

                            <td>{{ $item->payer }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>{{ $item->spouse }}</td>
                            <td>{{ $item->spouse_start_date }}</td>
                            <td>{{ $item->spouse_end_date }}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
