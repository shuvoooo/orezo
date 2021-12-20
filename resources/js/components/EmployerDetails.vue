<template>
    <div class="card">
        <div class="card-header">Employer Details</div>

        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="name" class="text-dark form-label">Employer Name</label>
                    <input type="text" class="form-control" id="name" v-model="name" name="name"
                           placeholder="Name"/>
                    <small v-if="errors.has('name')"
                           class="form-text text-danger">{{ errors.first('name') }}</small>
                </div>

                <div class="form-group">
                    <label for="start_date" class="text-dark form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" v-model="start_date" name="start_date"
                           placeholder="Start Date"/>
                    <small v-if="errors.has('start_date')"
                           class="form-text text-danger">{{ errors.first('start_date') }}</small>
                </div>

                <div class="form-group">
                    <label for="end_date" class="text-dark form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" v-model="end_date" name="end_date"
                           placeholder="End Date"/>
                    <small v-if="errors.has('end_date')" class="form-text text-danger">{{
                            errors.first('end_date')
                        }}</small>
                </div>

                <div class="form-group">
                    <label for="city" class="text-dark form-label">City</label>
                    <input type="text" class="form-control" id="city" v-model="city" name="city" placeholder="City">
                    <small v-if="errors.has('city')" class="form-text text-danger">{{ errors.first('city') }}</small>
                </div>

                <div class="form-group">
                    <label for="state" class="text-dark form-label">State</label>
                    <select id="state" class="form-control" name="state" v-model="state">
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
                    <small class="form-text text-danger">{{ errors.first('state') }}</small>
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

</template>

<script>
export default {
    data() {
        return {
            name: '',
            start_date: '',
            end_date: '',
            city: '',
            state: '',
            msg: '',
        }
    },

    methods: {
        onSubmit() {
            this.isLoading = true;

            axios.post(Year + '/tax/employer_details', {
                name: this.name,
                start_date: this.start_date,
                end_date: this.end_date,
                city: this.city,
                state: this.state,
            }).then(response => {
                this.isLoading = false;
                this.msg = response.data.message;
                location.reload();
            }).catch(error => {
                this.backendError(error);
                this.isLoading = false;
            });
        }
    }
}
</script>
