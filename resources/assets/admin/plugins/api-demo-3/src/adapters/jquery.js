import $ from 'jquery'
import env from '../../../../js/env.js'
$.ajaxSetup({
    beforeSend: function(xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', env.jquery.headers.xcsrfToken);
        xhr.setRequestHeader('X-Requested-With', env.jquery.headers.xRequestWith);
    }
});
export default function load(request) {
    return $.ajax(request)
}