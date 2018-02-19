import AjaxDriver from './AjaxDriver'
export default class Ajax {
    static post(url, data) {
        return new AjaxDriver().post(url, data)
    }
    static get(url, data) {
        return new AjaxDriver().get(url, data)
    }
}