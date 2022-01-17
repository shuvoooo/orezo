@extends('layouts.admin-base')


@section('title', 'Create Service')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Create Services</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.service.index') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
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
                                <label class="text-dark" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @endif " id="description"
                                          name="description" rows="3"
                                          placeholder="Description">{{old('description')}}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="url">Redirect Url / Slug</label>
                                <input type="text" class="form-control @error('url') is-invalid @endif " id="url"
                                       name="url" value="{{old('url')}}"
                                       placeholder="Enter Redirect Url / Slug">
                                @error('url')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="icon">Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @endif " id="icon"
                                       name="icon" value="{{old('icon')}}"
                                       placeholder="Enter Icon Name">
                                <span class="help-block">For icon check : <a href="https://fontawesome.com/v4.7/icons"
                                                                             target="_blank">Fontawesome v4.7</a></span>
                                @error('icon')
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

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.0/tinymce.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/slugify@1.6.5/slugify.min.js"></script>

    <script>

        $(document).ready(function () {
            $('#name').on('keyup', function () {
                var title = $(this).val();
                var slug = slugify(title, {
                    lower: true,
                    replacement: '-',
                    remove: /[*+~.()'"!:@]/g,
                    strict: true
                });
                $('#url').val(slug);
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
