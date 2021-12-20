<template>
    <form action="" class="">
        <div class="card">
            <div class="card-header">
                <h4><i class="fa fa-user"></i>Residency Details</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-dark" for="payer"> Tax Payer State</label>
                    <div class="col-md-9">
                        <select class="form-control" name="payer" id="payer" v-model="payer">
                            <option value="" selected>Select State</option>
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
                    <label class=" col-md-3 col-form-label text-dark" for="start_date"> Start Date </label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="start_date" name="start_date"
                               placeholder="Start Date"
                               v-model="start_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class=" col-md-3 col-form-label text-dark" for="end_date">End Date </label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="end_date" name="end_date" v-model="end_date"
                               placeholder="End Date">
                    </div>
                </div>

                <hr/>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-dark" for="spouse"> Spouse State </label>
                    <div class="col-md-9">
                        <select class="form-control" name="spouse" id="spouse" v-model="spouse">
                            <option value="" selected>Select State</option>
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
                    <label class=" col-md-3 col-form-label text-dark" for="spouse_start_date">Start Date </label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="spouse_start_date" name="spouse_start_date"
                               placeholder="Start Date"
                               v-model="spouse_start_date">
                    </div>
                </div>

                <div class="form-group row">
                    <label class=" col-md-3 col-form-label text-dark" for="spouse_end_date">End Date </label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="spouse_end_date" name="spouse_end_date"
                               v-model="spouse_end_date"
                               placeholder="End Date">
                    </div>
                </div>
            </div>
            <div class="card-footer text-center bg-white">
                <button
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="onSubmit"
                    :disabled="isLoading"
                >
                        <span class="spinner" v-if="isLoading">
                          <i class="fa fa-spinner fa-spin"></i>
                        </span>
                    Add Residency Details
                </button>
                <span class="badge badge-info ml-4" v-if="msg">{{ msg }}</span>
            </div>
        </div>
    </form>
</template>


<script>
export default {
    data() {
        return {
            payer: '',
            start_date: '',
            end_date: '',
            spouse: '',
            spouse_start_date: '',
            spouse_end_date: '',
        }
    },

    methods: {
        onSubmit() {
            axios.post(Year + '/tax/residency', {
                payer: this.payer,
                start_date: this.start_date,
                end_date: this.end_date,
                spouse: this.spouse,
                spouse_start_date: this.spouse_start_date,
                spouse_end_date: this.spouse_end_date,
            })
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    this.backendError(error);
                });
        }
    }
}
</script>
