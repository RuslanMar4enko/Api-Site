// localStorage.setItem('locale', 'en')
let locale = localStorage.getItem('locale')
let defaultLocale = locale?locale:window.Laravel.appLocale
export default {
    debug: window.Laravel.debug,
    mockApi: true,
    currency: '$',
    lang: {
        default: defaultLocale,
        fallback: 'en'
    },
    axios: {
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'app-locale': defaultLocale
        }
    }

}