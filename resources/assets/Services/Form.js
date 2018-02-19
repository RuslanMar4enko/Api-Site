import AjaxDriver from "./AjaxDriver";
import ErrorService from "./ErrorService";
import Error from "./Error";
import axios from 'axios'
import * as _ from "lodash";
export default class Form {

    constructor(data = {}) {
        this.url = data.url;
        this.method = data.method;
        this.data = data.data;
        this.originalData = _.cloneDeep(data.data);
        this.errors = data.errors;
        this.originalErrors = _.cloneDeep(data.errors);
        this.status = data.status;
        /**
         * Ajax
         */
        this.isHolding = false;
        this.isProcessing = false;
    }

    /**
     * Ajax
     */
    sendHold(requestType, url, data) {
        if (this.isHolding) {
            this.isHolding = false;
            this.submit(requestType, url, data);
        }
    }

    /**
     * Ajax
     */
    sendWithHolding(url, method, data): Promise {
        if (!this.isProcessing) {
            return this.submit(method, url, data)
        } else {
            this.isHolding = true;
        }
        return new Promise((resolve, reject) => {

        })
    }

    /**
     * Ajax
     */
    submit(method, url, data) {
        this.isProcessing = true;
        return new Promise((resolve, reject) => {
            axios[method](url, data)
                .then(response => {
                    this.data = response.data.data;
                    resolve(response);
                    this.isProcessing = false;
                    this.sendHold(method, url, data);
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    this.status = error.response.status;
                    reject(error.response);
                    this.isProcessing = false;
                    this.sendHold(method, url, data);
                });
        })
    }

    setUrl(url): Form {
        this.url = url;
        return this;
    }

    /**
     * @return Form
     */
    setMethod(method): Form {
        this.method = method;
        return this;
    }

    setData(data): Form {
        this.data = data;
        this.originalData = _.cloneDeep(data);
        return this;
    }

    send(onSuccess = () => {
    }, onError = () => {
    }): Promise {
        return this.sendWithHolding(this.url, this.method, this.data).then((response) => {
            onSuccess(response);
        }).catch((response) => {
            onError(response);
        })
    }


    reset(): Object {
        this.data = _.cloneDeep(this.originalData)
        this.clearErrors()
    }

    /**
     * Error
     */

    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} path
     */
    has(path) {
        return _.has(this.errors, path);
    }


    /**
     * Determine if we have any errors.
     */
    hasErrors() {
        return ErrorService.isNotEmpty(this.errors);
    }

    hasValidationError() {
        return ErrorService.isValidation(this.status);
    }

    hasException() {
        return ErrorService.isException(this.status)
    }

    isSuccess() {
        return ErrorService.isSuccess(this.status)
    }

    hasStatus() {
        return this.status !== null
    }

    /**
     * Retrieve the error message for a field.
     *
     * @param {string} path
     */
    get(path) {
        return _.get(this.errors, path);
    }


    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clearErrors(field) {
        if (field) {
            this.errors = ErrorService.clear(this.errors, field)

            if (!this.hasErrors()) {
                this.status = null;
            }
            return;
        }

        this.errors = this.originalErrors;
        this.status = null;
    }
}