import axios from 'axios'
import config from '../../config.js'
const settingModule = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            setting: [],
            settingLoading: false,
            webPage: [],
            webPageLoading: false,
        }
    },
    mutations: {
        SET_SETTING(state, page) {
            state.setting = page
        },
        SET_SETTING_loading(state, page) {
            state.settingLoading = page
        },
        SET_WEBSITE_PAGES(state, page) {
            state.webPage = page
        },
        SET_WEBSITE_PAGES_loading(state, page) {
            state.webPageLoading = page
        },
    },
    actions: {
        async fetchSetting({ commit }) {
            let url = config.apiBaseUrl + `setting`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SETTING_loading', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SETTING', response.data);
                commit('SET_SETTING_loading', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchWebsitePages({ commit }) {
            let url = config.apiBaseUrl + `website-pages`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_WEBSITE_PAGES_loading', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_WEBSITE_PAGES', response.data);
                commit('SET_WEBSITE_PAGES_loading', false)
            } catch (error) {
                console.log('error', error)
            }
        },
    },
};
export default settingModule;