@extends('layouts.admin-base')


@section('title', 'Create Brand')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Create Brands</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.brand.index') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
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
                                <label class="text-dark" for="logo">Logo</label>
                                <input type="file" class="custom-file @error('logo') is-invalid @endif " id="logo"
                                       name="logo">
                                @error('logo')
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

