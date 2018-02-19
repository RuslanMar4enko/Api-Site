import Filter from "../services/Filter";
import Pagination from "../services/Pagination";
import Product from "../../../core/models/Product";



export default new Filter({
    url:'/api/products/get-many',
    query: {
        status:'PUBLISHED',
        title_like:null,
        price_from:null,
        price_to:null,
        category_id: null,
        type_id: null,
        is_sale: undefined,
        category:{
            id:null
        }
    },
    mapTo: Product,
    pagination: new Pagination({
        per_page: 16
    })
})