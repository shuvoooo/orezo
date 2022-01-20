<template>
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">

            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0 d-flex flex-column align-items-center justify-content-center">
                <img src="/assets/svg/auth.svg" alt="Register"
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

                            <input id="fname" v-validate="'required'" type="text" name="fname" v-model="fname"
                                   placeholder="First Name" class="form-control bg-white border-left-0 border-md">

                            <span v-if="errors.has('fname')" class="small text-danger w-100 w-100">{{
                                    errors.first('fname')
                                }}</span>
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">


                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            </div>
                            <input id="lname" v-validate="'required'" type="text" name="lname" placeholder="Last Name"
                                   v-model="lname"
                                   class="form-control bg-white border-left-0 border-md">

                            <span v-if="errors.has('lname')" class="small text-danger w-100">
                                {{ errors.first('lname') }}
                            </span>
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                            </div>
                            <input id="email" type="email" v-validate="'required|email'" name="email"
                                   placeholder="Email Address" v-model="email"
                                   class="form-control bg-white border-left-0 border-md">
                            <span v-if="errors.has('email')" class="small text-danger w-100 w-100">{{
                                    errors.first('email')
                                }}</span>


                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                            </div>

                            <select id="countryCode" name="countryCode" style="max-width: 80px; height: 3.4rem;"
                                    v-model="countryCode"
                                    v-validate="'required'"
                                    class="custom-select form-control bg-white border-left-0 border-md font-weight-bold text-muted ">
                                <option value="+1">+1</option>
                                <option value="+91">+91</option>
                            </select>


                            <input id="phone" type="tel" name="phone" placeholder="Phone Number" v-model="phone"
                                   v-validate="'required'"
                                   class="form-control bg-white border-md border-left-0 pl-3">

                            <span v-if="errors.has('phone')" class="small text-danger w-100">{{
                                    errors.first('phone')
                                }}</span>

                            <span v-if="errors.has('countryCode')" class="small text-danger w-100">{{
                                    errors.first('countryCode')
                                }}</span>
                        </div>


                        <!-- Country -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                            </div>
                            <select id="country" name="country" v-model="country"
                                    class="form-control custom-select bg-white border-left-0 border-md">
                                <option value="">Select Country</option>
                                <option value="USA">United State</option>
                            </select>

                            <span v-if="errors.has('country')" class="small text-danger w-100">{{
                                    errors.first('country')
                                }}</span>
                        </div>


                        <!-- State -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>

                            <select id="state" name="state" v-model="state"
                                    class="form-control custom-select bg-white border-left-0 border-md">

                                <option selected="selected" value="">Select State</option>
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

                            <span v-if="errors.has('state')" class="small text-danger w-100">{{
                                    errors.first('state')
                                }}</span>
                        </div>

                        <!-- Home No -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-home text-muted"></i>
                            </span>
                            </div>
                            <input id="HomeNo" v-validate="'required'" type="tel" name="home_no"
                                   placeholder="Home Number" v-model="home_no"
                                   class="form-control bg-white border-md border-left-0 pl-3">

                            <span v-if="errors.has('home_no')" class="small text-danger w-100">{{
                                    errors.first('home_no')
                                }}</span>
                        </div>

                        <!-- Referred -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-rebelna  text-muted"></i>
                            </span>
                            </div>
                            <input id="referrer" type="tel" name="referrer" placeholder="Refrered By" v-model="referrer"
                                   class=" form-control bg-white border-md border-left-0 pl-3">

                            <span v-if="errors.has('referrer')" class="small text-danger w-100">{{
                                    errors.first('referrer')
                                }}</span>
                        </div>


                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"
                                   v-model="password" v-validate="'required'"
                                   class="form-control bg-white border-left-0 border-md">

                            <span v-if="errors.has('password')" class="small text-danger w-100">{{
                                    errors.first('password')
                                }}</span>
                        </div>

                        <!-- Password Confirmation -->
                        <div class="col-lg-6 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                                </div>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                       v-model="password_confirmation" v-validate="'required'"
                                       class="form-control bg-white border-left-0 border-md"

                                       placeholder="Confirm Password">

                                <span v-if="errors.has('password_confirmation')" class="small text-danger w-100">{{
                                        errors.first('password_confirmation')
                                    }}</span>
                            </div>
                        </div>


                        <div class="col-lg-12 mb-4">
                            <!-- reCAPTCHA -->
                            <div class="col-lg-12 mb-4">
                                <div class="g-recaptcha" data-sitekey="6LcvjgYeAAAAADUxnyea4-5uwai5av9tow6TfIrE"></div>

                                <span v-if="errors.has('g-recaptcha')" class="small text-danger w-100">{{
                                        errors.first('g-recaptcha')
                                    }}</span>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button role="button" class="btn btn-primary btn-block py-3" :disabled="isLoading"
                                    @click="register">
                                <span class="spinner" v-if="isLoading">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </span>
                                <span class="font-weight-bold">Create your account</span>
                            </button>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <!-- Already Registered -->
                        <div class="text-center w-100">
                            <p class="text-muted font-weight-bold">Already Registered?
                                <a href="/login"
                                   class="text-primary ml-2">Login</a>
                            </p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            fname: '',
            lname: '',
            email: '',
            countryCode: '+1',
            phone: '',
            state: '',
            country: '',
            referrer: '',
            home_no: '',
            password: '',
            password_confirmation: ''
        }
    },
    methods: {
        register(e) {
            e.preventDefault();

            this.$validator.validateAll().then(result => {
                if (result) {
                    this.isLoading = true;
                    axios.post('/register', {
                        fname: this.fname,
                        lname: this.lname,
                        email: this.email,
                        phone: this.countryCode + this.phone,
                        state: this.state,
                        country: this.country,
                        referrer: this.referrer,
                        home_no: this.home_no,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                        'g-recaptcha-response' : grecaptcha.getResponse(),
                    }).then(response => {
                        this.isLoading = false;
                        location.href = response.data.redirect
                    }).catch(e => this.backendError(e));
                }
            });
        }
    }
}
</script>
