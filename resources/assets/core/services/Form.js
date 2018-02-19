import * as _ from 'lodash'
import Ajax  from './AjaxDriver'

import $ from 'jquery'
import 'notifyjs-browser'

export default class Form {

    constructor(data = {}) {
        data = _.cloneDeep(data)

        this.ajax = new Ajax()

        this.data = _.get(data, 'data', {})
        this.originalData = _.cloneDeep(this.data)

        this.errors = _.get(data, 'errors', {})
        this.originalErrors = _.cloneDeep(this.errors)

        this.isProcessing = false
        this.url = _.get(data, 'url', null)
        this.method = _.get(data, 'method', 'post')


        this.status = null

    }

    has(path) {
        return _.has(this.data, path)
    }

    getAttr(path) {
        return _.get(this.data, path)
    }

    setAttr(path, value) {
        _.set(this.data, path, value)
    }


    send(options) {
        let holding = _.get(options, 'holding', false),
            type = '',
            method = _.get(options, 'method', this.method),
            url = _.get(options, 'url', this.url),
            data = _.get(options, 'data', this.data)

        if (holding) {
            type = 'sendWithHolding'
        } else {
            type = 'send'
        }

        return new Promise((resolve, reject) => {
            this.ajax[type](url, method, data).then((response) => {
                console.log(response)
                this.status = _.get(response, 'status', null)

                resolve(_.get(response, 'data.data'))
            }).catch((error) => {
                let errors = _.get(error, 'data.errors', {})
                console.log(errors)
                Object.keys(errors).forEach((value) => {
                    this.errors.data[value] = errors[value] ? errors[value] : []
                })

                this.status = _.get(error, 'status', null)
                reject(error)
            })
        })
    }

    submit(options) {
        if (this.ajax.isProcessing)
            return new Promise((resolve, reject) => {
            })

        return this.send(options)
    }

    create(options = {}) {
        return this.send(options)
    }

    save(options = {}) {
        return new Promise((resolve, reject) => {
            this.send(options).then((data) => {

                $.notify('Success', 'success')
                resolve(data)
            }).catch((data) => {
                let status = data.status

                if (status === 422) {

                    $.notify('Validation Errors', 'warn')
                } else if (status === 404) {
                    $.notify('Not Found', 'warn')
                } else if (status === 403) {
                    $.notify('You are not authorized', 'warn')
                } else if (status === 401) {
                    $.notify('You are not authorized', 'warn')
                } else {
                    $.notify('Error', 'error')
                }
                reject(data)
            })
        })
    }

    get(options = {}) {
        options.method = 'get'
        if (!options.url) {
            options.url = this.url
        }
        if (options.id)
            options.url = `${options.url}/${options.id}`
        return new Promise((resolve, reject) => {
            this.send(options).then((data) => {

                this.data = data ? data : _.cloneDeep(this.originalData)
                resolve(data)
            }).catch((response) => {
                reject(response)
            })
        })
    }

    update(options = {}) {
        let id
        if (!options.url)
            options.url = this.url
        if (!options.id)
            id = this.data.id
        if (options.id)
            id = options.id

        options.method = 'put'
        options.url += `/${id}`
        return this.send(options)
    }

    destroy(options = {}) {
        let id
        if (!options.url) {
            options.url = this.url
        }
        if (!options.id)
            id = this.data.id
        if (options.id)
            id = options.id

        options.method = 'delete'
        options.url = `${options.url}/${id}`
        return this.send(options)
    }

    hasValidationError() {
        return this.hasStatus() && this.status === 422
    }

    hasException() {
        return this.hasStatus() && this.status !== 422 && this.status > 200
    }

    isDanger() {
        return !this.isSuccess() && this.hasStatus()
    }

    isSuccess() {
        return this.hasStatus() && this.status < 300 && this.status >= 200
    }

    hasStatus() {
        return this.status !== null
    }

    /**
     * Errors
     */

    hasError(path) {
        return this.errors.has(path)
    }

    getError(path) {
        return this.errors.get(path)
    }

    setError(path, value) {
        this.errors.set(path, value)
    }

    hasErrors() {
        this.errors.any()
    }

    clearErrors(field) {
        this.errors.clear(field)

        if (!this.hasErrors()) {
            this.status = null
        }
    }


    reset(options = {}): Object {
        let attributes = []
        if (_.isArray(options.except)) {
            for (let index in options.except) {
                let path = options.except[index]
                attributes[path] = _.get(this.data, path)
            }
        }

        this.data = _.cloneDeep(this.originalData)
        this.clearErrors()
        for (let path in attributes) {
            _.set(this.data, path, attributes[path])
        }
    }

    clear(data) {

        this.data = data
        this.clearErrors()
    }


}