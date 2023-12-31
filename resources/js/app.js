/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');


window.Vue = require('vue').default;
window.axios = require('axios');
import VeeValidate from "vee-validate";

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    'Accept': 'application/json'
};

window.axios.defaults.baseURL = process.env.MIX_APP_URL;
window.Year = document.querySelector('meta[name="year"]').getAttribute('content');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VeeValidate); // Install the VeeValidate plugin

Vue.mixin({
    data: function () {
        return {
            isLoading: false,
            msg: "",
            Year: window.Year,
        }
    },
    methods: {
        backendError(errors) {
            this.isLoading = false;

            if (errors.response.status === 422) {
                var msg = "";
                for (let field in errors.response.data.errors) {
                    this.errors.add({
                        field: field,
                        msg: errors.response.data.errors[field].join(', '),
                    });

                    msg += errors.response.data.errors[field].join(', ') + ',\n';
                }
                this.msg = msg;
            } else {
                alert(errors.response.data.message);
                this.msg = errors.response.data.message;
            }

        }
    }
});


const app = new Vue({
    el: '#app',
});
