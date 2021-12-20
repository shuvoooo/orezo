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
                            Title
                        </div>
                        <div class="col-3 px-1">
                            Browse File
                        </div>
                        <div class="col-3 px-1">
                            Comments
                        </div>
                        <div class="col-2 pl-1">
                            Action
                        </div>
                    </div>

                    <div class="row no-gutters" v-for="(n,i) in title" :key='i'>
                        <div class="col-1">
                            {{ i + 1 }}
                        </div>
                        <div class="col-3 px-1">
                            {{ n }}
                        </div>

                        <div class="col-3 px-1">
                            <input type="file" @change="onFileChange(i)" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="col-3 px-1">
                            <input type="text" class="form-control" v-model="comments[i]">
                        </div>

                        <div class="col-2 pl-1">
                            Action
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>
<script>


import FileUploader from "./FileUploader";

export default {
    components: {
        FileUploader,
    },

    data() {
        return {
            title: [
                'W2 Form ( Wage Tax Statement)',
                'Form 1099 (Miscellaneous Income Statement)',
                '1099 Int (Interest Income Statement)',
                '1099 G ( State Tax Refund)',
                '1099 - R (Individual Retirement Arrangement)',
                '1098 (Home Mortgage Statement)',
                '1098 - T (Tuition fee Statement)',
                '1098 - E (Education Interest Loan)',
                '1065 K(Partnership)',
                'Upload other document'
            ],
            files: [[{}], [{}], [{}], [{}], [{}], [{}], [{}], [{}], [{}], [{}]],
            comments: []
        }
    },

    methods: {
        onFileChange(i) {
            this.files[i] = this.$refs.fileUploader.files;
        },
    }
}
</script>
