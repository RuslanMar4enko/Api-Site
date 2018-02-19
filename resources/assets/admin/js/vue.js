import Vue from 'vue'
import store from './store'
import router from './router'
import './lang'
import '../plugins/ajax/installer.js'

import vmMainContainer from './app.vue'
new Vue({
    el: '#app',
    store,
    router,
    render: h => h(vmMainContainer)
})