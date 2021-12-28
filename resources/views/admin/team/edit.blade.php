@extends('layouts.admin-base')


@section('title', 'Edit Team')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Edit Teams</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.team.index') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.team.update',$team->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label class="text-dark" for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @endif " id="name"
                                       name="name" placeholder="Enter Name" value="{{old('name',$team->name)}}">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="designation">Designation</label>
                                <textarea class="form-control @error('designation') is-invalid @endif " id="designation"
                                          name="designation" rows="3"
                                          placeholder="Designation">{{old('designation',$team->designation)}}</textarea>
                                @error('designation')
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
                                <label class="text-dark" for="facebook">Facebook</label>
                                <input type="url" class="form-control @error('facebook') is-invalid @endif "
                                       id="facebook"
                                       name="facebook" placeholder="Enter Facebook"
                                       value="{{old('facebook', $team->social_link['facebook']??'')}}">
                                @error('facebook')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="twitter">Twitter</label>
                                <input type="url" class="form-control @error('twitter') is-invalid @endif "
                                       id="twitter"
                                       name="twitter" placeholder="Enter Twitter"
                                       value="{{old('twitter', $team->social_link['twitter']??'')}}">
                                @error('twitter')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="linkedin">Linkedin</label>
                                <input type="url" class="form-control @error('linkedin') is-invalid @endif "
                                       id="linkedin"
                                       name="linkedin" placeholder="Enter Linkedin"
                                       value="{{old('linkedin', $team->social_link['linkedin']??'')}}">
                                @error('linkedin')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="github">Github</label>
                                <input type="url" class="form-control @error('github') is-invalid @endif " id="github"
                                       name="github" placeholder="Enter Github"
                                       value="{{old('github', $team->social_link['github']??'')}}">
                                @error('github')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @endif " id="status"
                                        data-old="{{old('status',$team->is_active)}}" name="status">
                                    <option value="1">Active</option>
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
