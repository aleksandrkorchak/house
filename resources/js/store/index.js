import Vue from 'vue'
import Vuex from 'vuex'
import form from "./form";

Vue.use(Vuex);

const store = new Vuex.Store({
    // strict: process.env.NODE_ENV !== 'production',

    state: {
        houses: null,
        errors: null
    }
});


export default store;
