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
                        <div class="col-3 pl-1">
                            Comments
                        </div>
                        <!--                        <div class="col-1 pl-1">-->
                        <!--                            Action-->
                        <!--                        </div>-->
                    </div>

                    <div class="row no-gutters py-2 border-bottom" v-for="(n,i) in title" :key='i'>
                        <div class="col-1">
                            {{ i + 1 }}
                        </div>
                        <div class="col-4 px-1">
                            {{ n }}
                        </div>

                        <div class="col-4 px-1">
                            <div class="d-flex my-1 px-2" v-for="(f,j) in files[i]">
                                <div style="background-color:#adc7f155;" class="rounded d-flex">
                                    <div>{{ f.name }}</div>
                                    <button @click="removeFile(i,j)"
                                            class="btn btn-primary badge border-0 align-self-center">
                                        &times;
                                    </button>
                                </div>
                            </div>
                            <label class="text-danger" :for="'fileSelector'+i" v-if="fileUploading[i]==false">
                                <i class="fa fa-plus-circle"></i> Add
                            </label>

                            <span v-else class="text-success">
                                <i class="fa fa-spinner fa-spin"></i> Uploading... ({{ fileUploadingProgress[i] }}%)
                            </span>

                            <input type="file" @change="handleFile($event, i)" class="d-none"
                                   :id="'fileSelector'+i">
                        </div>

                        <div class="col-3 pl-1">
                            <input type="text" class="form-control" v-model="comments[i]"
                                   v-on:input="handleComment($event,i )">
                        </div>

                        <!--                        <div class="col-1 pl-1">-->
                        <!--                            <button title="Click to Save" @click="handleSave(i)" class="btn btn-success ">-->
                        <!--                                <span class="spinner" v-if="fileUploading[i]">-->
                        <!--                                  <i class="fa fa-spinner fa-spin"></i>-->
                        <!--                                </span>-->
                        <!--                                <i class="fa fa-save"></i>-->
                        <!--                            </button>-->
                        <!--                        </div>-->
                    </div>

                    <div class="row">
                        <div class="col-12 text-center mt-10">
                            <button @click="handleFinish()" class="btn btn-primary" style="width: 200px">Finish</button>
                            <p class="text-danger">NB: Before click on finish button please SAVE the each row data from
                                action column.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>


<script>
const TITLE = [
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
];
import _ from 'lodash';

export default {
    props: ['documentDetails'],

    data() {
        return {
            title: TITLE,
            files: TITLE.map((t, i) => {
                const dataIndex = this.documentDetails.findIndex(d => d.title === t);

                if (dataIndex !== -1) {
                    return this.documentDetails[dataIndex].files.map(f => {
                        return {
                            id: f.id,
                            file: null,
                            name: f.filename,
                            origin: 'server'
                        }
                    });
                }
                return [];

            }),
            comments: TITLE.map((t, i) => {
                const dataIndex = this.documentDetails.findIndex(d => d.title === t);

                if (dataIndex !== -1) {
                    return this.documentDetails[dataIndex].comments;
                }
                return '';

            }),
            deletedFileIds: [[], [], [], [], [], [], [], [], [], [], []],
            fileUploadingProgress: new Array(10).fill(0),
            fileUploading: new Array(10).fill(false),
        }
    },

    // mounted() {
    //     this.documentDetails.map(n => {
    //         const index = this.title.findIndex(t => t === n.title);
    //
    //
    //         if (index !== -1) {
    //             this.files[index] = n.files.map(f => {
    //                 return {
    //                     id: f.id,
    //                     file: null,
    //                     name: f.name,
    //                     origin: 'server'
    //                 }
    //             });
    //
    //             this.comments[index] = n.comments;
    //             alert(this.comments[index]);
    //         }
    //     });
    // },

    methods: {
        handleFile(event, i) {
            this.fileUploading[i] = true;

            let formData = new FormData();
            formData.append('title', this.title[i]);
            formData.append('file', event.target.files[0]);

            var self = this;
            axios.post(Year + "/tax/upload-tax-documents-file", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: function (progressEvent) {
                    this.fileUploadingProgress[i] = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
                }.bind(self)
            }).then(function (response) {
                self.files[i].push({
                    id: response.data.id,
                    file: event.target.files[0],
                    name: response.data.name,
                    origin: 'server'
                });
                self.fileUploading[i] = false;

            }).catch(function (error) {
                self.backendError(error);
                self.fileUploading[i] = false;
            });
        },

        removeFile(i, j) {
            if (!confirm('Are you sure you want to delete this file?'))
                return;

            if (this.files[i][j].origin === 'server') {

                axios.post(Year + "/tax/upload-tax-documents-file-delete", {
                    fileId: this.files[i][j].id
                }).then(response => {
                    this.deletedFileIds[i].push(this.files[i][j].id);
                    this.files[i].splice(j, 1);
                });

            } else {
                this.files[i].splice(j, 1);
            }
        },

        handleSave(i) {
            if (this.fileUploading[i]) return;

            let formData = new FormData();
            formData.append('title', this.title[i]);
            formData.append('comments', this.comments[i]);
            formData.append('deletedFileIds', JSON.stringify(this.deletedFileIds[i]));

            if (this.files[i].length === 0) {
                alert('No file selected');
                return;
            }

            for (let file of this.files[i]) {
                if (file.origin === 'local') {
                    formData.append('files[]', file.file);
                }
            }

            this.fileUploading[i] = true;

            axios.post(Year + '/tax/upload-tax-documents', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                this.fileUploading[i] = false;
                alert(response.data.message);
                for (let file of this.files[i]) {
                    if (file.origin === 'local') {
                        file.origin = 'server';
                    }
                }
            }).catch(error => {
                this.fileUploading[i] = false;
                this.backendError(error);
            });
        },
        handleFinish() {
            if (confirm('Did you save and you want to finish?')) {
                location.reload();
            }
            return false;
        },


        handleComment: _.debounce(function (e, i) {
            axios.post(Year + '/tax/upload-tax-documents-comments', {
                title: this.title[i],
                comments: e.target.value
            }).then(response => {
                this.msg = response.data.message;
            }).catch(error => {
                this.backendError(error);
            });
        }, 500)
    }
}
</script>
