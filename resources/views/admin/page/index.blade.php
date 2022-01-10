@extends('layouts.admin-base')

@section('title', 'Page')


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">Pages</h4></div>
                <div class="col-md-6 text-right d-flex align-items-center justify-content-end"><a
                        href="{{ route('admin.page.create') }}"
                        class="btn btn-primary"><i class="fa fa-plus"></i>
                        Add Page
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th width="200">Action</th>
                </tr>

                @foreach($pages as $page)
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->slug}}</td>

                        <td>
                            <a href="{{ route('admin.page.edit',['page'=> $page->id]) }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.page.destroy', $page->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
