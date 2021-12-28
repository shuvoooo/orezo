@extends('layouts.admin-base')


@section('title', 'FAQs')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">FAQs</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Add FAQ
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($faqs as $faq)
                                <tr>
                                    <td>{{$faq->question}}</td>
                                    <td>{{$faq->answer}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.faq.edit', $faq->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <form method="POST"
                                              action="{{route('admin.faq.destroy',$faq->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm mx-2">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
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
