import Filter from "../services/Filter";
import Pagination from "../services/Pagination";
import Article from '../../../core/models/Article'
export default new Filter({
    url:'/api/articles/get-many',
    query: {
        status: 'PUBLISHED'
    },
    mapTo: Article,
    pagination: new Pagination({
        per_page: 8
    })
})