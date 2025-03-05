import axios from 'axios'
import config from '../../config.js'
const courseMaterial = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            courseMaterial: [],
            courseMaterialLoading: false,
            singleCourseMaterial: [],
            singleCourseMaterialLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_COURSE_MATERIAL(state, data)
        {
            state.courseMaterial = data;
        },
        SET_COURSE_MATERIAL_LOADING(state, data)
        {
            state.courseMaterialLoading = data;
        },
        SET_SINGLE_COURSE_MATERIAL(state, data)
        {
            state.singleCourseMaterial = data;
        },
        SET_SINGLE_COURSE_MATERIAL_LOADING(state, data)
        {
            state.singleCourseMaterialLoading = data;
        },
    },
    actions: {
        async fetchShowCourseMaterial({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-cousre-material?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_MATERIAL_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_MATERIAL', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COURSE_MATERIAL_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditCourseMaterial({ commit }, id) {
            let url = config.apiBaseUrl + `edit-cousre-material/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_COURSE_MATERIAL_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_COURSE_MATERIAL', response.data.data);
                commit('SET_SINGLE_COURSE_MATERIAL_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchDeleteCourseMaterial({ commit }, id) {
            let url = config.apiBaseUrl + `delete-cousre-material/${id}`;
            const token = localStorage.getItem('token');
            try {
                let response = await axios.get(url, {
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

export default courseMaterial;