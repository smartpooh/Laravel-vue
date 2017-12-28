import Vue from 'vue';
import Vuex from 'vuex';

import * as getters from './getters';
import menus from './modules/menus';
import pageTitle from './modules/pageTitle';

Vue.use(Vuex);

const store = new Vuex.Store({
    strict: true,  
    getters,
    modules: {
        menus,
    },
    state: {
    },
    mutations: {
    }
})

export default store;
