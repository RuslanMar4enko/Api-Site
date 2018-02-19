import * as _ from "lodash";
export default class {


    isValidation(code) {
        return this.hasCode(code) && code === 422
    }

    isException(code) {
        return this.hasCode(code) && code !== 422
    }

    isSuccess(code) {
        return this.hasCode(code) && code < 300 && code >= 200 && code > 100
    }

    hasCode(code) {
        return code !== null
    }

    clear(errors, field) {
        if (field) {
            delete errors[field];

            return errors;
        }

        return {}

    }
    refreshCode(errors, code){
        if(_.isEmpty(errors)){
            return null
        }
        return code;
    }
}