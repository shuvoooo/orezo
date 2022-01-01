@extends('layouts.admin-base')


@section('title', 'Edit About Page')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('admin.about_page.update')}}" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit About Page</h4>
                    </div>

                    <div class="card-body">
                        <!-- Select Image -->
                        <div class="form-group">
                            <label for="image" class="text-dark">Select Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image"
                                       accept="image/*"/>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="d-block">
                                <img src="{{storage_asset($about->image)}}" alt="Image" class="img-fluid"
                                     style="max-width: 50px;">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="note">Sort Note</label>
                            <input type="text" name="note" id="note" class="form-control" value="{{$about->note}}"/>
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="heading">Heading</label>
                            <input type="text" name="heading" id="heading" class="form-control"
                                   value="{{$about->heading}}"/>
                        </div>


                        <div class="form-group">
                            <label class="text-dark" for="subheading">Sub Heading</label>
                            <textarea name="subheading" id="subheading" rows="3"
                                      class="form-control">{{$about->subheading}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="description">Description</label>
                            <textarea name="description" id="description"
                                      class="form-control">{{$about->description}}</textarea>
                        </div>


                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.0/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea#description',
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
