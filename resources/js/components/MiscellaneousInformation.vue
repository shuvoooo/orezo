<template>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header"><h5>Miscellaneous Details</h5></div>

                <div class="card-body">
                    <div class="row no-gutters bg-info py-2 px-1 text-white mb-2">
                        <div class="col-1   d-flex align-items-center ">
                            SL
                        </div>
                        <div class="col-3   d-flex align-items-center  pl-1">
                            Particulars
                        </div>
                        <div class="col-1   d-flex align-items-center  pl-1">
                            Tax Payer
                        </div>
                        <div class="col-1   d-flex align-items-center  pl-1">
                            Amount
                        </div>
                        <div class="col-2   d-flex align-items-center  pl-1">
                            Remarks
                        </div>
                        <div class="col-1   d-flex align-items-center  px-1">
                            Spouse
                        </div>
                        <div class="col-1   d-flex align-items-center  pl-1">
                            Amount
                        </div>
                        <div class="col-2   d-flex align-items-center  pl-1">
                            Remarks
                        </div>
                    </div>


                    <div class="row no-gutters" v-for="(n,i) in miscellaneous.title" :key='i'>
                        <div class="col-1   d-flex align-items-center ">
                            {{ i + 1 }}
                        </div>

                        <div class="col-3   d-flex align-items-center ">
                            <p class="py-2">{{ n }} </p>
                        </div>

                        <div
                            class="col-1 pl-1  d-flex align-items-center justify-content-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" v-model="miscellaneous.taxpayer[i]" class="custom-control-input"
                                       :id="'idCustomSw'+i">
                                <label class="custom-control-label text-dark" :for="'idCustomSw'+i"></label>
                            </div>
                        </div>

                        <div class="col-1   d-flex align-items-center  pl-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'amount'+i"
                                       v-model="miscellaneous.amount[i]"/>
                            </div>
                        </div>

                        <div class="col-2   d-flex align-items-center  pl-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'remarks'+i"
                                       v-model="miscellaneous.remark[i]"/>
                            </div>
                        </div>

                        <div
                            class="col-1   d-flex align-items-center  pl-1 d-flex align-items-center justify-content-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" v-model="miscellaneous.spouse[i]" class="custom-control-input"
                                       :id="'idCustomSw2'+i">
                                <label class="custom-control-label text-dark" :for="'idCustomSw2'+i"></label>
                            </div>
                        </div>

                        <div class="col-1   d-flex align-items-center  px-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'s_amount'+i"
                                       v-model="miscellaneous.s_amount[i]"/>
                            </div>
                        </div>

                        <div class="col-2   d-flex align-items-center  pl-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'s_remarks'+i"
                                       v-model="miscellaneous.s_remark[i]"/>
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
                        Save & Continue
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
    props: ['miscellaneousDetails'],
    data() {
        return {
            miscellaneous: {
                title: [
                    "Are you Paying any Mortgage Interest ?",
                    "Have you made any contributions to Retirement Savings ?",
                    "Have you earned any interest Income ?",
                    "Have you earned any dividend Income ?",
                    "Have you sold any Stocks during TY2017 ?",
                    "Do you have any Carry forward \/ Brought forward Loss amount from Stock sales in previous years?",
                    "Have you received any State Tax refund during TY2017 ?",
                    "Any Contribution amount paid towards Health Savings Account ?",
                    "Have you incurred any Medical expenses ?",
                    "Have you Incurred any expenses towards your Spouse Maternity ?",
                    "Have you made any Charitable\/Non Charitable Contributions ?"
                ],
                taxpayer: (this.miscellaneousDetails.taxpayer || []).map(item => item == "Yes") || new Array(11).fill(false),
                amount: this.miscellaneousDetails.amount || new Array(11).fill(''),
                remark: this.miscellaneousDetails.remark || new Array(11).fill(''),
                spouse: (this.miscellaneousDetails.spouse || []).map(item => item == "Yes") || new Array(11).fill(false),
                s_amount: this.miscellaneousDetails.s_amount || new Array(11).fill(''),
                s_remark: this.miscellaneousDetails.s_remark || new Array(11).fill(''),
            },

        }
    },
    methods: {
        onSubmit() {
            this.isLoading = true;
            axios.post(Year + '/tax/miscellaneous', {
                details: {
                    ...this.miscellaneous,
                    taxpayer: this.miscellaneous.taxpayer.map(item => item == true ? "Yes" : "No"),
                    spouse: this.miscellaneous.spouse.map(item => item == true ? "Yes" : "No"),
                }
            }).then(response => {
                //
                this.isLoading = false;
                this.msg = response.data.message;
                location.href=response.data.url;
            }).catch(error => {
                this.backendError(error)
            });
        }
    }
}
</script>
