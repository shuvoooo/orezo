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
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title" class="text-dark">Invoice Title</label>
                                <input name="title" type="text" class="form-control" id="title"
                                       placeholder="Invoice Title">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="comment" class="text-dark">Comments</label>
                                <input name="comment" type="text" class="form-control" id="comment"
                                       placeholder="Comments">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5 col-9"></div>
                        <div class="col-md-2 col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5 col-9"></div>
                        <div class="col-md-2 col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

export default {
    components: {
        "vue-select": vSelect
    },
    data() {
        return {
            clientData: [],
            options: [],
            selectedClient: null,
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
        onChange(value) {
            this.clientData.client_id = value;
        },
        onSubmit() {
            axios.post('/admin/invoice-create', this.clientData).then(response => {

            });
        }
    }
}
</script>
