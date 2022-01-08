@extends('layouts.admin-base')


@section("title","User Tax Documents")

@section('content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">User Tax Documents</h3>
        </div>

        <div class="card-body">
            <div class="row no-gutters bg-info py-2 px-1 text-white mb-2">
                <div class="col-1">
                    SL
                </div>
                <div class="col-4 px-1">
                    Title
                </div>
                <div class="col-4 px-1">
                    Browse File
                </div>
                <div class="col-3 px-1">
                    Remarks
                </div>
            </div>

            @foreach($documents as $document)
                <div class="row no-gutters py-2 border-bottom">
                    <div class="col-1">
                        {{$loop->index+1}}
                    </div>
                    <div class="col-4 px-1">
                        {{$document->title}}
                    </div>
                    <div class="col-4 px-1">
                        <ul class="list-group">
                            @foreach($document->upload as $file)

                                <li class="list-group-item  d-flex justify-content-between align-items-center py-1 px-2">
                                    <span>{{$file->filename}}</span>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="mx-3"><i class="fa fa-download"></i></a>
                                        <a href="#" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-3 px-1">
                        <input type="text" class="form-control" disabled value="{{$document->comment}}">
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
