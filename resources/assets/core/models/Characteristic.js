
export default class Characteristic {

    constructor(data = {}) {

        this.id = data.id
        this.title = data.title
        this.value = data.value
        this.type = data.type

        this.updated_at = data.updated_at
        this.created_at = data.created_at
    
    
        this.en = {
            title: data.en && data.en.title,
            value: data.en && data.en.value,
        }
        this.ru = {
            title: data.ru && data.ru.title,
            value: data.ru && data.ru.value,
        }
        this.ge = {
            title: data.ge && data.ge.title,
            value: data.ge && data.ge.value,
        }
    }



}