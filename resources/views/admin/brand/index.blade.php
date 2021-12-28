@extends('layouts.admin-base')


@section('title', 'Brands')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Brands</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Add Brand
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        <img class="img-fluid" style="height:40px" src="{{storage_asset($brand->logo)}}" alt="{{$brand->name}}">
                                    </td>

                                    <td></td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <form method="POST"
                                              action="{{route('admin.brand.destroy',$brand->id)}}">
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
