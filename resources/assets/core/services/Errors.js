import * as _ from "lodash";
export default class Errors {
    constructor(data){
        data = _.cloneDeep(data)
        this.data = data
        this.originalData = _.cloneDeep(this.data)

    }

    has(path) {
        return _.has(this.data, path);
    }

    get(path) {
        return _.get(this.data, path);
    }
    set(path, value) {
        _.set(this.data, path, value);
    }
    any() {
        let result = false;
        Object.keys(this.data).forEach((error)=>{
            if (!_.isEmpty(this.data[error])) {
                result = true;
            }
        })
        return result
    }

    clear(field) {
        if (field) {
            _.set(this.data, field, [])
            return;
        }
        this.errors = _.cloneDeep(this.originalData);
    }


}