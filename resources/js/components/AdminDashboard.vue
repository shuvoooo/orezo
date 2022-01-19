<template>
    <div class="row">
        <div class="col-md-6 my-3">
            <div class="card border border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="fa fa-dollar"></i>
                    Total Invoice
                </div>

                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="text-dark">From</label>
                            <input type="date" class="form-control" name="from" placeholder="From Date"
                                   v-model="invoiceFrom">
                        </div>

                        <div class="form-group col-md-5">
                            <label class="text-dark">To</label>
                            <input type="date" class="form-control" name="to" placeholder="From To" v-model="invoiceTo">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mb-3" :disabled="invoiceLoading"
                                    @click="invoiceSubmit">
                                <span class="spinner" v-if="invoiceLoading">
                                      <i class="fa fa-spinner fa-spin"></i>
                                </span>
                                Submit
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between my-2 p-3 rounded-lg" style="background:#dc354511;">
                        <div class="d-block">
                            <i class="flaticon-business-and-finance fa-3x"></i>
                            <div class="h4 font-weight-light">Total Invoice</div>
                        </div>
                        <div class="h1 font-weight-light align-self-center">
                            {{ totalInvoice }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6 my-3">
            <div class="card border border-warning">
                <div class="card-header bg-warning text-white">
                    <i class="fa fa-dollar"></i>
                    Total Revenue
                </div>

                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="text-dark">From</label>
                            <input type="date" class="form-control" name="from" placeholder="From Date"
                                   v-model="revenueFrom">
                        </div>

                        <div class="form-group col-md-5">
                            <label class="text-dark">To</label>
                            <input type="date" class="form-control" name="to" placeholder="From To" v-model="revenueTo">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mb-3" :disabled="revenueLoading"
                                    @click="revenueSubmit">
                                <span class="spinner" v-if="revenueLoading">
                                      <i class="fa fa-spinner fa-spin"></i>
                                </span>
                                Submit
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between my-2 p-3 rounded-lg" style="background:#ffc10711;">
                        <div class="d-block">
                            <i class="fa fa-area-chart fa-3x"></i>
                            <div class="h4 font-weight-light">Total revenue</div>
                        </div>
                        <div class="h1 font-weight-light align-self-center">
                            {{ totalRevenue }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6 my-3">
            <div class="card border border-info">
                <div class="card-header bg-info text-white">
                    <i class="fa fa-dollar"></i>
                    Total avg
                </div>

                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="text-dark">From</label>
                            <input type="date" class="form-control" name="from" placeholder="From Date"
                                   v-model="avgFrom">
                        </div>

                        <div class="form-group col-md-5">
                            <label class="text-dark">To</label>
                            <input type="date" class="form-control" name="to" placeholder="From To" v-model="avgTo">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mb-3" :disabled="avgLoading"
                                    @click="avgSubmit">
                                <span class="spinner" v-if="avgLoading">
                                      <i class="fa fa-spinner fa-spin"></i>
                                </span>
                                Submit
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between my-2 p-3 rounded-lg" style="background:#17a2b811;">
                        <div class="d-block">
                            <i class="fa fa-calculator fa-3x"></i>
                            <div class="h4 font-weight-light">Average Revenue</div>
                        </div>
                        <div class="h1 font-weight-light align-self-center">
                            {{ totalAvg }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminDashboard',
    props: ['invoice', 'revenue', 'avg'],
    data() {
        return {
            invoiceFrom: '',
            invoiceTo: '',
            revenueFrom: '',
            revenueTo: '',
            avgFrom: '',
            avgTo: '',

            invoiceLoading: false,
            revenueLoading: false,
            avgLoading: false,

            totalInvoice: this.invoice,
            totalRevenue: this.revenue,
            totalAvg: this.avg,
        }
    },
    methods: {
        invoiceSubmit() {
            this.invoiceLoading = true;
            axios.get('/admin', {
                params: {
                    'from_date': this.invoiceFrom,
                    'to_date': this.invoiceTo,
                    'action': 'invoice'
                }
            }).then(response => {
                this.invoiceLoading = false;
                this.totalInvoice = response.data.value;
            }).catch(error => {
                this.invoiceLoading = false;
                console.log(error);
            });
        },

        revenueSubmit() {
            this.revenueLoading = true;
            axios.get('/admin', {
                params: {
                    'from_date': this.revenueFrom,
                    'to_date': this.revenueTo,
                    'action': 'revenue'
                }
            }).then(response => {
                this.revenueLoading = false;
                this.totalRevenue = response.data.value;
            }).catch(error => {
                this.revenueLoading = false;
                console.log(error);
            });
        },


        avgSubmit() {
            this.avgLoading = true;
            axios.get('/admin', {
                params: {
                    'from_date': this.avgFrom,
                    'to_date': this.avgTo,
                    'action': 'avg'
                }
            }).then(response => {
                this.avgLoading = false;
                this.totalAvg = response.data.value;
            }).catch(error => {
                this.avgLoading = false;
                console.log(error);
            });
        },
    }
}
</script>
