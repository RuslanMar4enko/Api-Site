import api from '../src/accessor'

export default function (Vue){
    let api_demo = new Vue(api)
    api_demo.$options.root = '/api/'
    api_demo.$options.hold = [
        {url: '/api/bicycles'},

    ]
    api_demo.$options.cache = [
        {url: 'registry/profile/types/get-many'},

    ]

    api_demo.$options.sync = [
        {url: 'cashier/sales/create'}
    ]

    api_demo.$on('request-success', function (response) {

    })

    api_demo.$on('request-error', function (response) {

    })

    return api_demo
}