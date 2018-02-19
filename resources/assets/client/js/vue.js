import Vue from 'vue'
import store from './store'
import router from './router'
import './lang'
import './plugins'
import '../../core/filters'
import '../../core/directives'

import App from './app.vue'
new Vue({
    el: '#app',
    store,
    router,
    render: h => h(App)
})