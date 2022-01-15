@extends('layouts.admin-base')

@section("title","Download / Upload Tax documents")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Download or Upload Tax Document</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="mr-3 text-primary">Documents Uploads / Downloads</div>
                                <div class="flex-grow-1 border-bottom align-self-center "></div>
                            </div>
                        </div>


                        <div class="col-md-8 offset-md-4">
                            <ul class="list-group">
                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                    <span>Hello File</span>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="mx-3"><i class="fa fa-download"></i></a>
                                        <a href="#" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </li>
                                <li class="list-group-item">Hello File</li>
                            </ul>

                            <form action="" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="mt-3">

                                    <input type="file" hidden id="uploadFile" name="upload_file"
                                           onchange="form.submit()">
                                    <label class="btn btn-primary" for="uploadFile">
                                        <i class="fa fa-upload"></i>
                                        Upload File
                                    </label>
                                </div>
                            </form>
                        </div>


                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="mr-3 text-primary">Documents From Authority</div>
                                <div class="flex-grow-1 border-bottom align-self-center"></div>
                            </div>
                        </div>


                        <div class="col-md-8 offset-md-4">
                            <ul class="list-group">

                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                    <span>Hello File</span>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="mx-3"><i class="fa fa-download"></i></a>
                                        <a href="#" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </li>

                            </ul>

                            <form action="" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="mt-3">

                                    <input type="file" hidden id="uploadFile" name="upload_file"
                                           onchange="form.submit()">
                                    <label class="btn btn-primary" for="uploadFile">
                                        <i class="fa fa-upload"></i>
                                        Upload File
                                    </label>
                                </div>
                            </form>
                        </div>


                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="mr-3 text-primary">Comments</div>
                                <div class="flex-grow-1 border-bottom align-self-center "></div>
                            </div>
                        </div>

                        <div class="col-md-8 offset-md-4">
                            <div class="form-group">
                                <textarea rows="5" class="form-control" placeholder="Comments"></textarea>
                            </div>

                            <button class="btn btn-primary">Comment</button>
                        </div>
                        <div class="col-md-12 mt-5">
                            <table class="table table-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Commented By</th>
                                    <th>Comments</th>
                                    <th>Date Time</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
