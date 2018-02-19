import Filter from "../services/Filter";
import Pagination from "../services/Pagination";
import Product from "../../../core/models/Product";



export default new Filter({
    url:'/api/products/get',
    query: {
        status: 'PUBLISHED'
    },
})