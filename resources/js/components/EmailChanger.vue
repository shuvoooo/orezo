<template>
    <div class="card">
        <div class="card-header">
            Change Your Email
        </div>

        <div class="card-body">

            <div>Step 1 : Send OTP to Verify your current email</div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Your Current Email Address"
                       aria-label="Your Current Email Address" :value="user.email" disabled>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" @click="sendOTP" :disabled="otp_sent">
                         <span class="spinner" v-if="isLoading && otp_sent===false">
                          <i class="fa fa-spinner fa-spin"></i>
                        </span>
                        Send OTP
                    </button>
                </div>
            </div>

            <div v-if="otp_sent">Step 2 : Confirm OTP</div>

            <div class="input-group mb-3" v-if="otp_sent">
                <input type="text" class="form-control" placeholder="Enter OTP"
                       v-model="otp"
                       aria-label="Enter OTP">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" @click="confirmOTP"
                            :disabled="otp_verified">
                         <span class="spinner" v-if="isLoading && otp_verified===false">
                          <i class="fa fa-spinner fa-spin"></i>
                        </span>
                        Confirm OTP
                    </button>
                </div>
            </div>

            <template v-if="otp_verified">
                <div>Step 3 : Change your email</div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Your New Email Address" v-model="email"
                           aria-label="Your New Email Address">
                </div>

                <div>Password</div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Your Password" v-model="password"
                           aria-label="Your Password">
                </div>
                <button class="btn btn-primary" :disabled="email_changed==true" @click="changeEmail">
                     <span class="spinner" v-if="isLoading && email_changed===false">
                          <i class="fa fa-spinner fa-spin"></i>
                        </span>
                    Change Email
                </button>

            </template>

        </div>

        <div class="card-footer">
            <div class="badge badge-info" v-if="msg!=null">{{ msg }}</div>
        </div>
    </div>
</template>


<script>
export default {
    props: ['user'],
    data: function () {
        return {
            email: '',
            otp: '',
            password: '',
            otp_sent: false,
            otp_verified: false,
            email_changed: false,
        }
    },

    methods: {
        sendOTP: function () {
            this.isLoading = true;
            axios.post('/send_otp_email').then(res => {
                this.otp_sent = true;
                this.msg = res.data.message;
                this.isLoading = false;
            }).catch(err => {
                this.otp_sent = false;
                this.backendError(err);
            });
        },

        confirmOTP: function () {
            this.isLoading = true;
            axios.post('/verify_otp', {
                otp: this.otp
            }).then(res => {
                this.otp_verified = true;
                this.msg = res.data.message;
                this.isLoading = false;
            }).catch(err => {
                this.otp_verified = false;
                this.backendError(err);
            });
        },

        changeEmail: function () {
            this.isLoading = true;
            axios.post('/change_email', {
                email: this.email,
                password: this.password,
                otp: this.otp
            }).then(res => {
                this.email_changed = true;
                this.msg = res.data.message;
                this.isLoading = false;
            }).catch(err => {
                this.email_changed = false;
                this.backendError(err);
            });
        },

    },
}
</script>
