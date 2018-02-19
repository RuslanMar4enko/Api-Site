import * as _ from "lodash";
import * as axios from "axios";
import $ from 'jquery'

export default class Ajax {
    constructor() {
        this.status = null

        this.isHolding = false;
        this.isProcessing = false;

        this.holdenSuccessCallback = () => {}
        this.holdenErrorCallback = () => {}
    }

    /**
     * @private
     */
    sendHold(requestType, url, data) {
        if (this.isHolding) {
            this.isHolding = false;
            this.submit(url, requestType, data).then((response) => {
                this.holdenSuccessCallback(response)
            }).catch(() => {
                this.holdenErrorCallback(response)
            })

        }
    }


    sendWithHolding(url, method, data): Promise {
        if (!this.isProcessing) {
            return this.submit(url, method, data)
        } else {
            this.isHolding = true;
        }
        return new Promise((resolve, reject) => {
            this.holdenSuccessCallback = resolve
            this.holdenErrorCallback = reject
        })
    }

    send(url, method, data) {

        return this.submit(url, method, data)
    }

    post(url, data) {
        return this.submit(url, 'post', data)
    }

    get(url, data) {
        return this.submit(url, 'get', {params: data})
    }

    /**
     * @private
     */
    submit(url, method, data) {
        this.isProcessing = true;
        if(method === 'get'){
            url = url+'?'+ $.param(data, false)
            data = undefined
        }
        return new Promise((resolve, reject) => {
            axios[method](url, data)
                .then(response => {
                    this.status = _.get(response, 'status');
                    this.isProcessing = false;
                    resolve(response);
                    this.sendHold(method, url, data);
                })
                .catch((error) => {
                    this.status = _.get(error, 'response.status');
                    this.isProcessing = false;
                    if(this.status === 406){
                        location.reload()
                    }
                    reject(error.response);
                    this.sendHold(method, url, data);
                });
        })
    }


}