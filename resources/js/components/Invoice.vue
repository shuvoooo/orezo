<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h5>Invoice</h5>
                </div>


                <div class="card-body">
                    <div class="row border-bottom pb-3 mb-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="invoice_assign_to" class="text-dark">Invoice Assign To</label>
                                <vue-select class="vue-select3" name="select3"
                                            :options="options" v-model="selectedClient">
                                </vue-select>


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
                                <span class="help-block">Tax will be auto calculated 18% once saved</span>
                            </div>
                        </div>

                    </div>



                    <div class="row border-info border-top pt-3 mt-2">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn btn-info mx-2" @click="addItem">+ Add More Item</button>

                            <button class="btn btn-primary mx-2" @click="onSubmit(0)" :disabled="submitted">
                                <span class="spinner" v-if="submitted">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </span>

                                Save
                            </button>

                            <button class="btn btn-success mx-2" @click="onSubmit(1)" :disabled="submittedEmail">
                                <span class="spinner" v-if="submittedEmail">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </span>

                                Save & Email
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>


<script>
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const invoiceTopic = [
    'Federal Filing',
    'State Filing',
    'City Filing',
    'County Filing',
    'Credit',
    '2106 Planning',
    'Schedule A',
    'Sch E Planning',
    'Sch C Planning',
    'Stock Transaction',
    'ITIN Application',
    'Postal Charges',
    'Discount'
];

export default {
    components: {
        "vue-select": vSelect
    },
    data() {
        return {
            submitted: false,
            submittedEmail: false,
            clientData: [],
            options: [],
            selectedClient: {},
            email: '',
            title: '',
            comment: '',
            user_id: '',
            invoiceItems: [
                {
                    title: invoiceTopic[0],
                    price: 0,
                },
                {
                    title: invoiceTopic[1],
                    price: 0,
                },
                {
                    title: invoiceTopic[2],
                    price: 0,
                },
                {
                    title: invoiceTopic[3],
                    price: 0,
                },
                {
                    title: invoiceTopic[4],
                    price: 0,
                },
                {
                    title: invoiceTopic[5],
                    price: 0,
                },
                {
                    title: invoiceTopic[6],
                    price: 0,
                },
                {
                    title: invoiceTopic[7],
                    price: 0,
                },
                {
                    title: invoiceTopic[8],
                    price: 0,
                },
                {
                    title: invoiceTopic[9],
                    price: 0,
                },
                {
                    title: invoiceTopic[10],
                    price: 0,
                },
                {
                    title: invoiceTopic[11],
                    price: 0,
                },
                {
                    title: invoiceTopic[12],
                    price: 0,
                },
            ]
        }
    },

    mounted() {
        axios.get('/admin/client-list').then(response => {
            this.clientData = response.data;
            this.options = response.data.map(item => {
                return {
                    label: item.name,
                    value: item.id
                }
            });
        });

    },

    methods: {

        onSubmit(withEmail) {

            if(this.user_id == '') {
                alert('Please select a client');
                return;
            }

            if (withEmail)
                this.submittedEmail = true;
            else
                this.submitted = true;

            axios.post('/admin/invoice', {
                email: this.email,
                title: this.title,
                comment: this.comment,
                user_id: this.user_id,
                invoiceItems: this.invoiceItems,
                send_email: withEmail
            }).then(response => {
                if (withEmail)
                    this.submittedEmail = false;
                else
                    this.submitted = false;

                alert(response.data.message);
                location.href = response.data.redirect;
            }).catch(error => {
                console.log(error);
                if (withEmail)
                    this.submittedEmail = false;
                else
                    this.submitted = false;
            });
        },

        removeItem(index) {
            this.invoiceItems.splice(index, 1);
        },

        addItem() {
            this.invoiceItems.push({
                title: '',
                price: 0,
            });
        },
    },

    watch: {
        selectedClient(value) {
            this.user_id = value.value;
            this.email = this.clientData.find(v => v.id === value.value).email;
        }
    }
}
</script>
