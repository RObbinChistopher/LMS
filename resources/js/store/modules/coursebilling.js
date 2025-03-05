import axios from 'axios'
import config from '../../config.js'
const courseBilling = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            courseBilling: [],
            courseBillingLoading: false,
            singleCourseBilling: [],
            singleCourseBillingLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_COURSE_BILLING(state, page) {
            state.courseBilling = page
        },
        SET_COURSE_BILLING_LOADING(state, page) {
            state.courseBillingLoading = page
        },
        SET_SINGLE_COURSE_BILLING(state, page) {
            state.singleCourseBilling = page
        },
        SET_SINGLE_COURSE_BILLING_LOADING(state, page) {
            state.singleCourseBillingLoading = page
        },
    },
    actions: {
        async fetchShowCourseBilling({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-cousre-modular-billing?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_BILLING_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_BILLING', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COURSE_BILLING_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchFilterCourseBilling({ commit }, {id,page_number}) {
            let url = config.apiBaseUrl + `cousre-billing-filter/${id}?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_BILLING_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_BILLING', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COURSE_BILLING_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditCourseBilling({ commit }, id) {
            let url = config.apiBaseUrl + `edit-cousre-modular-billing/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_COURSE_BILLING_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_COURSE_BILLING', response.data.data);
                commit('SET_SINGLE_COURSE_BILLING_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchDeleteCourseBilling({ commit }, id) {
            let url = config.apiBaseUrl + `delete-cousre-modular-billing/${id}`;
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
    },
};
export default courseBilling;