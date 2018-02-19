import * as _ from 'lodash'
import Ajax  from './AjaxDriver'


export default class Filter {

    constructor(data = {}) {


        this.pagination = _.get(data, 'pagination', {})
        this.ajax = new Ajax()

        this.query = _.get(data, 'query', {})
        this.originalQuery = _.cloneDeep(this.query)
        this.data = _.get(data, 'data', {})
        this.originalData = _.cloneDeep(this.data)

        this.isProcessing = false
        this.url = _.get(data, 'url', null);
        this.method = _.get(data, 'method', 'post');
    }

    /**
     * @private
     */
    makeAction(options) {
        let holding = _.get(options, 'holding', false),
            type = '',
            method = _.get(options, 'method', this.method),
            url = _.get(options, 'url', this.url),
            data = _.get(options, 'data', this.data);
        if (holding) {
            type = 'sendWithHolding'
        } else {
            type = 'send'
        }

        if (!_.isEmpty(this.pagination)) {
            this.query.per_page = this.pagination.perPage
            this.query.page = this.pagination.page
        }

        return new Promise((resolve, reject) => {
            this.ajax[type](this.url, this.method, this.query).then((response) => {

                if (!_.isEmpty(this.pagination)) {
                    this.pagination.setPagination(response.data);
                }

                resolve(_.get(response, 'data.data', _.cloneDeep(this.originalData)))
            }).catch((response) => {
                reject(response)
            });
        })
    }

    search(options) {
        let loadMore = _.get(options, 'loadMore', false);
        return new Promise((resolve, reject) => {
            this.makeAction(options).then((data) => {
                if (loadMore)
                    this.data = this.data.concat(data)
                else
                    this.data = data;

                resolve(data)
            }).catch((response) => {
                this.data = _.cloneDeep(this.originalData)
                reject(response)
            })
        })
    }


    cacheSearch(holding = false) {
        if (_.isEmpty(this.data) || _.isEqual(this.data, this.originalData)) {
            return this.search(holding)
        }
        return new Promise((resolve, reject) => {})
    }


    get(path) {
        return _.get(this.query, path);
    }

    set(path, value) {
        _.set(this.query, path, value);
    }

    get hasNoResults() {
        return _.isEmpty(this.data)
    }

}