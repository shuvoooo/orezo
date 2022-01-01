@extends('layouts.admin-base')

@section('title', 'General Configuration')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General Configuration</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped">
                            <thead class=" text-primary">
                            <th>
                                Name
                            </th>
                            <th>
                                Key
                            </th>
                            <th>
                                Value
                            </th>
                            <th>
                                Actions
                            </th>
                            </thead>
                            <tbody>
                            @foreach($configs as $config)
                                <tr>
                                    <td >
                                        {{ $config->name }}
                                    </td>

                                    <td class="user-select-all">
                                        {{ $config->key }}
                                    </td>
                                    <td>
                                        {{ $config->value }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.general-config.edit', $config->id) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
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
