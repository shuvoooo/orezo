@extends('layouts.base')


@section('title', 'Referral')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 my-4">

            @foreach (['danger', 'warning', 'success', 'info','error'] as $message)
                @if(session()->has( $message))
                    <div class="alert alert-{{ $message }}">{{ session()->get($message) }}</div>
                @endif
            @endforeach


            <form class="card" method="POST" action="{{ route('referrals.store') }}">
                @csrf

                <div class="card-header">

                    <h4 class="card-title"><i class="fa fa-user-plus"></i> Referral</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-md-4 text-dark control-label">Referral Name :</label>
                        <input type="text" class="form-control   @error('name') is-invalid @endif " name="name"
                               id="name" value="{{ old('name') }}"
                               autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 text-dark control-label">E-Mail Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @endif " name="email"
                               id="email" value="{{ old('email') }}"
                        >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-md-4 text-dark control-label">Mobile Number</label>
                        <input type="text" class="form-control  @error('mobile') is-invalid @endif " name="mobile"
                               id="mobile" value="{{ old('mobile') }}">

                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="phone" class="col-md-4 text-dark control-label">Phone Number</label>
                        <input type="text" class="form-control   @error('phone') is-invalid @endif " name="phone"
                               id="phone" value="{{ old('phone') }}"/>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr class="my-y bg-info border-info"/>
                    <div class="form-group">
                        <label for="address" class="col-md-4 text-dark control-label">Referral By</label>
                        <input type="text" class="form-control  @error('by_name') is-invalid @endif " name="by_name"
                               id="referral_by"
                               value="{{ old('by_name') }}">
                        @error('by_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-4 text-dark control-label">E-Mail Address</label>
                        <input type="email" class="form-control  @error('by_email') is-invalid @endif " name="by_email"
                               id="referral_email"
                               value="{{ old('by_email') }}">
                        @error('by_email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-4 text-dark control-label">Phone Number</label>
                        <input type="text" class="form-control  @error('by_phone') is-invalid @endif " name="by_phone"
                               id="referral_phone"
                               value="{{ old('by_phone') }}">
                        @error('by_phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
