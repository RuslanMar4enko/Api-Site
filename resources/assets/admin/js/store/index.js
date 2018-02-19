import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);
import state from './state'
import getters from './getters'
import actions from './actions'
import mutations from './mutations'
// import chat from './modules/chat'


const store = new Vuex.Store(
    {
        state,
        getters,
        actions,
        mutations,
        modules: {
            // chat
        }
    }
);

if (module.hot) {
    module.hot.accept([
        './state',
        './getters',
        './actions',
        './mutations',
        // './modules/chat',
    ], () => {
        store.hotUpdate({
            state: require('./state').default,
            getters: require('./getters').default,
            actions: require('./actions').default,
            mutations: require('./mutations').default,
            modules: {
                // chat: require('./modules/chat').default
            }
        })
    })
}

export default store