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
                                <div class="mr-3 text-primary">User Documents</div>
                                <div class="flex-grow-1 border-bottom align-self-center "></div>
                            </div>
                        </div>


                        <div class="col-md-8 offset-md-4">
                            <ul class="list-group">
                                @foreach($user_downloads as $download)

                                    <li class="list-group-item  d-flex justify-content-between align-items-center">
                                        <span>{{$download->filename}}</span>
                                        <div class="d-flex justify-content-center">
                                            <form
                                                action="{{route('admin.download_tax_document_download',['id'=>$download->id])}}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm mr-2"><i
                                                        class="fa fa-download"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                                @if(count($user_downloads) == 0)
                                    <li class="list-group-item  d-flex justify-content-between align-items-center">
                                        <span>No documents uploaded</span>
                                    </li>
                                @endif
                            </ul>


                        </div>


                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="mr-3 text-primary">Authority Uploads | Downloads</div>
                                <div class="flex-grow-1 border-bottom align-self-center"></div>
                            </div>
                        </div>


                        <div class="col-md-8 offset-md-4">
                            <ul class="list-group">
                                @foreach($org_downloads as $download)
                                    <li class="list-group-item  d-flex justify-content-between align-items-center">
                                        <span>{{$download->filename}}</span>
                                        <div class="d-flex justify-content-center">
                                            <form
                                                action="{{route('admin.download_tax_document_download',['id'=>$download->id])}}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm mr-2"><i
                                                        class="fa fa-download"></i></button>
                                            </form>

                                            <form
                                                action="{{route('admin.download_tax_document_delete',['id'=>$download->id])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                                @if(count($org_downloads) == 0)
                                    <li class="list-group-item  d-flex justify-content-between align-items-center">
                                        <span>No documents uploaded</span>
                                    </li>
                                @endif
                            </ul>

                            <form
                                action="{{route('admin.download_tax_document_store',['user'=>$user->id, 'year'=>request('year')])}}"
                                enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="mt-3">

                                    <input type="file" hidden id="uploadFile" name="file"
                                           onchange="form.submit()">

                                    @error('file'))
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

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
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->commenter->name}}</td>
                                        <td>{{$comment->comment}}</td>
                                        <td>{{$comment->created_at->format("d m,Y")}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-8 offset-md-4">
                            <form action="{{route('admin.comment.store',['user'=>$user->id,'year'=>request('year')])}}"
                                  method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea rows="5" name="comment" class="form-control"
                                              placeholder="Comments"></textarea>
                                </div>
                                @error('comment')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

