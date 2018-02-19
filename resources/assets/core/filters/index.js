import Vue from 'vue'
import {currency} from './currency'

Vue.filter('currency', currency)
Vue.filter('title', (value) => {
    if(!value){
        return ''
    }
    if (value.length > 12)
        return value.substr(0, 12) + '...'
    return value;
})
Vue.filter('titlePreview', (value) => {
    if(!value){
        return ''
    }
    if (value.length > 15)
        return value.substr(0, 15) + '...'
    return value;
})
Vue.filter('type', (value) => {
    if(!value){
        return ''
    }
    if (value.length > 15)
        return value.substr(0, 15) + '...'
    return value;
})
Vue.filter('excerpt', (value) => {
    if(!value){
        return ''
    }
    if (value.length > 100)
        return value.substr(0, 100) + '...'
    return value;
})
Vue.filter('bigExcerpt', (value) => {
    if(!value){
        return ''
    }
    if (value.length > 220)
        return value.substr(0, 220) + '...'
    return value;
})
Vue.filter('coma', (value) => {
    if (value) {
        return ', ' + value
    }
    return ''
})