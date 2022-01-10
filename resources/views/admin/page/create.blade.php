@extends('layouts.admin-base')

@section('title', 'Create Page')

@section('content')
    <form method="post" action="{{route('admin.page.store')}}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Page</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label class="text-dark" for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                           value="{{ old('title') }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-dark" for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                           value="{{ old('slug') }}">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-dark" for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection



@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.0/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slugify@1.6.5/slugify.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#title').on('keyup', function () {
                var title = $(this).val();
                var slug = slugify(title, {
                    lower: true,
                    replacement: '-',
                    remove: /[*+~.()'"!:@]/g,
                    strict: true
                });
                $('#slug').val(slug);
            });
        });

        tinymce.init({
            selector: 'textarea',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tiny.cloud/css/codepen.min.css'
            ]
        });

    </script>
@endpush
