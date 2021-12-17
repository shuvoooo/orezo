<template>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header"><h5>Expenses Details</h5></div>

                <div class="card-body">
                    <div class="row no-gutters bg-info py-2 px-1 text-white mb-2">
                        <div class="col-1">
                            SL
                        </div>
                        <div class="col-3 px-1">
                            Particulars
                        </div>
                        <div class="col-3 px-1">
                            Tax Payer
                        </div>
                        <div class="col-3 px-1">
                            Spouse
                        </div>
                        <div class="col-2 pl-1">
                            Remarks
                        </div>
                    </div>


                    <div class="row no-gutters" v-for="(n,i) in expenses.title">
                        <div class="col-1">
                            {{ i + 1 }}
                        </div>

                        <div class="col-3">
                            <p class="py-2">{{ n }} </p>
                        </div>

                        <div class="col-3 px-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1"
                                       v-model="expenses.taxpayer[i]">
                            </div>
                        </div>

                        <div class="col-3  px-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1" v-model="expenses.spouse[i]">
                            </div>
                        </div>
                        <div class="col-2 pl-1">
                            <div class="form-group">
                                <input type="text" class="form-control" :name="'title'+1" v-model="expenses.remark[i]">
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
    props: ['expense'],
    data() {
        return {
            expenses: {
                title: this.expense.title || [
                    "Meals Expenses Per Day",
                    "Monthly Stay Expenses",
                    "Laundry Expenses Per Month",
                    "Mode of Commuting",
                    "One Way Distance to office",
                    "Commuting Expenses Per Month",
                    "Incidental Expenses",
                    "Relocation Expenses",
                    "Visa Expenses",
                    "Job Hunting Expenses",
                    "Mobile Expenses Per Month",
                    "Internet Expenses Per Month",
                    "Job Training Expenses"
                ],
                taxpayer: this.expense.taxpayer || new Array(13).fill(''),
                spouse: this.expense.spouse || new Array(13).fill(''),
                remark: this.expense.remark || new Array(13).fill('')
            }
        }
    },
    methods: {
        onSubmit() {
            this.isLoading = true;
            axios.post('/tax/expense', {details: this.expenses}).then(response => {
                location.reload();
            }).catch(error => {
                this.backendError(error)
            });
        }
    }
}
</script>
