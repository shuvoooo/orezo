@extends('layouts.admin-base')


@section('title', 'Services')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Services</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.service.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Add Service
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Description</th>

                                <th width="200">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($services as $service)
                                <tr>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->icon}}</td>
                                    <td>{!! $service->description !!}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.service.edit', $service->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <form method="POST"
                                              action="{{route('admin.service.destroy',$service->id)}}">
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
