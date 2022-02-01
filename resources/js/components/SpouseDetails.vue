<template>
    <div class="row">
        <div class="col-md-8">
            <form action="post" @submit.prevent="submit" class="">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-user mr-2"></i>Spouse Details</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 mr-3 text-dark">Are you Married?</label>
                            <div class="form-check form-check-inline p-0">
                                <input class="form-check-input" type="radio" name="spouse_status" id="spouse_status1"
                                       value="1"
                                       v-model="spouse_status">
                                <label class=" text-dark form-check-label" for="spouse_status1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="spouse_status" id="spouse_status2"
                                       value="0"
                                       v-model="spouse_status">
                                <label class=" text-dark form-check-label" for="spouse_status2">No</label>
                            </div>
                        </div>

                        <div v-if="spouse_status=='1'">
                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="fname">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="fname" name="fname"
                                           placeholder="First Name"
                                           v-model="fname">
                                    <small
                                        v-if="errors.has('fname')"
                                        id="fnameHelp"
                                        class="form-text text-danger"
                                    >{{ errors.first('fname') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="mname">Middle Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mname" name="mname"
                                           placeholder="Middle Name"
                                           v-model="mname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="lname">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="lname" name="lname"
                                           placeholder="Last Name"
                                           v-model="lname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="date_of_birth">Date of
                                    Birth</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                           placeholder="Date of Birth"
                                           v-model="date_of_birth">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="ssn">SSN/ITIN</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="ssn" name="ssn" placeholder="SSN/ITIN"
                                           v-model="ssn">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-dark  col-md-3 col-form-label" for="occupation">Occupation</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="occupation" name="occupation"
                                           placeholder="Occupation"
                                           v-model="occupation">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="street_no">Street No </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="street_no" name="street_no"
                                           placeholder="Street No"
                                           v-model="street_no">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="apartment_no">Apartment
                                    No</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="apartment_no" name="apartment_no"
                                           placeholder="Apartment No"
                                           v-model="apartment_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="zip_code">Zip Code</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code"
                                           placeholder="Zip Code"
                                           v-model="zip_code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="city">City</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="city" name="city" v-model="city"
                                           placeholder="City">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" text-dark col-md-3 col-form-label" for="state"> State</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="state" id="state" v-model="state">
                                        <option value="">Select State</option>
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="Arizona">Arizona</option>
                                        <option value="Arkansas">Arkansas</option>
                                        <option value="California">California</option>
                                        <option value="Colorado">Colorado</option>
                                        <option value="Connecticut">Connecticut</option>
                                        <option value="Delaware">Delaware</option>
                                        <option value="District of Columbia">District of Columbia</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Idaho">Idaho</option>
                                        <option value="Illinois">Illinois</option>
                                        <option value="Indiana">Indiana</option>
                                        <option value="Iowa">Iowa</option>
                                        <option value="Kansas">Kansas</option>
                                        <option value="Kentucky">Kentucky</option>
                                        <option value="Louisiana">Louisiana</option>
                                        <option value="Maine">Maine</option>
                                        <option value="Maryland">Maryland</option>
                                        <option value="Massachusetts">Massachusetts</option>
                                        <option value="Michigan">Michigan</option>
                                        <option value="Minnesota">Minnesota</option>
                                        <option value="Mississippi">Mississippi</option>
                                        <option value="Missouri">Missouri</option>
                                        <option value="Montana">Montana</option>
                                        <option value="Nebraska">Nebraska</option>
                                        <option value="Nevada">Nevada</option>
                                        <option value="New Hampshire">New Hampshire</option>
                                        <option value="New Jersey">New Jersey</option>
                                        <option value="New Mexico">New Mexico</option>
                                        <option value="New York">New York</option>
                                        <option value="North Carolina">North Carolina</option>
                                        <option value="North Dakota">North Dakota</option>
                                        <option value="Northern Marianas Islands">Northern Marianas Islands</option>
                                        <option value="Ohio">Ohio</option>
                                        <option value="Oklahoma">Oklahoma</option>
                                        <option value="Oregon">Oregon</option>
                                        <option value="Pennsylvania">Pennsylvania</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Rhode Island">Rhode Island</option>
                                        <option value="South Carolina">South Carolina</option>
                                        <option value="South Dakota">South Dakota</option>
                                        <option value="Tennessee">Tennessee</option>
                                        <option value="Texas">Texas</option>
                                        <option value="Utah">Utah</option>
                                        <option value="Vermont">Vermont</option>
                                        <option value="Virginia">Virginia</option>
                                        <option value="Virgin Islands">Virgin Islands</option>
                                        <option value="Washington">Washington</option>
                                        <option value="West Virginia">West Virginia</option>
                                        <option value="Wisconsin">Wisconsin</option>
                                        <option value="Wyoming">Wyoming</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="country">Country</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="country" name="country" v-model="country">
                                        <option value="" selected>Select Country</option>
                                        <option value="USA">United States</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="mobile">Mobile Number
                                </label>
                                <div class="col-md-9">
                                    <input type="tel" class="form-control" id="mobile" name="mobile"
                                           placeholder="Mobile Number"
                                           v-model="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="work">Work Number</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="work" name="work"
                                           placeholder="Work Number"
                                           v-model="work">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="email">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email Address"
                                           v-model="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark  col-md-3 col-form-label" for="visa_status">Visa Status</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="visa_status" name="visa_status"
                                           placeholder="Visa Status"
                                           v-model="visa_status">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" text-dark col-md-3 col-form-label" for="date_of_entry_in_us">Date of
                                    Entry in
                                    US
                                </label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="date_of_entry_in_us"
                                           placeholder="Date of Entry in US"
                                           name="date_of_entry_in_us"
                                           v-model="date_of_entry_in_us">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button
                            type="submit"
                            class="btn btn-primary"
                            @click.prevent="submit"
                            :disabled="isLoading"
                        >
                        <span class="spinner" v-if="isLoading">
                          <i class="fa fa-spinner fa-spin"></i>
                        </span>
                            Save
                        </button>
                        <span class="badge badge-info ml-4" v-if="msg">{{ msg }}</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['spouseDetails', 'userSpouseStatus'],

    data() {
        return {
            spouse_status: this.userSpouseStatus || '0',
            fname: this.spouseDetails.fname || '',
            mname: this.spouseDetails.mname || '',
            lname: this.spouseDetails.lname || '',
            date_of_birth: this.spouseDetails.date_of_birth || '',
            ssn: this.spouseDetails.ssn || '',
            occupation: this.spouseDetails.occupation || '',
            street_no: this.spouseDetails.street_no || '',
            apartment_no: this.spouseDetails.apartment_no || '',
            zip_code: this.spouseDetails.zip_code || '',
            city: this.spouseDetails.city || '',
            state: this.spouseDetails.state || '',
            country: this.spouseDetails.country || '',
            mobile: this.spouseDetails.mobile || '',
            work: this.spouseDetails.work || '',
            email: this.spouseDetails.email || '',
            visa_status: this.spouseDetails.visa_status || '',
            date_of_entry_in_us: this.spouseDetails.date_of_entry_in_us || '',

            msg: '',
        }
    },

    methods: {
        submit() {
            axios.post(Year + '/info/spouse-details', {
                fname: this.fname,
                mname: this.mname,
                lname: this.lname,
                date_of_birth: this.date_of_birth,
                ssn: this.ssn,
                occupation: this.occupation,
                street_no: this.street_no,
                apartment_no: this.apartment_no,
                zip_code: this.zip_code,
                city: this.city,
                state: this.state,
                country: this.country,
                mobile: this.mobile,
                work: this.work,
                email: this.email,
                visa_status: this.visa_status,
                date_of_entry_in_us: this.date_of_entry_in_us,
                spouse_status: this.spouse_status,
            }).then(response => {
                this.isLoading = false;
                this.msg = response.data.success;
                location.href = response.data.url;
            }).catch(error => {
                this.backendError(error);
                this.msg = error.response.data.message;
            });
        }
    }

}
</script>
