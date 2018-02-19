export default class Test{

    constructor(data) {
        this.data = data
    }

    clear(field) {
        if (field) {
            console.log(this.data[field])
            delete this.data[field];
        }
    }
}