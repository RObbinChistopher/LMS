import axios from 'axios'
import config from '../../config.js'
const coursesModules = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            courseModular: [],
            courseModularLoading: false,
            singleCourseModular: [],
            singleCourseModularLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_COURSE_MODULAR(state, data)
        {
           state.courseModular = data; 
        },
        SET_COURSE_MODULAR_LOADING(state, data)
        {
           state.courseModularLoading = data; 
        },
        SET_SINGLE_COURSE_MODULAR(state, data)
        {
           state.singleCourseModular = data; 
        },
        SET_SINGLE_COURSE_MODULAR_LOADING(state, data)
        {
           state.singleCourseModularLoading = data; 
        },
    },
    actions: {
        async fetchShowCourseModular({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-cousre-modular?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_MODULAR_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_MODULAR', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COURSE_MODULAR_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditCourseModular({ commit }, id) {
            let url = config.apiBaseUrl + `edit-cousre-modular/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_COURSE_MODULAR_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_COURSE_MODULAR', response.data.data);
                commit('SET_SINGLE_COURSE_MODULAR_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchCourseModularBYId({ commit }, id) {
            let url = config.apiBaseUrl + `cousre-modular-by-id/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_MODULAR_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_MODULAR', response.data.data);
                commit('SET_COURSE_MODULAR_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchDeleteCourseModular({ commit }, id) {
            let url = config.apiBaseUrl + `delete-cousre-modular/${id}`;
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
        async fetchCousreModularSearch({ commit }, query) {
            let url = config.apiBaseUrl + `update-cousre-modular-search`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_MODULAR_LOADING', true);
                let response = await axios.post(url, { query }, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_MODULAR', response.data.data);
                commit('SET_COURSE_MODULAR_LOADING', false);
            } catch (error) {
                console.log('error', error);
                commit('SET_COURSE_MODULAR_LOADING', false);
            }
        },
    }
};
export default coursesModules;