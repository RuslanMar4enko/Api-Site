import * as _ from "lodash";
export default class Pagination {
    constructor(data){
        this.page = _.get(data, 'page', 1)
        this.perPage = _.get(data, 'per_page', 15)
        this.lastPage =  _.get(data, 'last_page', 0)
    }

    get canSubPage(): boolean {
        return this.page > 1
    }

    get canAddPage(): boolean {
        return this.page < this.lastPage
    }

    setPagination(data) {
        let page = this.page;
        let last_page = _.get(data, 'last_page', 1);
        if (page > last_page) {
            page = last_page
        }
        if(!last_page){
            page = 1
        }
        this.page = page;
        this.lastPage = last_page
    }

    addPage() {
        if (this.canAddPage) {
            this.page++
        }
        return this.page
    }

    subPage() {
        if (this.canSubPage) {
            this.page--
        }
        return this.page;
    }



}