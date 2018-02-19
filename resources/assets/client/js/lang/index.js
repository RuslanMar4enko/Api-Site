import Vue from 'vue'
import env from '../config'
import vueI18n from 'vue-i18n'
Vue.use(vueI18n);
Vue.config.lang = env.lang.default;
Vue.config.fallbackLang = env.lang.fallback;
import locales from './locales';
Object.keys(locales).forEach(function (lang) {
    Vue.locale(lang, locales[lang]);
});
