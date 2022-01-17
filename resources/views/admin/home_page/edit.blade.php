@extends('layouts.admin-base')


@section('title', 'Edit Home Page')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('admin.home_page.update')}}">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Home Page</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="text-dark col-12">Title</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" id="title" name="title[]"
                                       value="{{ explode("/", $home_page->title)[0] }}">
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control" id="subtitle" name="title[]"
                                       value="{{ explode("/", $home_page->title)[1] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="subtitle_2" name="title[]"
                                       value="{{ implode("/", array_slice(explode("/", $home_page->title),2) )}}">
                                <small class="">Make separate by "/"</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="text-dark">Description</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="3">{{ $home_page->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="youtube_url" class="text-dark">Youtube Link</label>
                            <input type="url" class="form-control" id="youtube_url" name="youtube_url"
                                   value="{{ $home_page->youtube_url }}"
                                   placeholder="Your Youtube Link">
                        </div>

                        <div class="form-group">
                            <label for="clients" class="text-dark">Clients</label>
                            <input type="text" class="form-control" id="clients" name="clients"
                                   placeholder="Clients"
                                   value="{{ $home_page->counters['clients'] }}">

                        </div>

                        <div class="form-group">
                            <label for="years_in_business" class="text-dark">Years in Business</label>
                            <input type="text" class="form-control" id="years_in_business" name="years_in_business"
                                   placeholder="Years in Business"
                                   value="{{ $home_page->counters['years_in_business'] }}">

                        </div>

                        <div class="form-group">
                            <label for="tax_prepared" class="text-dark">Tax Prepared</label>
                            <input type="text" class="form-control" id="tax_prepared" name="tax_prepared"
                                   placeholder="Tax Prepared"
                                   value="{{ $home_page->counters['tax_prepared'] }}">

                        </div>

                        <div class="form-group">
                            <label for="staff_members" class="text-dark">Staff Members</label>
                            <input type="text" class="form-control" id="staff_members" name="staff_members"
                                   placeholder="Winning Awards"
                                   value="{{ $home_page->counters['staff_members'] }}">

                        </div>

                        <div class="form-group row">
                            <h4 class="col-form-label col-12 text-dark">All Info Box</h4>
                            @foreach(range(0,2) as $index)
                                <div class="col-12 border my-2 border-info">
                                    <h6>Info Box {{$index+1}}</h6>
                                    <hr class="py-2 my-0"/>
                                    <div class="row">
                                        <div class="col-3 col-md-3">
                                            <div class="form-group">
                                                <label for="info_icon_{{ $index }}" class="text-dark">Icon</label>
                                                <input type="text" class="form-control" id="info_icon_{{ $index }}"
                                                       name="info[icon][]"
                                                       placeholder="Icon"
                                                       value="{{ $home_page->info[$index]['icon'] }}">
                                            </div>
                                        </div>

                                        <div class="col-8 col-md-5">
                                            <div class="form-group">
                                                <label for="info_title_{{ $index }}" class="text-dark">Title</label>
                                                <input type="text" class="form-control" id="info_title_{{ $index }}"
                                                       name="info[title][]"
                                                       placeholder="Title"
                                                       value="{{ $home_page->info[$index]['title'] }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="info_url_{{ $index }}" class="text-dark">Url</label>
                                                <input type="text" class="form-control" id="info_url_{{ $index }}"
                                                       name="info[url][]"
                                                       placeholder="Title"
                                                       value="{{ $home_page->info[$index]['url'] }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="info_description_{{ $index }}"
                                                       class="text-dark">Description</label>
                                                <textarea class="form-control" id="info_description_{{ $index }}"
                                                          name="info[description][]"
                                                          rows="3">{{ $home_page->info[$index]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
