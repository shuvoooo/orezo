@extends('layouts.admin-base')


@section('title', 'Edit Testimonial')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Edit Testimonials</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.testimonial.update',$testimonial->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label class="text-dark" for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @endif " id="name"
                                       name="name" placeholder="Enter Name" value="{{old('name',$testimonial->name)}}">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @endif " id="description"
                                          name="description" rows="3"
                                          placeholder="Description">{{old('description',$testimonial->description)}}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="url">Redirect Url</label>
                                <input type="url" class="form-control @error('url') is-invalid @endif " id="url"
                                       name="url" value="{{old('url',$testimonial->url)}}"
                                       placeholder="Enter Redirect Url">
                                @error('url')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="icon">Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @endif " id="icon"
                                       name="icon" value="{{old('icon',$testimonial->icon)}}"
                                       placeholder="Enter Icon Name">
                                @error('icon')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="image">Image</label>
                                <input type="file" class="custom-file @error('image') is-invalid @endif " id="image"
                                       name="image">
                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @endif " id="status"
                                        data-old="{{old('status', $testimonial->status)}}"
                                        name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
