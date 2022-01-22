<div class="card">
    <div class="card-header">
        Dependent Details
    </div>
    <div class="card-body">

        @if($dependent_details->count())
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>D.O.B</th>
                        <th>Relationship</th>
                        <th>SSN ITIN</th>
                        <th>Visa Status</th>
                        <th>Date Of Entry in US :</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($dependent_details as $dependent_detail)
                        <tr>

                            <td>{{ $dependent_detail->fname }}</td>
                            <td>{{ $dependent_detail->mname }}</td>
                            <td>{{ $dependent_detail->lname }}</td>
                            <td>{{ $dependent_detail->date_of_birth }}</td>
                            <td>{{ $dependent_detail->relationship }}</td>
                            <td>{{ $dependent_detail->ssn }}</td>
                            <td>{{ $dependent_detail->visa_status }}</td>
                            <td>{{ $dependent_detail->date_of_entry_in_us }}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif

    </div>
</div>
