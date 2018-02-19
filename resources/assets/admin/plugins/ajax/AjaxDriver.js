import axios from 'axios'

export default class Ajax {
    constructor() {
        this.isHolding = false;
        this.isProcessing = false;
    }

    /**
     * Ajax
     */
    sendHolded(requestType, url, data) {
        if (this.isHolding) {
            this.isHolding = false;
            this.submit(requestType, url, data);
        }
    }

    /**
     * Ajax
     */
    sendWithHolding(method, url, data): Promise {
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
                    resolve(response);
                    this.isProcessing = false;
                    this.sendHolded(method, url, data);
                })
                .catch((error) => {
                    reject(error.response);
                    this.isProcessing = false;
                    this.sendHolded(method, url, data);
                });
        })
    }

    post(url, data) {
        this.sendWithHolding('post', url, data)
    }
    get(url, data) {
        this.sendWithHolding('get', url, data)
    }
}