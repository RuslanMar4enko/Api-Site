import CollectionHelpers from '../services/CollectionHelpers'
import Image from './Image'
import Category from './Category'
import Type from './Type'
import Widget from './Widget'
import Color from './Color'
import Characteristic from './Characteristic'
export default class Product {
    
    constructor(data = {}) {
        
        this.id = data.id
        this.body = data.body
        this.description = data.description
        this.old_price = data.old_pice
        this.price = data.price
        this.status = data.status
        this.title = data.title
        this.sub_title = data.sub_title
        this.type_id = data.type_id
        this.is_sale = data.is_sale
        this.updated_at = data.updated_at
        this.created_at = data.created_at
        
        this.en = {
            title: data.en && data.en.title,
            sub_title: data.en && data.en.sub_title,
            description:data.en && data.en.description,
            body:data.en && data.en.body,
        }
        this.ru = {
            title: data.ru && data.ru.title,
            sub_title: data.ru && data.ru.sub_title,
            description:data.ru && data.ru.description,
            body:data.ru && data.ru.body,
        }
        this.ge = {
            title: data.ge && data.ge.title,
            sub_title: data.ge && data.ge.sub_title,
            description:data.ge && data.ge.description,
            body:data.ge && data.ge.body,
        }
        
        
        this.images = data.images ? CollectionHelpers.map(data.images, Image) : []
        this.category = new Category(data.category || {})
        this.type = new Type(data.type || {})
        this.colors = CollectionHelpers.map(data.colors, Color)
        this.widgets = CollectionHelpers.map(data.widgets, Widget)
        this.characteristics = CollectionHelpers.map(data.characteristics, Characteristic)
        this.similar_products = CollectionHelpers.map(data.similar_products, Product)
        
    }
    
    get image() {
        return this.images[0]
    }
    
    
}