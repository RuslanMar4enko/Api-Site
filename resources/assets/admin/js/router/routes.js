import vmIndexPage from '../pages/vm-page-index.vue'
import vmOauth from '../pages/vm-oauth.vue'
import vmDashboard from '../pages/vm-dashboard.vue'
import vmProducts from '../pages/vm-products.vue'
import vmCharacteristics from '../pages/vm-characteristics.vue'
import vmWidgets from '../pages/vm-widgets.vue'
import vmCategories from '../pages/vm-categories.vue'
import vmTypes from '../pages/vm-types.vue'
import vmArticles from '../pages/vm-articles.vue'

export default [
    {path: '/admin/auth', component: vmOauth},
    {
        path: '/admin', component: vmIndexPage,
        children: [
            {
                path: '/',
                name: 'home',
                component: vmDashboard
            },
            {
                path: 'products',
                name: 'products',
                component: vmProducts
            },
            {
                path: 'characteristics',
                name: 'characteristics',
                component: vmCharacteristics
            },
            {
                path: 'widgets',
                name: 'widgets',
                component: vmWidgets
            },
            {
                path: 'categories',
                name: 'categories',
                component: vmCategories
            },
            {
                path: 'types',
                name: 'types',
                component: vmTypes
            },
            {
                path: 'articles',
                name: 'articles',
                component: vmArticles
            },

        ]

    },
]