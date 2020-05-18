import Vue from 'vue';

export default {
    namespaced: true,

    state: {
        list: {}
    },

    getters: {
        list (state) {
            return state.list;
        }
    },

    mutations: {
        ['FETCH_LIST_SUCCESS'] (state, { relationClass, data }) {
            Vue.set(state.list, relationClass, data);
        }
    },

    actions: {
        list ({state, commit, rootState}, params) {
            return Vue.axios.get('/content/api/v1/relation/list', { params: params })
                .then(
                    response => commit('FETCH_LIST_SUCCESS', {
                        relationClass: params.relationClass,
                        data: response.data
                    }),
                    error => {}
                )
        }
    }
};
