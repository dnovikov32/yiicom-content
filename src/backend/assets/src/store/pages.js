import Vue from 'vue';

export default {
    namespaced: true,

    state: {
        grid: null,
        model: {}
    },

    getters: {
        grid (state) {
            return state.grid;
        },
        model (state) {
            return state.model;
        }
    },

    mutations: {
        ['FETCH_ALL_SUCCESS'] (state, data) {
            state.grid = data;
        },
        ['FETCH_MODEL_SUCCESS'] (state, data) {
            state.model = data;
        },
        ['DELETE_MODEL_SUCCESS'] (state, data) {
            state.model = {};
        }
    },

    actions: {
        all ({state, commit, rootState}, params) {
            return Vue.axios.get('/content/api/v1/page/index', {params: params})
                .then(
                    response => commit('FETCH_ALL_SUCCESS', response.data),
                    error => {}
                )
        },

        find ({state, commit, rootState}, id) {
            return Vue.axios.get('/content/api/v1/page/find', {params: {id: id}})
                .then(
                    response => commit('FETCH_MODEL_SUCCESS', response.data),
                    error => {}
                )
        },

        save ({state, commit, rootState}, model) {
            return Vue.axios.post('/content/api/v1/page/save', model)
                .then(
                    response => commit('FETCH_MODEL_SUCCESS', response.data),
                    error => {}
                )
        },

        delete ({state, commit, rootState}, id) {
            return Vue.axios.post('/content/api/v1/page/delete', { id: id })
                .then(
                    response => commit('DELETE_MODEL_SUCCESS', response.data),
                    error => {}
                )
        }
    }
};
