import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import routes from './routes'

const scrollBehavior = (to, from, savedPosition) => {
    if (savedPosition) {
        return savedPosition
    } else {
        return {x: 0, y: 0}
    }
};
let router = new VueRouter({
    mode: 'history',
    base: __dirname,
    scrollBehavior,
    linkActiveClass: 'active',
    routes,
});
export default router;