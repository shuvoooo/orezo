@extends('layouts.admin-base')


@section('title', 'Create FAQ')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Create FAQs</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.faq.index') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="text-dark" for="question">Question</label>
                                <input type="text" class="form-control @error('question') is-invalid @endif "
                                       id="question"
                                       name="question" placeholder="Enter Question" value="{{old('question')}}">
                                @error('question')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="answer">Answer</label>
                                <textarea class="form-control @error('answer') is-invalid @endif " id="answer"
                                          name="answer" placeholder="Enter Answer">{{old('answer')}}</textarea>
                                @error('answer')
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


