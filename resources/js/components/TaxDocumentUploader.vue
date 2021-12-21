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
                        <div class="col-4 px-1">
                            Title
                        </div>
                        <div class="col-4 px-1">
                            Browse File
                        </div>
                        <div class="col-2 px-1">
                            Comments
                        </div>
                        <div class="col-1 pl-1">
                            Action
                        </div>
                    </div>

                    <div class="row no-gutters py-2 border-bottom" v-for="(n,i) in title" :key='i'>
                        <div class="col-1">
                            {{ i + 1 }}
                        </div>
                        <div class="col-4 px-1">
                            {{ n }}
                        </div>

                        <div class="col-4 px-1">
                            <div class="d-flex" v-for="(f,j) in files[i]">
                                <div style="background-color:#adc7f155;" class="rounded d-flex">
                                    <div>{{ f.name }}</div>
                                    <button @click="removeFile(i,j)"
                                            class="btn btn-primary badge border-0 align-self-center">
                                        &times;
                                    </button>
                                </div>
                            </div>
                            <label class="text-danger" :for="'fileSelector'+i">
                                <i class="fa fa-plus-circle"></i> Add
                            </label>

                            <input type="file" @change="handleFile($event, i)" class="d-none"
                                   :id="'fileSelector'+i">
                        </div>

                        <div class="col-2 px-1">
                            <input type="text" class="form-control" v-model="comment[i]">
                        </div>

                        <div class="col-1 pl-1">
                            <button @click="handleSave(i)" class="btn btn-success ">
                                <span class="spinner" v-if="fileLoading[i]">
                                  <i class="fa fa-spinner fa-spin"></i>
                                </span>
                                <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>


<script>

export default {

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
            files: [[], [], [], [], [], [], [], [], [], []],
            comment: new Array(10).fill(''),
            fileLoading: new Array(10).fill(false),
        }
    },

    methods: {
        handleFile(event, i) {
            this.files[i].push({
                id: Math.floor(Math.random() * (99999999 - 111 + 1)) + 111,
                file: event.target.files[0],
                name: event.target.files[0].name,
                origin: 'local'
            });
        },
        removeFile(i, j) {
            this.files[i].splice(j, 1);
        },

        handleSave(i) {
            if (this.fileLoading[i]) return;

            let formData = new FormData();
            formData.append('title', this.title[i]);
            formData.append('comment', this.comment[i]);

            for (let file of this.files[i]) {
                formData.append('files[]', file.file);
            }

            this.fileLoading[i] = true;

            axios.post(Year + '/tax/upload-tax-documents', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                this.fileLoading[i] = false;
                alert(response.data.message);
            }).catch(error => {
                this.fileLoading[i] = false;
                alert(error.response.data.message);
            });
        }


    }
}
</script>
