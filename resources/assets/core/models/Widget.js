import Image from './Image'
import CollectionHelpers from '../services/CollectionHelpers'
export default class Widget {

    constructor(data = {}) {

        this.id = data.id
        this.description = data.description
        this.product_id = data.product_id
        this.title = data.title
        this.updated_at = data.updated_at
        this.created_at = data.created_at

        this.image = data.image ? new Image(data.image) : null
        this.images = CollectionHelpers.map(data.images, Image)
    
        this.en = {
            title: data.en && data.en.title,
            description: data.en && data.en.description,
        }
        this.ru = {
            title: data.ru && data.ru.title,
            description: data.ru && data.ru.description,
        }
        this.ge = {
            title: data.ge && data.ge.title,
            description: data.ge && data.ge.description,
        }
    }


}