@extends('layouts.admin-base')


@section('title', 'Testimonials')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Testimonials</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Add Testimonial
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
                                <th>Company</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>{{$testimonial->name}}</td>
                                    <td>{{$testimonial->designation}}</td>
                                    <td>{{$testimonial->company}}</td>
                                    <td>
                                        <img src="{{storage_asset($testimonial->image) }}" alt="{{$testimonial->name}}"
                                             width="100">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <form method="POST"
                                              action="{{route('admin.testimonial.destroy',$testimonial->id)}}">
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
