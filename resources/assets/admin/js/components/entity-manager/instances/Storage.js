class Storage {
    constructor(){
        this.tabs = []
        this.selectedTab = {}
    }
    stringify(){
        return JSON.stringify(this)
    }
}
export default new Storage();