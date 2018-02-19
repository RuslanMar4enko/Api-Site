import env from '../config'
import axios from 'axios'
window.axios = axios;
window.axios.defaults.headers.common = env.axios.headers;

import $ from 'jquery'
window.$ = window.jQuery = $;
import 'bootstrap-less'
import 'jquery-slimscroll'
import 'admin-lte/dist/js/app'
import 'admin-lte/dist/js/demo'