@extends('layouts.admin-base')

@section('title', 'User Year Access')


@push('scripts')
    <script>
        $(document).ready(function () {
            $("input[type='checkbox']").change(function () {
                var year = $(this).data('year');
                var value = $(this).is(':checked');

                var data = {
                    'year': year,
                    'value': value ? 1 : 0
                };


                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.year_access.update') }}",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endpush


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Set Editable Access to User</h5>
        </div>


        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-dark" for="role">Edit Permission</label>

                        @foreach(range(2016, date('Y')+1) as $year)
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input"
                                       id="checkBox{{$loop->index}}" data-year="{{$year}}"
                                       @if($years[$year]->user_can_edit??1) checked @endif
                                       value="{{$year}}">
                                <label class="custom-control-label text-dark"
                                       for="checkBox{{$loop->index}}">{{ $year }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
