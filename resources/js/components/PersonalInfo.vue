<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background: #ffadaa11">
                    <h4><i class="fa fa-user"></i> Personal Information</h4>
                </div>

                <div class="card-body">
                    <form method="post" @submit.prevent="onSubmit">
                        <div class="form-group row">
                            <label for="fname" class="col-md-3 col-form-label text-dark"
                            >First Name
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="fname"
                                    v-model="fname"
                                    placeholder="First Name"
                                    name="fname"
                                    aria-describedby="fnameHelp"
                                />
                                <small
                                    v-if="errors.has('fname')"
                                    id="fnameHelp"
                                    class="form-text text-danger"
                                >{{ errors.first('fname') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mname" class="col-md-3 col-form-label text-dark"
                            >Middle Name
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="mname"
                                    v-model="mname"
                                    placeholder="Middle Name"
                                    aria-describedby="mnameHelp"
                                />

                                <small
                                    v-if="errors.has('mname')"
                                    class="form-text text-danger"
                                >{{ errors.first('mname') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-3 col-form-label text-dark"
                            >Last Name
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="lname"
                                    v-model="lname"
                                    placeholder="Last Name"
                                    aria-describedby="lnameHelp"
                                />

                                <small
                                    v-if="errors.has('lname')"
                                    class="form-text text-danger"
                                >{{ errors.first('lname') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-dark col-12 p-0">
                                Are you insurance covered?
                            </div>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="insurance_covered"
                                        v-model="insurance_covered"
                                        id="insurance1"
                                        value="yes"
                                    />
                                    <label
                                        class="form-check-label text-secondary"
                                        for="insurance1"
                                    >Yes</label
                                    >
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="insurance_covered"
                                        v-model="insurance_covered"
                                        id="insurance2"
                                        value="no"
                                    />
                                    <label
                                        class="form-check-label text-secondary"
                                        for="insurance2"
                                    >No</label
                                    >
                                </div>
                                <small
                                    v-if="errors.has('insurance_covered')"
                                    class="form-text text-danger"
                                >{{ errors.first('insurance_covered') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ssn" class="col-md-3 col-form-label text-dark"
                            >SSN
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="ssn"
                                    v-model="ssn"
                                    placeholder="SSN"
                                    aria-describedby="ssnHelp"
                                />
                                <small
                                    v-if="errors.has('ssn')"
                                    class="form-text text-danger"
                                >{{ errors.first('ssn') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="marital_status"
                                class="col-md-3 col-form-label text-dark"
                            >Marital Status
                            </label>
                            <div class="col-md-9">
                                <select
                                    class="form-control"
                                    id="marital_status"
                                    v-model="marital_status"
                                >
                                    <option value="" selected>Select Marital Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                <small
                                    v-if="errors.has('marital_status')"
                                    class="form-text text-danger"
                                >{{ errors.first('marital_status') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="occupation" class="col-md-3 col-form-label text-dark"
                            >Occupation
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="occupation"
                                    v-model="occupation"
                                    placeholder=""
                                />
                                <small
                                    v-if="errors.has('occupation')"
                                    class="form-text text-danger"
                                >{{ errors.first('occupation') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street_no" class="col-md-3 col-form-label text-dark"
                            >Street No
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="street_no"
                                    v-model="street_no"
                                />
                                <small
                                    v-if="errors.has('street_no')"
                                    class="form-text text-danger"
                                >{{ errors.first('street_no') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="apartment_no"
                                class="col-md-3 col-form-label text-dark"
                            >Apartment No
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="apartment_no"
                                    v-model="apartment_no"
                                />
                                <small
                                    v-if="errors.has('apartment_no')"
                                    class="form-text text-danger"
                                >{{ errors.first('apartment_no') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-3 col-form-label text-dark"
                            >Zip No
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="zip_code"
                                    v-model="zip_code"
                                />
                                <small
                                    v-if="errors.has('zip_code')"
                                    class="form-text text-danger"
                                >{{ errors.first('zip_code') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-3 col-form-label text-dark"
                            >City
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="city"
                                    v-model="city"
                                />
                                <small v-if="errors.has('city')" class="form-text text-danger">{{
                                        errors.first('city')
                                    }}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-3 col-form-label text-dark"
                            >State
                            </label>
                            <div class="col-md-9">
                                <select
                                    name="state"
                                    class="form-control"
                                    id="state"
                                    v-model="state"
                                >
                                    <option value="">Select State</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="Alaska">Alaska</option>
                                    <option value="Arizona">Arizona</option>
                                    <option value="Arkansas">Arkansas</option>
                                    <option value="California">California</option>
                                    <option value="Colorado">Colorado</option>
                                    <option value="Connecticut">Connecticut</option>
                                    <option value="District of Columbia">
                                        District of Columbia
                                    </option>
                                    <option value="Delaware">Delaware</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Georgia">Georgia</option>
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
                                    <option value="Ohio">Ohio</option>
                                    <option value="Oklahoma">Oklahoma</option>
                                    <option value="Oregon">Oregon</option>
                                    <option value="Pennsylvania">Pennsylvania</option>
                                    <option value="Rhode Island">Rhode Island</option>
                                    <option value="South Carolina">South Carolina</option>
                                    <option value="South Dakota">South Dakota</option>
                                    <option value="Tennessee">Tennessee</option>
                                    <option value="Texas">Texas</option>
                                    <option value="Utah">Utah</option>
                                    <option value="Vermont">Vermont</option>
                                    <option value="Virginia">Virginia</option>
                                    <option value="Washington">Washington</option>
                                    <option value="Wisconsin">Wisconsin</option>
                                    <option value="Wyoming">Wyoming</option>
                                    <option value="none of this">none of this</option>
                                </select>
                                <small
                                    v-if="errors.has('state')"
                                    class="form-text text-danger"
                                >{{ errors.first('state') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-3 col-form-label text-dark"
                            >Country
                            </label>
                            <div class="col-md-9">
                                <select
                                    name="country"
                                    class="form-control"
                                    id="country"
                                    v-model="country"
                                >
                                    <option value="USA">USA</option>
                                </select>

                                <small
                                    v-if="errors.has('country')"
                                    class="form-text text-danger"
                                >{{ errors.first('country') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-3 col-form-label text-dark"
                            >Mobile Number
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="mobile"
                                    v-model="mobile"
                                />
                                <small
                                    v-if="errors.has('mobile')"
                                    class="form-text text-danger"
                                >{{ errors.first('mobile') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work" class="col-md-3 col-form-label text-dark"
                            >Work Number
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="work"
                                    v-model="work"
                                />
                                <small v-if="errors.has('work')" class="form-text text-danger">{{
                                        errors.first('work')
                                    }}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-dark"
                            >Email Address
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    v-model="email"
                                    name="email"
                                />
                                <small
                                    v-if="errors.has('email')"
                                    class="form-text text-danger"
                                >{{ errors.first('email') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visa_status" class="col-md-3 col-form-label text-dark"
                            >Visa Status
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="visa_status"
                                    name="visa_status"
                                    v-model="visa_status"
                                />
                                <small
                                    v-if="errors.has('visa_status')"
                                    class="form-text text-danger"
                                >{{ errors.first('visa_status') }}</small
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="date_of_entry"
                                class="col-md-3 col-form-label text-dark"
                            >Date Of Entry in US
                            </label>
                            <div class="col-md-9">
                                <input
                                    type="date"
                                    class="form-control"
                                    id="date_of_entry"
                                    v-model="date_of_entry_in_us"
                                    name="date_of_entry_in_us"
                                />
                                <small
                                    v-if="errors.has('date_of_entry_in_us')"
                                    class="form-text text-danger"
                                >{{ errors.first('date_of_entry_in_us') }}</small
                                >
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        @click.prevent="onSubmit"
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
        </div>
    </div>
</template>


<script>
export default {
    name: 'PersonalInfo',
    props: ['personalInfo'],
    data() {
        return {
            fname: this.personalInfo.fname || '',
            mname: this.personalInfo.mname || '',
            lname: this.personalInfo.lname || '',
            insurance_covered: this.personalInfo.insurance_covered || 'no',
            ssn: this.personalInfo.ssn || '',
            marital_status: this.personalInfo.marital_status || '',
            occupation: this.personalInfo.occupation || '',
            street_no: this.personalInfo.street_no || '',
            apartment_no: this.personalInfo.apartment_no || '',
            zip_code: this.personalInfo.zip_code || '',
            city: this.personalInfo.city || '',
            state: this.personalInfo.state || '',
            country: this.personalInfo.country || 'USA',
            mobile: this.personalInfo.mobile || '',
            work: this.personalInfo.work || '',
            email: this.personalInfo.email || '',
            visa_status: this.personalInfo.visa_status || '',
            date_of_entry_in_us: this.personalInfo.date_of_entry_in_us || '',

            msg: '',
        }
    },


    methods: {
        onSubmit(e) {

            this.$validator.validateAll().then(result => {
                if (result) {
                    this.isLoading = true;

                    axios.post('/user/personal-information', {
                        fname: this.fname,
                        mname: this.mname,
                        lname: this.lname,
                        insurance_covered: this.insurance_covered,
                        ssn: this.ssn,
                        marital_status: this.marital_status,
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
                    }).then(response => {
                        this.isLoading = false;
                        this.msg = response.data.success;
                        location.href = response.data.url;

                    }).catch(error => {
                        this.backendError(error);
                        this.msg = error.response.data.message;
                    });
                }
            });
        }
    }
}

</script>
