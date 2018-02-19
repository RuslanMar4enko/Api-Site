import CollectionHelpers from '../services/CollectionHelpers'
import Image from './Image'
export default class Category {

    constructor(data = {}){
        this.id = data.id;
        this.title = data.title;
        this.images = CollectionHelpers.map(data.images, Image)
        this.created_at = data.created_at;
        this.updated_at = data.updated_at;
    
        this.en = {
            title: data.en && data.en.title,
        }
        this.ru = {
            title: data.ru && data.ru.title,
        }
        this.ge = {
            title: data.ge && data.ge.title,
        }
        
    }


    get image(){
        return this.images&&this.images[0]
    }

}