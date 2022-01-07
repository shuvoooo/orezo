<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h5>Edit Invoice</h5>
                </div>


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

                    <div class="row border-bottom mb-3" v-for="(n,i) in invoiceItems">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input :id="'item'+i" v-model="n.title" type="text" class="form-control"
                                       placeholder="Item"/>
                            </div>
                        </div>

                        <div class="col-md-5 col-9">
                            <div class="form-group">
                                <input :id="'price'+i" v-model="n.price" type="text" class="form-control"
                                       placeholder="Price"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-3">
                            <button class="btn btn-danger" @click="removeItem(i)">&times;</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input id="tax" type="text" class="form-control" disabled value="Tax"
                                       placeholder="Item"/>
                            </div>
                        </div>

                        <div class="col-md-5 col-9">
                            <div class="form-group">
                                <input id="taxV" type="text" class="form-control" disabled value="0"
                                       placeholder="Item"/>
                                <span class="help-block">Tax will be auto calculated 16% once saved</span>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input id="dis" type="text" class="form-control" disabled value="Discount"
                                       placeholder="Item"/>
                            </div>
                        </div>

                        <div class="col-md-5 col-9">
                            <div class="form-group">
                                <input id="dics" type="text" class="form-control" value="0" placeholder="Item"/>

                            </div>
                        </div>
                    </div>

                    <div class="row border-info border-top pt-3 mt-2">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn btn-info mx-2" @click="addItem">+ Add More Item</button>
                            <button class="btn btn-primary mx-2" @click="onSubmit(0)">Save</button>
                            <button class="btn btn-success mx-2" @click="onSubmit(1)">Save & Email</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
import 'vue-select/dist/vue-select.css';

export default {
    props: ['invoice', 'lastInvoiceItems', 'user'],
    data() {
        return {
            email: '',
            title: '',
            comment: '',
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



            axios.post('/admin/invoice/' + this.invoice.id + '/edit', data).then(response => {
                alert(response.data.message);
                location.href = response.data.redirect;
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
}
</script>
