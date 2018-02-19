import * as _ from "lodash";
import Form from './Form';
import AjaxService from './AjaxDriver';
import AbstractConnectionDriver from "./AbstractConnectionDriver";
export default class FilterForm {

    constructor(data, pagination = {
        page: 0,
        per_page: 10,
        last_page: 0,
    }) {
        this.originalData = _.cloneDeep(data);
        this.data = data;
        this.pagination = pagination;
        this.method = 'get';
        this.url = '/api';


        this.isHolding = false;
        this.isProcessing = false;
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

    setUrl(url): Form {
        this.url = url;
        return this;
    }

    setMethod(method): Form {
        this.method = method;
        return this;
    }

    setData(data): Form {
        this.data = data;
        this.originalData = _.cloneDeep(data);
        return this;
    }
    setPagination(data): Form {
        this.pagination = data;
        return this;
    }

    search() {
        return new Promise((resolve, reject) => {
            this.sendWithHolding(this.url, this.method, this.makeData(this.data)).then((response) => {
                this.setPaginationFromData(response.data);
                resolve(response);
            }).catch((error) => {
                reject(error);
            })
        })
    }

    addPage() {
        if (this.canAddPage()) {
            this.pagination.page++
        }
        return this.pagination.page
    }

    subPage() {
        if (this.canSubPage()) {
            this.pagination.page--
        }
        return this.pagination.page;
    }

    canAddPage() {
        return this.pagination.page < this.pagination.last_page
    }

    canSubPage() {
        return this.pagination.page > 0
    }

    getNextPage(search) {
        if (this.canAddPage()) {
            this.addPage();
            return search()
        }
    }

    getPrevPage(search) {
        if (this.canSubPage()) {
            this.subPage();
            return search()
        }
    }

    setPaginationFromData(data) {
        let page = this.pagination.page;
        let last_page = _.get(data, 'meta.pagination.lastPage', 0);
        if (page > last_page) {
            page = last_page
        }
        this.pagination.page = page;
        this.pagination.last_page = last_page
    }

    makeData(originalData) {

        let data = _.cloneDeep(originalData);
        data.page = this.pagination.page;
        data.perPage = this.pagination.perPage;
        return data
    }

}