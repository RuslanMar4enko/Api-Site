import CollectionHelpers from '../services/CollectionHelpers'
import Image from './Image'
import Category from './Category'
import ObjectHelpers from '../services/ObjectHelpers'
export default class Type {
    
    constructor(data = {}) {
        this.id = data.id
        this.created_at = data.created_at
        this.id = data.id
        this.title = data.title
        this.description = data.description
        this.updated_at = data.updated_at
        this.category = new Category(data.category || {})
        this.images = data.images ? CollectionHelpers.map(data.images, Image) : []
        this.image = data.images && data.images[0] ? new Image(data.images[0]) : null
    
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