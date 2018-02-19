import Vue from 'vue'
import config from '../../config.js'

function app() {
    return {
        locale: config.lang.default,
        currency: config.currency,
        changeLocale(lang, path){
            localStorage.setItem('locale', lang)
            window.location = path
        },
    }
}

Vue.use((vue) => {
    vue.prototype.$app = app();
})