import Filter from "../services/Filter";
import Pagination from "../services/Pagination";
import Category from "../../../core/models/Category";



export default new Filter({
    url:'/api/categories/get-many',
    query: {},
    mapTo: Category,
    pagination: new Pagination({
        per_page: null
    })
})