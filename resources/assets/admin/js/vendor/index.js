import env from '../env'
import axios from 'axios'
window.axios = axios;
window.axios.defaults.headers.common = env.axios.headers;
// window.axios.defaults.validateStatus{
//     validateStatus: function (status) {
//         console.log('asdasd')
//         return status >= 200 && status < 300; // default
//
//     },
// }

import $ from 'jquery'
window.$ = window.jQuery = $;
import 'bootstrap-less'
import 'jquery-slimscroll'
import 'admin-lte/dist/js/app'
import 'admin-lte/dist/js/demo'