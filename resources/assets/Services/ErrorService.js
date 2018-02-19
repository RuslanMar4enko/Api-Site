import * as _ from "lodash";
export default class ErrorService {


    static isValidation(code) {
        return this.hasCode(code) && code === 422
    }

    static isException(code) {
        return this.hasCode(code) && code !== 422
    }

    static isSuccess(code) {
        return this.hasCode(code) && code < 300 && code >= 200 && code > 100
    }

    static hasCode(code) {
        return code !== null
    }

    static clear(errors, field, value = []) {
        _.set(errors, field, value)

        return errors;

    }

    static refreshCode(errors, code) {
        if (_.isEmpty(errors)) {
            return null
        }
        return code;
    }


    static isNotEmpty(errors: Object) {
        for (let error in errors) {
            if (!_.isEmpty(errors[error])) {
                return true;
            }
        }
        return false
    }

    static isEmpty(errors: Object) {
        return !this.isNotEmpty(errors)
    }
}