window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { ToastProgrammatic as Toast } from 'buefy'

window.FormBuilder = function () {
    var form = this;

    this.loading = false;
    this.success = false;
    this.errors = {};

    this.get = function (uri, form) {
        return this.sendForm('get', uri, form);
    };

    this.post = function (uri, form) {
        return this.sendForm('post', uri, form);
    };

    this.put = function (uri, form) {
        return this.sendForm('put', uri, form);
    },

    this.patch = function (uri, form) {
        return this.sendForm('patch', uri, form);
    }

    this.delete = function (uri, form) {
        return this.sendForm('delete', uri, form);
    }

    this.sendForm = function (method, uri, form) {
        return new Promise((resolve, reject) => {
            this.loading = true;

            let data = form ? JSON.parse(JSON.stringify(form)) : null

            axios[method](uri, data)
                .then(response => {
                    this.loading = false;
                    this.success = true;

                    resolve({
                        data: response.data, 
                        message: (m) => {
                            Toast.open({
                                message: m,
                                type: 'is-success'
                            })
                        }
                    })
                })
                .catch(errors => {
                    this.loading = false;
                    this.success = false;
                    this.errors = errors.response.data.errors

                    reject({
                        data: errors.response.data, 
                        message: (m) => {
                            Toast.open({
                                message: m,
                                type: 'is-danger'
                            })
                        }
                    })
                });
        });
    }

    this.hasError = function (key) {
        if(key in this.errors)
            return (0 in this.errors[key]) ? this.errors[key][0] : this.errors[key]
        return null
    }
};

