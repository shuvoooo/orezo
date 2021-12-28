@extends('layouts.admin-base')


@section('title', 'Teams')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Teams</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Add Team
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->designation}}</td>
                                    <td>
                                        <img src="{{ storage_asset($team->image) }}" alt="{{ $team->name }}"
                                             class="img-fluid" style="max-height: 60px;">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.team.edit', $team->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <form method="POST"
                                              action="{{route('admin.team.destroy',$team->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm mx-2">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
