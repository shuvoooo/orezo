<template>
    <div class="container">
        <div class="row py-5 mt-4 align-items-center justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="row">

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" v-validate="'required|email'" name="email"
                               placeholder="Email Address" v-model="email"
                               class="form-control bg-white border-left-0 border-md">
                        <span v-if="errors.has('email')" class="small text-danger w-100">{{
                                errors.first('email')
                            }}</span>

                    </div>


                    <!-- Password -->
                    <div class="input-group  col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" v-validate="'required'" name="password"
                               placeholder="Password" v-model="password"
                               class="form-control bg-white border-left-0 border-md">

                        <span v-if="errors.has('password')" class="small text-danger w-100">{{
                                errors.first('password')
                            }}</span>

                    </div>


                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button role="button" class="btn btn-primary btn-block py-3" @click="login"
                                :disabled="isLoading">
                            <span class="spinner" v-if="isLoading">
                                <i class="fa fa-spinner fa-spin"></i>
                            </span>
                            <span class="font-weight-bold">Login</span>
                        </button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>


                    <!-- Already Registered -->
                    <div class="text-center w-100 d-flex justify-content-between">
                        <a href="/register" class="text-primary ml-2">Create an account</a>
                        <a href="/password/reset" class="text-primary ml-2">Forgot password?</a>
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
            email: '',
            password: '',
        }
    },

    methods: {
        login(e) {
            e.preventDefault()
            this.$validator.validateAll().then(result => {
                if (result) {
                    this.isLoading = true;

                    axios.post('/login', {
                        email: this.email,
                        password: this.password
                    }).then(response => {
                        this.isLoading = false;
                        location.href = '/dashboard/year';
                    }).catch(error => {
                        this.backendError(error);
                    });
                }
            })
        }
    }
}
</script>
