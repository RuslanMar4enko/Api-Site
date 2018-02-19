import vmIndexPage from '../pages/vm-page-index.vue'
import vmHomePage from '../pages/vm-home-index.vue'
import vmIndex2Page from '../pages/vm-page2-index.vue'
import vmProductsPage from '../pages/vm-page-products.vue'
import vmSalesPage from '../pages/vm-page-sales.vue'
import vmAllProductsPage from '../pages/vm-page-categories.vue'
import vmProductPage from '../pages/vm-page-product.vue'
import vmArticlePage from '../pages/vm-page-article.vue'
import vmContactsPage from '../pages/vm-page-contacts.vue'
import vmLoginPage from '../pages/vm-page-login.vue'
import vmArticlesPage from '../pages/vm-page-articles.vue'
import vmNotFound from '../pages/vm-page-not-found.vue'
import vmTestProducts from '../../../../html/pages/vm-page-products.vue'
import vmTestProduct from '../../../../html/pages/vm-page-product.vue'
import vmTestArticle from '../../../../html/pages/vm-page-article.vue'
import vmTestIndex from '../../../../html/pages/vm-page-index.vue'
import vmSmartGridTest from '../pages/vm-smart-grid-test.vue'


export default [
    {
        path: '/',
        name: 'index',
        component: vmIndexPage
    },
    {path: '/categories', name: 'categories', component: vmAllProductsPage},
    {path: '/categories/:id', name: 'category', component: vmProductsPage},

    {path: '/articles', name: 'articles', component: vmArticlesPage},
    {path: '/articles/:id', name: 'article', component: vmArticlePage},

    {path: '/sales', name: 'sales', component: vmSalesPage},
    {path: '/sales/:id', name: 'sale', component: vmProductPage},

    {path: '/products', name: 'products', component: vmProductsPage},
    {path: '/products/:id', name: 'product', component: vmProductPage},

    {path: '/contacts', name: 'contacts', component: vmContactsPage},
    {path: '/sign-in', name: 'login', component: vmLoginPage},
    {path: '/site-map', name: 'site-map', component: vmLoginPage},
    {path: '/partners', name: 'partners', component: vmLoginPage},

    {path: '*', name: '404', component: vmNotFound},
    
    
    
    {path: '/test/page-index', name: 'test/page-index', component: vmTestIndex},
    {path: '/test/page-products', name: 'test/page-products', component: vmTestProducts},
    {path: '/test/page-product', name: 'test/page-product', component: vmTestProduct},
    {path: '/test/page-article', name: 'test/page-article', component: vmTestArticle},
    {path: '/test/smart-grid', name: 'test/smart-grid', component: vmSmartGridTest},




]