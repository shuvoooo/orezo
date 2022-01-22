<div class="card">
    <div class="card-header">
        Project Details
    </div>

    <div class="card-body">
        <div class="table-responsive">
            @if($project_details->count())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>City</th>
                        <th>State</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($project_details as $item)
                        <tr>

                            <td>{{ $item->client ?? ''}}</td>
                            <td>{{ $item->project ?? ''}}</td>
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
