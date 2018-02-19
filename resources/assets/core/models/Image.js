export default class Image {

    constructor(data = {}){

        this.id = data.id;
        this.name = data.name;
        this.size = data.size;
        this.type = data.type;
        this.url = data.url;
        this.thumbnail = data.thumbnail;
        this.thumbnail_url = data.thumbnail_url;
        this.product_little_thumbnail = data.product_little_thumbnail;
        this.product_large_thumbnail = data.product_large_thumbnail;
        this.widget_thumbnail = data.widget_thumbnail;
        this.article_little_thumbnail = data.article_little_thumbnail;
        this.article_large_thumbnail = data.article_large_thumbnail;
        this.width = data.width;
        this.height = data.height;
        this.created_at = data.created_at;
        this.updated_at = data.updated_at;

    }



}