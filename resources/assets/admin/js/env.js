export default {
    debug: window.Laravel.debug,
    mockApi: true,
    lang: {
        default: window.Laravel.appLocale,
        fallback: 'en'
    },
    axios: {
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'X-Requested-With': 'XMLHttpRequest'
        }
    },
    jquery: {
        headers: {
            xcsrfToken: window.Laravel.csrfToken,
            xRequestWith: 'XMLHttpRequest'
        }
    }

}