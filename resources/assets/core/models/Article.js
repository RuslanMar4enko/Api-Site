import CollectionHelpers from '../services/CollectionHelpers'
import Image from './Image'

export default class Article {

    constructor(data = {}) {

        this.id = data.id
        this.title = data.title
        this.sub_title = data.sub_title
        this.description = data.description
        this.body = data.body
        this.epilog = data.epilog
        this.status = data.status || 'PUBLISHED'
        this.created_at = data.created_at
        this.updated_at = data.updated_at

        this.assets = CollectionHelpers.map(data.assets, Image)
        this.image = data.assets && data.assets[0] ? new Image(data.assets[0]) : null
    
    
        this.en = {
            title: data.en && data.en.title,
            sub_title: data.en && data.en.sub_title,
            description: data.en && data.en.description,
            body: data.en && data.en.body,
            epilog: data.en && data.en.epilog,
        }
        this.ru = {
            title: data.ru && data.ru.title,
            sub_title: data.ru && data.ru.sub_title,
            description: data.ru && data.ru.description,
            body: data.ru && data.ru.body,
            epilog: data.ru && data.ru.epilog,
        }
        this.ge = {
            title: data.ge && data.ge.title,
            sub_title: data.ge && data.ge.sub_title,
            description: data.ge && data.ge.description,
            body: data.ge && data.ge.body,
            epilog: data.ge && data.ge.epilog,
        }
    }



}