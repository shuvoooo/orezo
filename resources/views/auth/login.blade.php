@extends('layouts.auth-base')

@section('content')
    <div class="container">
        <div class="row py-5 mt-4 align-items-center justify-content-center">
            {{--            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">--}}
            {{--                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt=""--}}
            {{--                     class="img-fluid mb-3 d-none d-md-block">--}}
            {{--                <h1>Welcome Back!</h1>--}}
            {{--                <p class="font-italic text-muted mb-0">Please login!</p>--}}
            {{--            </div>--}}


            <div class="col-md-7 col-lg-6">
                <form action="{{route('login')}}" method="post">
                    @csrf

                    <div class="row">

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}"
                                   class="form-control bg-white border-left-0 border-md  @error('email') is-invalid @enderror ">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- Password -->
                        <div class="input-group  col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"
                                   class="form-control bg-white border-left-0 border-md   @error('password') is-invalid @enderror ">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button role="submit" class="btn btn-primary btn-block py-3">
                                <span class="font-weight-bold">Login</span>
                            </button>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>


                        <!-- Already Registered -->
                        <div class="text-center w-100 d-flex justify-content-between">
                            <a href="{{route('register')}}" class="text-primary ml-2">Create an account</a>
                            <a href="{{route('password.request')}}" class="text-primary ml-2">Forgot password?</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
