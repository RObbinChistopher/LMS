import axios from 'axios'
import config from '../../config.js'
const cousreModule = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            cousre: [],
            cousreLoading: false,
            singleCousre: [],
            singleCousreLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_COUSRE(state, data)
        {
            state.cousre = data;
        },
        SET_COUSRE_LOADING(state, data)
        {
            state.cousreLoading = data;
        },
        SET_SINGLE_COUSRE(state, data)
        {
            state.singleCousre = data;
        },
        SET_SINGLE_COUSRE_LOADING(state, data)
        {
            state.singleCousreLoading = data;
        },
    },
    actions: {
        async fetchShowCousre({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-cousre-by-own?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COUSRE_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COUSRE', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COUSRE_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchCousre({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-cousre?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COUSRE_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COUSRE', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COUSRE_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchAllCousre({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-all-cousre`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COUSRE_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COUSRE', response.data.data);
                commit('SET_COUSRE_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditCousre({ commit }, id) {
            let url = config.apiBaseUrl + `edit-cousre/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_COUSRE_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_COUSRE', response.data.data);
                commit('SET_SINGLE_COUSRE_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchCousreSearch({ commit }, query) {
            let url = config.apiBaseUrl + `cousre-search`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COUSRE_LOADING', true);
                let response = await axios.post(url, { query }, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COUSRE', response.data.data);
                commit('SET_COUSRE_LOADING', false);
            } catch (error) {
                console.log('error', error);
                commit('SET_COUSRE_LOADING', false);
            }
        },
        async deleteCousre({ commit }, id) {
            let url = config.apiBaseUrl + `delete-cousre/${id}`;
            const token = localStorage.getItem('token');
            try {
                let response = await axios.delete(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
            } catch (error) {
                console.log('error', error)
            }
        },
    }
};

export default cousreModule;