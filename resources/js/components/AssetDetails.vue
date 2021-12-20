<template>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header"><h5>Asset Details</h5></div>

                <div class="card-body">
                    <div class="row no-gutters bg-info py-2 px-1 text-white mb-2">
                        <div class="col-1">
                            SL
                        </div>
                        <div class="col-2 px-1">
                            Asset Name
                        </div>
                        <div class="col-2 px-1">
                            Date Of Purchase
                        </div>
                        <div class="col-2 px-1">
                            % Used in Business
                        </div>
                        <div class="col-2 pl-1">
                            Cost of Acquisition
                        </div>
                        <div class="col-3 pl-1">
                            Any Requirement
                        </div>
                    </div>


                    <div class="row no-gutters" v-for="(n,i) in assets.title" :key='i'>
                        <div class="col-1">
                            {{ i + 1 }}
                        </div>

                        <div class="col-2">
                            <p class="py-2">{{ n }} </p>
                        </div>

                        <div class="col-2 px-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1"
                                       v-model="assets.dateofpurchase[i]">
                            </div>
                        </div>

                        <div class="col-2  px-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1" v-model="assets.business[i]">
                            </div>
                        </div>
                        <div class="col-2 pl-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1"
                                       v-model="assets.acquisition[i]">
                            </div>
                        </div>
                        <div class="col-3 pl-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1"
                                       v-model="assets.reiumbersement[i]">
                            </div>
                        </div>
                    </div>
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
    name: 'ExpenseDetails',
    props: ['assetDetails'],
    data() {
        return {
            assets: {
                title: this.assetDetails.title || [
                    "Desktop",
                    "Laptop",
                    "Hardware Accessories",
                    "Printer",
                    "Software",
                    "Scanner",
                    "Fax",
                    "Copier",
                    "Computer Furniture",
                    "Cell Phone"
                ],
                dateofpurchase: this.assetDetails.dateofpurchase || new Array(10).fill(''),
                business: this.assetDetails.business || new Array(10).fill(''),
                acquisition: this.assetDetails.acquisition || new Array(10).fill(''),
                reiumbersement: this.assetDetails.reiumbersement || new Array(10).fill('')
            }
        }
    },
    methods: {
        onSubmit() {
            this.isLoading = true;
            axios.post(Year + '/tax/asset', {details: this.assets}).then(response => {
                //
                this.isLoading = false;
                this.msg = response.data.message;
            }).catch(error => {
                this.backendError(error)
            });
        }
    }
}
</script>
