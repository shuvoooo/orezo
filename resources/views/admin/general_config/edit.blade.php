@extends('layouts.admin-base')

@section('title', 'Edit General Config')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>General Config</strong>
                </div>


                <div class="card-body">
                    <form method="POST" action="{{route('admin.general-config.update', $general_config->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="text-dark">Name</label>
                            <input type="text" class="form-control" id="name" name="key" disabled
                                   value="{{$general_config->key}}">

                        </div>

                        <div class="form-group">
                            <label for="value"  class="text-dark">Value</label>
                            <input type="text" class="form-control" id="value" name="value"
                                   value="{{$general_config->value}}">
                            @error('value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
