@extends('layouts.admin-base')

@section('title', 'Create Staff')

@section('content')
    <form action="{{ route('admin.staff.store') }}" method="POST">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Create Staff</h5>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        @csrf
                        <div class="form-group">
                            <label class="text-dark" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                   value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="password_confirmation">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" placeholder="Password Confirmation">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="role">Give Permission</label>

                            @foreach($menus as $key => $value)
                                <div class="custom-control custom-switch">
                                    <input name="permission[]" type="checkbox" class="custom-control-input"
                                           id="checkBox{{$loop->index}}"
                                           value="{{$key}}">
                                    <label class="custom-control-label text-dark"
                                           for="checkBox{{$loop->index}}">{{ $value }}</label>
                                </div>
                            @endforeach

                            @error('permission')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
