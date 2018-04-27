import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        item: {},

    },
    // getters: {
    //     getItem: state => {
    //         return state.item;
    //     }
    // },
    mutations: {
        setItem: (state, obj) => {
            state.item = obj;
        }
    },
    // actions: {
    //     setItem(context, data) {
    //         context.commit('setItem', data)
    //     }
    // }
});