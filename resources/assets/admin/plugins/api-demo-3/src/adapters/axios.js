import axios from 'axios'

export default function load(request) {
    console.log(request)
    return axios[request.method](request.url)
}