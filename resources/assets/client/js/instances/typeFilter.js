import Filter from "../services/Filter";
import Pagination from "../services/Pagination";
import Type from '../../../core/models/Type'
export default new Filter({
    url:'/api/types/get-many',
    query: {
        category_id:1
    },
    mapTo: Type,
    pagination: new Pagination()
})