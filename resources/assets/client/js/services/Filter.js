import * as _ from 'lodash'
import Ajax  from './AjaxDriver'
import CollectionHelpers from "../../../core/services/CollectionHelpers";


export default class Filter {

    constructor(data = {}) {


        this.pagination = data.pagination || {};
        this.ajax = new Ajax();

        this.query = data.query || {};
        this.originalQuery = _.cloneDeep(this.query);

        this.data = data.data || [];
        this.originalData = _.cloneDeep(this.data);


        this.url = data.url || [];
        this.method = data.method || 'post';

        this.mapTo = data.mapTo || null
    }

    /**
     * @private
     */
    makeAction(options) {
        let holding = options.holding || false,
            type = '',
            method = options.method || this.method,
            url = options.url || this.url,
            data = options.data || this.data,
            query = options.query || this.query;


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
            this.ajax[type](url, method, query).then((response) => {

                if (!_.isEmpty(this.pagination)) {
                    this.pagination.setPagination(response.data);
                }

                resolve(_.get(response, 'data.data', _.cloneDeep(this.originalData)))
            }).catch((response) => {
                reject(response)
            });
        })
    }

    search(options = {}) {
        /**
         * Settings
         */
        let loadMore = options.loadMore || false;
        let fetch = options.fetch || false;
        let mapTo = options.mapTo || this.mapTo;
        let populate = options.populate || mapTo !== null;
        let cache = options.cache || false;





        return new Promise((resolve, reject) => {
            this.makeAction(options).then((data) => {

                let result = data;


                if (populate)
                    result = this.populateMany(result, this.mapTo)

                if (loadMore)
                    this.data = this.data.concat(result)

                if (fetch)
                    this.data = result


                resolve(data)

            }).catch((response) => {

                reject(response)

            })
        })
    }


    populateMany(data: Array, className) {

        return CollectionHelpers.map(data, className)

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