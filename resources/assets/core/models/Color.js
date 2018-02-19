import CollectionHelpers from '../services/CollectionHelpers'
import Image from './Image'
import Category from './Category'
import ObjectHelpers from '../services/ObjectHelpers'
import Type from './Type'
import Product from './Product'
export default class Color {
    
    constructor(data = {}) {
        
        this.id = data.id
        this.name = data.color
        this.color = data.color
        this.value = data.value
        
        this.product_id = data.product_id
        
        this.images = data.images ? CollectionHelpers.map(data.images, Image) : []
        this.assets = data.assets ? CollectionHelpers.map(data.assets, Image) : []
        this.product = data.product ? new Product(data.product) : null
        
        this.updated_at = data.updated_at
        this.created_at = data.created_at
    
    
        this.en = {
            color: data.en && data.en.color,
        }
        this.ru = {
            color: data.ru && data.ru.color,
        }
        this.ge = {
            color: data.ge && data.ge.color,
        }
    }
    
    
}