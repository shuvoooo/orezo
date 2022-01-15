@extends('layouts.admin-base')


@section('title', 'Create Team')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Create Teams</h4>
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
                        <form action="{{route('admin.team.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="text-dark" for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @endif " id="name"
                                       name="name" placeholder="Enter Name" value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="designation">Designation</label>
                                <textarea class="form-control @error('designation') is-invalid @endif " id="designation"
                                          name="designation" rows="3"
                                          placeholder="Designation">{{old('designation')}}</textarea>
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
                                <input type="url" class="form-control @error('email') is-invalid @endif "
                                       id="email"
                                       name="email" placeholder="Enter email"
                                       value="{{old('email',  )}}">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="phone">Phone</label>
                                <input type="url" class="form-control @error('phone') is-invalid @endif "
                                       id="phone"
                                       name="phone" placeholder="Enter phone"
                                       value="{{old('phone')}}">
                                @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="google_chat">Google Chat</label>
                                <input type="url" class="form-control @error('google_chat') is-invalid @endif "
                                       id="google_chat"
                                       name="google_chat" placeholder="Enter google_chat"
                                       value="{{old('google_chat')}}">
                                @error('google_chat')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="whatsapp">Whats App</label>
                                <input type="url" class="form-control @error('whatsapp') is-invalid @endif "
                                       id="whatsapp"
                                       name="whatsapp" placeholder="Enter whatsapp"
                                       value="{{old('whatsapp')}}">
                                @error('whatsapp')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="text-dark" for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @endif " id="status"
                                        data-old="{{old('status')}}"
                                        name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
