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
                                <label class="text-dark" for="facebook">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @endif "
                                       id="email"
                                       name="email" placeholder="Enter email"
                                       value="{{old('email', $team->social_link['email']??'')}}">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @endif "
                                       id="phone"
                                       name="phone" placeholder="Enter phone"
                                       value="{{old('phone', $team->social_link['phone']??'')}}">
                                @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="google_chat">Google Chat</label>
                                <input type="text" class="form-control @error('google_chat') is-invalid @endif "
                                       id="google_chat"
                                       name="google_chat" placeholder="Enter google_chat"
                                       value="{{old('google_chat', $team->social_link['google_chat']??'')}}">
                                @error('google_chat')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="whatsapp">Whats App</label>
                                <input type="text" class="form-control @error('whatsapp') is-invalid @endif "
                                       id="whatsapp"
                                       name="whatsapp" placeholder="Enter whatsapp"
                                       value="{{old('whatsapp', $team->social_link['whatsapp']??'')}}">
                                @error('whatsapp')
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
