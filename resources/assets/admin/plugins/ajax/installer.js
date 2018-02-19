import Vue from 'vue'
import Ajax from './Ajax'
/**
 * @return Ajax
 */
function ajax() {
    return Ajax
}

Vue.use((vue) => {
    vue.prototype.$ajax = ajax();
})