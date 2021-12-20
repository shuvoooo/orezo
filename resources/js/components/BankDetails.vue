<template>
    <div class="row">
        <div class="col-md-8">
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bank"></i>
                        Bank Details
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-dark">Bank Account Number</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="account_number"
                                       placeholder="Bank Account Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-dark">Bank Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="name" placeholder="Bank Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-dark">Account Holder Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="account_holder_name"
                                       placeholder="Account Holder Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-dark">Routing Number</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="routing_number"
                                       placeholder="Routing Number">
                            </div>
                        </div>

                        <!--Account Type-->

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-dark">Account Type</label>
                            <div class="col-md-9">
                                <select class="form-control" v-model="account_type">
                                    <option value="">Select Account Type</option>
                                    <option value="savings">Savings</option>
                                    <option value="checking">Checking</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button
                            type="submit"
                            class="btn btn-primary"
                            @click.prevent="save"
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
    props: ['bankDetails'],
    data() {
        return {
            account_number: this.bankDetails.account_number || '',
            name: this.bankDetails.name || '',
            account_holder_name: this.bankDetails.account_holder_name || '',
            routing_number: this.bankDetails.routing_number || '',
            account_type: this.bankDetails.account_type || '',
        }
    },


    methods: {
        save() {
            this.isLoading = true;
            axios.post(Year + '/info/bank_details', {
                account_number: this.account_number,
                name: this.name,
                account_holder_name: this.account_holder_name,
                routing_number: this.routing_number,
                account_type: this.account_type,
            }).then(response => {
                this.isLoading = false;
                this.msg = response.data.success;
                location.reload();
            }).catch(error => {
                this.backendError(error);
            });
        }
    }
}

</script>
