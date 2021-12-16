<template>
    <div class="row">
        <div class="col-md-8 col-xl-6">
            <div class="card">
                <div class="card-header" style="background:#ffadaa11;">
                    <h4><i class="fa fa-user"></i> Personal Information</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="fname" class="text-primary">First Name : </label>
                        <input type="text" class="form-control" id="fname" v-model="fname" placeholder="First Name"
                               aria-describedby="fnameHelp">
                        <!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
                        <!--                            anyone else.</small>-->
                    </div>

                    <div class="form-group">
                        <label for="mname" class="text-primary">Last Name : </label>
                        <input type="text" class="form-control" id="mname" v-model="mname" placeholder="Middle Name"
                               aria-describedby="mnameHelp">
                        <!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
                        <!--                            anyone else.</small>-->
                    </div>

                    <div class="form-group">
                        <label for="lname" class="text-primary">Last Name : </label>
                        <input type="text" class="form-control" id="lname" v-model="lname" placeholder="Last Name"
                               aria-describedby="lnameHelp">
                        <!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
                        <!--                            anyone else.</small>-->
                    </div>

                    <div class="form-group">
                        <label for="lname" class="text-primary col-12 p-0">Are you insurance covered?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                   value="option1">
                            <label class="form-check-label  text-secondary" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                   value="option2">
                            <label class="form-check-label text-secondary" for="inlineRadio2">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ssn" class="text-primary">Last Name : </label>
                        <input type="text" class="form-control" id="ssn" v-model="ssn" placeholder="Last Name"
                               aria-describedby="ssnHelp">
                        <!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
                        <!--                            anyone else.</small>-->
                    </div>

                    <div class="form-group">
                        <label for="ssn" class="text-primary">Last Name : </label>
                        <select class="form-control" id="" v-model="maritalStatus">
                            <option value="">Select Marital Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                        <!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
                        <!--                            anyone else.</small>-->
                    </div>

                    <div class="form-group">
                        <label for="occupation" class="text-primary">Last Name : </label>
                        <input class="form-control" id="occupation" v-model="occupation"/>
                    </div>

                    <div class="form-group">
                        <label for="street_no" class="text-primary">Last Name : </label>
                        <input class="form-control" id="street_no" v-model="street_no"/>
                    </div>

                    <div class="form-group">
                        <label for="aprtment_no" class="text-primary">Last Name : </label>
                        <input class="form-control" id="aprtment_no" v-model="aprtment_no"/>
                    </div>

                    <div class="form-group">
                        <label for="zip_code" class="text-primary">Last Name : </label>
                        <input class="form-control" id="zip_code" v-model="zip_code"/>
                    </div>

                    <div class="form-group">
                        <label for="city" class="text-primary">Last Name : </label>
                        <input class="form-control" id="city" v-model="city"/>
                    </div>

                    <div class="form-group">
                        <label for="state" class="text-primary">Last Name : </label>
                        <select class="form-control" id="state" v-model="state">
                            <select name="state" class="span12">
                                <option value="">Select State</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="District of Columbia">District of Columbia</option>
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

                        </select>
                        <!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with-->
                        <!--                            anyone else.</small>-->
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'PersonalInfo',
    data() {
        return {
            //
        }
    }
}

</script>
