<template>
    <form action="post" class="">
        <div class="card">
            <div class="card-header">
                <h5><i class="fa fa-user mr-3"></i>Add New Dependent Details</h5>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label class="col-form-label text-dark" for="fname">First Name </label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"
                           v-model="fname">
                    <small v-if="errors.has('fname')"
                           class="form-text text-danger">{{ errors.first('fname') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="mname">Middle Name </label>
                    <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name"
                           v-model="mname">
                    <small v-if="errors.has('mname')"
                           class="form-text text-danger">{{ errors.first('mname') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="lname">Last Name </label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name"
                           v-model="lname">
                    <small v-if="errors.has('lname')"
                           class="form-text text-danger">{{ errors.first('lname') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="date_of_birth">Date of Birth </label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                           placeholder="Date of Birth"
                           v-model="date_of_birth">
                    <small v-if="errors.has('date_of_birth')"
                           class="form-text text-danger">{{ errors.first('date_of_birth') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="relationship">Relationship </label>
                    <input type="text" class="form-control" id="relationship" name="relationship"
                           placeholder="Relationship"
                           v-model="relationship">
                    <small v-if="errors.has('relationship')"
                           class="form-text text-danger">{{ errors.first('relationship') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="ssn">SSN/ITIN </label>
                    <input type="number" class="form-control" id="ssn" name="ssn" placeholder="SSN/ITIN"
                           v-model="ssn">
                    <small v-if="errors.has('ssn')"
                           class="form-text text-danger">{{ errors.first('ssn') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="visa_status">Visa Status </label>
                    <input type="text" class="form-control" id="visa_status" name="visa_status"
                           placeholder="Visa Status"
                           v-model="visa_status">
                    <small v-if="errors.has('visa_status')"
                           class="form-text text-danger">{{ errors.first('visa_status') }}</small>
                </div>


                <div class="form-group">
                    <label class="col-form-label text-dark" for="date_of_entry_in_us">Date of Entry in
                        US</label>
                    <input type="date" class="form-control" id="date_of_entry_in_us" name="date_of_entry_in_us"
                           placeholder="Date of Entry in US"
                           v-model="date_of_entry_in_us">
                    <small v-if="errors.has('date_of_entry_in_us')"
                           class="form-text text-danger">{{ errors.first('date_of_entry_in_us') }}</small>
                </div>


            </div>
            <div class="card-footer bg-white">
                <button
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="onSubmit"
                    :disabled="isLoading"
                >
                        <span class="spinner" v-if="isLoading">
                          <i class="fa fa-spinner fa-spin"></i>
                        </span>

                        <span v-else>
                             <i class="fa fa-plus"></i>
                        </span>

                    Add
                </button>


                <a :href="'/'+Year+'/info/bank_details'" class="btn btn-info">
                    <i class="fa fa-arrow-circle-o-right"></i>
                    Next
                </a>
                <span class="badge badge-info ml-4" v-if="msg">{{ msg }}</span>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            fname: '',
            mname: '',
            lname: '',
            date_of_birth: '',
            relationship: '',
            ssn: '',
            visa_status: '',
            date_of_entry_in_us: '',

            msg: '',
        }
    },
    methods: {


        onSubmit() {
            this.isLoading = true;
            axios.post(Year + '/info/dependent-details', {
                fname: this.fname,
                mname: this.mname,
                lname: this.lname,
                date_of_birth: this.date_of_birth,
                relationship: this.relationship,
                ssn: this.ssn,
                visa_status: this.visa_status,
                date_of_entry_in_us: this.date_of_entry_in_us,
            }).then(response => {
                this.isLoading = false;
                location.reload();
            }).catch(error => {
                this.isLoading = false;
                this.backendError(error);
                this.msg = error.response.data.message;
            });
        }
    }
}
</script>
