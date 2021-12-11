@extends('layouts.auth-base')

@section('content')
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">

            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt=""
                     class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
                <p class="font-italic text-muted mb-0">
                    Register to eTaxPlanner and enjoy the benefits of
                    eTaxPlanner.
                </p>
            </div>

            <!-- Registration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="#">
                    <div class="row">

                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            </div>
                            <input id="firstName" type="text" name="firstname" placeholder="First Name"
                                   class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            </div>
                            <input id="lastName" type="text" name="lastname" placeholder="Last Name"
                                   class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address"
                                   class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                            </div>
                            <select id="countryCode" name="countryCode" style="max-width: 80px"
                                    class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                <option value="">+12</option>
                                <option value="">+10</option>
                                <option value="">+15</option>
                                <option value="">+18</option>
                            </select>
                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number"
                                   class="form-control bg-white border-md border-left-0 pl-3">
                        </div>


                        <!-- Country -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                            </div>
                            <select id="job" name="country"
                                    class="form-control custom-select bg-white border-left-0 border-md">
                                <option value="USA">United State</option>
                            </select>
                        </div>


                        <!-- State -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                            </div>
                            <select id="job" name="state"
                                    class="form-control custom-select bg-white border-left-0 border-md">

                                <option selected="selected" value="-1">Select State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DC">District of Columbia</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                                <option value="WY">none of this</option>
                            </select>
                        </div>

                        <!-- Home No -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                            </div>
                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number"
                                   class="form-control bg-white border-md border-left-0 pl-3">
                        </div>

                        <!-- Home No -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                            </div>
                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number"
                                   class="form-control bg-white border-md border-left-0 pl-3">
                        </div>


                        <!-- Referred By -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"
                                   class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                            </div>
                            <input id="passwordConfirmation" type="text" name="passwordConfirmation"
                                   placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <a href="#" class="btn btn-primary btn-block py-3">
                                <span class="font-weight-bold">Create your account</span>
                            </a>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                    {{--                        <!-- Social Login -->--}}
                    {{--                        <div class="form-group col-lg-12 mx-auto">--}}
                    {{--                            <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">--}}
                    {{--                                <i class="fa fa-facebook-f mr-2"></i>--}}
                    {{--                                <span class="font-weight-bold">Continue with Facebook</span>--}}
                    {{--                            </a>--}}
                    {{--                            <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">--}}
                    {{--                                <i class="fa fa-twitter mr-2"></i>--}}
                    {{--                                <span class="font-weight-bold">Continue with Twitter</span>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    <!-- Already Registered -->
                        <div class="text-center w-100">
                            <p class="text-muted font-weight-bold">Already Registered?
                                <a href="#"
                                   class="text-primary ml-2">Login</a>
                            </p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
