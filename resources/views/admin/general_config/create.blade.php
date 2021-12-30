@extends('layouts.admin-base')


@section('title', 'Create General Config')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create General Config</div>
                <div class="card-body">
                    <form action="{{ route('admin.general-config.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="key">Name</label>
                            <input type="text" class="form-control" id="key" name="key" placeholder="Name">
                            @error('key')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" name="value" placeholder="Value">
                            @error('value')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
