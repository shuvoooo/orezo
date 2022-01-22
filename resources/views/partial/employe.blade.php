<div class="card">
    <div class="card-header">
        Employee
    </div>


    <div class="card-body">
        <div class="teble-responsive">
            @if($employer_details->count())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Employer Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($employer_details as $item)
                        <tr>

                            <td>{{ $item->name ?? ''}}</td>
                            <td>{{ $item->start_date ?? ''}}</td>
                            <td>{{ $item->end_date ?? ''}}</td>
                            <td>{{ $item->city ?? ''}}</td>
                            <td>{{ $item->state ?? ''}}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>

</div>
