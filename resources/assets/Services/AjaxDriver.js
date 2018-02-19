import AbstractConnectionDriver from './AbstractConnectionDriver'
import axios from 'axios'

export default class Ajax {
    constructor(){
        this.isHolding = false;
        this.isProcessing = false;
        this.promis = null;
    }
    sendHold(requestType, url, data) {
        if (this.isHolding) {
            this.isHolding = false;
            this.submit(requestType, url, data);
        }
    }

    sendWithHolding(url, method, data): Promise {
        if (!this.isProcessing) {
            return this.submit(method, url, data)
        } else {
            this.isHolding = true;
        }
        return new Promise((resolve, reject) => {

        })
    }

    submit(method, url, data) {
        this.isProcessing = true;

        return new Promise((resolve, reject) => {
            axios[method](url, data)
                .then(response => {
                    resolve(response.data);
                    this.isProcessing = false;
                    this.sendHold(method, url, data);
                })
                .catch(error => {
                    reject(error.response);
                    this.isProcessing = false;
                    this.sendHold(method, url, data);
                });
        })
    }

}