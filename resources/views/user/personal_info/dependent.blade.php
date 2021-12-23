@extends('layouts.admin-base')


@section('content')
    <div class="row">
        <div class="col-md-6">
            {{-- Vue Instance--}}
            <dependent-details></dependent-details>
        </div>

        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>D.O.B</th>
                        <th>Relationship</th>
                        <th>SSN/ITIN</th>
                        <th>Visa Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach( $dependent_details as $item)
                        <tr>
                            <td>{{implode(" ",[$item->fname, $item->mname, $item->lname])}}</td>
                            <td>{{$item->date_of_birth}}</td>
                            <td>{{$item->relationship}}</td>
                            <td>{{$item->ssn}}</td>
                            <td>{{$item->visa_status}}</td>
                            <td>
                                <form method="post"
                                      action="{{route_with_year('dependent_details_destroy',['dependent_details'=>$item->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

@endsection
