@extends('layouts.admin-base')


@section('content')
    <div class="row">
        <div class="col-md-6">
            {{-- Vue Instance--}}
            <department-details></department-details>
        </div>

        <div class="col-md-6">
            <table class="table table-sm table-bordered table-responsive">
                <tr>
                    <th>Name</th>
                    <th>D.O.B</th>
                    <th>Relationship</th>
                    <th>SSN/ITIN</th>
                    <th>Visa Status</th>
                    <th>Action</th>
                </tr>
                @foreach( $department_details as $item)
                    <tr>
                        <td>{{implode(" ",[$item->fname, $item->mname, $item->lname])}}</td>
                        <td>{{$item->date_of_birth}}</td>
                        <td>{{$item->relationship}}</td>
                        <td>{{$item->ssn}}</td>
                        <td>{{$item->visa_status}}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

@endsection
