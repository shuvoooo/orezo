<template>
    <div class="card-body">
        <div class="row border-bottom pb-3 mb-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="invoice_assign_to" class="text-dark">Invoice Assign To</label>
                    <input class="form-control" :value="user.name" disabled>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="email" class="text-dark">Send to (Email)</label>
                    <input v-model="email" name="email" type="email" class="form-control" id="email"
                           placeholder="Email">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="title" class="text-dark">Invoice Title</label>
                    <input name="title" v-model="title" type="text" class="form-control" id="title"
                           placeholder="Invoice Title">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="comment" class="text-dark">Comments</label>
                    <input name="comment" v-model="comment" type="text" class="form-control" id="comment"
                           placeholder="Comments">
                </div>
            </div>

        </div>

        <h5 class="py-3">Items</h5>

        <div v-for="(n,i) in invoiceItems">
            <div v-if="n.title!=='Tax'" class="row border-bottom mb-3">
                <div class="col-md-5">
                    <div class="form-group">
                        <input :id="'item'+i" v-model="n.title" type="text" class="form-control"
                               placeholder="Item"/>
                    </div>
                </div>

                <div class="col-md-5 col-9">
                    <div class="form-group">
                        <input :id="'price'+i" v-model="n.price" type="number" step="0.001" class="form-control"
                               placeholder="Price"/>
                    </div>
                </div>
                <div class="col-md-2 col-3">
                    <button class="btn btn-danger" @click="removeItem(i)">&times;</button>
                </div>
            </div>

            <div v-if="n.title=='Tax'" class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input id="tax" type="text" class="form-control" disabled value="Tax"
                               placeholder="Item"/>
                    </div>
                </div>

                <div class="col-md-5 col-9">
                    <div class="form-group">
                        <input id="taxV" type="text" class="form-control" disabled v-model="tax"
                               placeholder="Item"/>
                        <span class="help-block">Tax will be auto calculated 18% once saved</span>
                    </div>
                </div>

            </div>
        </div>


        <div class="row border-info border-top pt-3 mt-2">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="alert alert-info">Total: {{ totalAmount }}</div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div>Invoice Link :</div>
                    <div class="user-select-all text-primary ml-2">{{ invoiceLink }}</div>
                </div>
            </div>
        </div>

        <div class="row border-info border-top pt-3 mt-2">
            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-info mx-2" @click="addItem">+ Add More Item</button>
                <button class="btn btn-primary mx-2" @click="onSubmit(0)">Save</button>
                <button class="btn btn-success mx-2" @click="onSubmit(1)">Save & Email</button>
            </div>

            <div class="col-12">
                <div class="alert alert-info mt-2" v-if="msg">
                    {{ msg }}
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import 'vue-select/dist/vue-select.css';

export default {
    props: ['invoice', 'lastInvoiceItems', 'user', 'invoiceLink'],
    data() {
        return {
            email: '',
            title: '',
            comment: '',
            tax: 0,
            totalAmount: 0,
            invoiceItems: [],
        }
    },
    created() {
        this.email = this.invoice.user_email;
        this.title = this.invoice.name;
        this.comment = this.invoice.description;
        this.invoiceItems = this.lastInvoiceItems.map(item => {
            return {
                id: item.id,
                title: item.title,
                price: item.price,
            }
        });

        let total = 0;
        this.invoiceItems.forEach(item => {
            if (item.price != "" && item.title != "Tax") {
                if (item.title == 'Discount')
                    total -= parseFloat(item.price);
                else
                    total += parseFloat(item.price);
            }
        });

        this.tax = (total * .18).toFixed(2);
        this.totalAmount = total + total * .18;
    },
    methods: {
        onSubmit(withEmail) {

            let data = {
                email: this.email,
                title: this.title,
                comment: this.comment,
                invoiceItems: this.invoiceItems,
                withEmail: withEmail,
            };


            axios.post('/admin/invoice/' + this.user.id + '/edit?year=' + window.Year, data).then(response => {
                alert(response.data.message);
                location.href = response.data.redirect;
            }).catch(error => {
                this.backendError(error)
            });
        },

        removeItem(index) {
            this.invoiceItems.splice(index, 1);
        },

        addItem() {
            this.invoiceItems.push({
                id: null,
                title: '',
                price: 0,
            });
        },


    },

    watch: {
        invoiceItems: {
            handler(value) {


                let total = 0;
                this.invoiceItems.forEach(item => {
                    if (item.price != "" && item.title != "Tax") {
                        if (item.title == 'Discount')
                            total -= parseFloat(item.price);
                        else
                            total += parseFloat(item.price);
                    }
                });
                this.tax = (total * .18).toFixed(2);
                this.totalAmount = total + parseFloat(this.tax);

            },
            deep: true
        }
    }
}
</script>
