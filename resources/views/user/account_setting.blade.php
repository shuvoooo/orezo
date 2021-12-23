@extends('layouts.admin-base')


@section('title', 'Account Setting')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i> Profile Setting
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="fname" class="col-md-3 col-form-label text-dark">
                                First Name
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="fname"

                                    placeholder="First Name"
                                    name="fname"
                                    aria-describedby="fnameHelp"/>
                                <small
                                    id="fnameHelp"
                                    class="form-text text-danger"
                                ></small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
