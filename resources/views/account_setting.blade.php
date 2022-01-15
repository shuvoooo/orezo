@extends('layouts.admin-base')


@section('title', 'Account Setting')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('update_profile')}}" method="post">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user"></i> Profile Setting
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-md-3 col-form-label text-dark">
                                First Name
                            </label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" id="fname" placeholder="Enter Name" name="fname"
                                       value="{{old('phone', $address->fname ??'')}}"
                                       aria-describedby="fnameHelp"/>
                                @error('fname')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-3 col-form-label text-dark">
                                Last Name
                            </label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" id="lname" placeholder="Enter Name" name="lname"
                                       value="{{old('lname', $address->lname ??'')}}"
                                       aria-describedby="lnameHelp"/>
                                @error('lname')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-3 col-form-label text-dark">
                                Phone
                            </label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" id="Phone" placeholder="Enter Phone"
                                       name="phone"
                                       value="{{old('phone', $address->mobile ??'')}}"
                                       aria-describedby="phoneHelp"/>
                                @error('phone')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-dark">
                                Country
                            </label>

                            <div class="col-md-9">
                                <select class="form-control" name="country">
                                    <option value="USA">USA</option>
                                </select>
                                @error('country')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-dark">
                                State
                            </label>

                            <div class="col-md-9">
                                <select class="form-control" name="state" id="state" data-old="{{$address->state??''}}">
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
                                @error('state')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submit-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-md-6">
            <form method="post" action="{{route('change_password')}}">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-key"></i> Change Password
                    </div>

                    <div class="card-body">
                        <div class="alert alert-danger" id="password-alert" style="display: none;">
                            <strong>Error!</strong> Please enter a valid password.
                        </div>


                        <div class="form-group">
                            <label class="text-dark" for="current-password">Current Password</label>
                            <input type="password" class="form-control" id="current-password" name="current_password"
                                   placeholder="Current Password">
                            @error('current_password')
                            <small id="current-password-help" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="New Password">
                            @error('password')
                            <small id="passwordHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm"
                                   name="password_confirmation"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <small id="passwordConfirmHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="password-submit-btn">Change Password</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6 mt-2">
            <email-changer :user='@json(auth()->user())'></email-changer>
        </div>
    </div>
@endsection
