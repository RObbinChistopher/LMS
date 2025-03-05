import axios from 'axios'
import config from '../../config.js'
const categoryModule = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            category: [],
            categoryLoading: false,
            singleCategory: [],
            singleCategoryLoading: false,

            // SUBCATEGORY
            subCategory: [],
            subCategoryLoading: false,
            singleSubCategory: [],
            singleSubCategoryLoading: false,
            // CHILDCATEGORY
            childCategory: [],
            childcategoryLoading: false,
            singleChildcategory: [],
            singleChildcategoryLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_CATEGORY(state, data) {
            state.category = data;
        },
        SET_CATEGORY_LOADING(state, data) {
            state.categoryLoading = data
        },
        SET_SINGLE_CATEGORY(state, data) {
            state.singleCategory = data;
        },
        SET_SINGLE_CATEGORY_LOADING(state, data) {
            state.singleCategoryLoading = data
        },

        // SUBCATEGORY
        SET_SUBCATEGORY(state, data) {
            state.subCategory = data;
        },
        SET_SUBCATEGORY_LOADING(state, data) {
            state.subCategoryLoading = data
        },
        SET_SINGLE_SUBCATEGORY(state, data) {
            state.singleSubCategory = data;
        },
        SET_SINGLE_SUBCATEGORY_LOADING(state, data) {
            state.singleSubCategoryLoading = data
        },
        // CHILDCATEGORY
        SET_CHILDCATEGORY(state, data) {
            state.childCategory = data;
        },
        SET_CHILDCATEGORY_LOADING(state, data) {
            state.childcategoryLoading = data
        },
        SET_SINGLE_CHILDCATEGORY(state, data) {
            state.singleChildcategory = data;
        },
        SET_SINGLE_CHILDCATEGORY_LOADING(state, data) {
            state.singleChildcategoryLoading = data
        }
    },
    actions: {
        async fetchshowCategory({ commit }, page_number) {
            let url = config.apiBaseUrl + `categorys?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CATEGORY', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_CATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditCategory({ commit }, id) {
            let url = config.apiBaseUrl + `edit-category/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_CATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_CATEGORY', response.data.data);
                commit('SET_SINGLE_CATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchAllCategory({ commit }) {
            let url = config.apiBaseUrl + `show-categorys`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CATEGORY', response.data.data);
                commit('SET_CATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchCategorySearch({ commit }, query) {
            let url = config.apiBaseUrl + `category-search`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CATEGORY_LOADING', true);
                let response = await axios.post(url, { query }, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CATEGORY', response.data.data);
                commit('SET_CATEGORY_LOADING', false);
            } catch (error) {
                console.log('error', error);
                commit('SET_CATEGORY_LOADING', false);
            }
        },
        async fetchDeleteCategory({ commit }, id) {
            let url = config.apiBaseUrl + `delete-category/${id}`;
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




        // SUBCATEGORY
        async fetchshowSubCategory({ commit }, page_number) {
            let url = config.apiBaseUrl + `subcategory?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SUBCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SUBCATEGORY', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_SUBCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchAllSubCategory({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-subcategory`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SUBCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SUBCATEGORY', response.data.data);
                commit('SET_SUBCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchSubCategoryById({ commit }, id) {
            let url = config.apiBaseUrl + `subcategory-id/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SUBCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SUBCATEGORY', response.data.data);
                commit('SET_SUBCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditSubCategory({ commit }, id) {
            let url = config.apiBaseUrl + `edit-subcategory/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_SUBCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_SUBCATEGORY', response.data.data);
                commit('SET_SINGLE_SUBCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchSubCategorySearch({ commit }, query) {
            let url = config.apiBaseUrl + `search-subcategory`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SUBCATEGORY_LOADING', true);
                let response = await axios.post(url, { query }, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SUBCATEGORY', response.data.data);
                commit('SET_SUBCATEGORY_LOADING', false);
            } catch (error) {
                console.log('error', error);
                commit('SET_SUBCATEGORY_LOADING', false);
            }
        },
        async fetchDeleteSubCategory({ commit }, id) {
            let url = config.apiBaseUrl + `delete-subcategory/${id}`;
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

        // child category
        async fetchshowChildCategory({ commit }, page_number) {
            let url = config.apiBaseUrl + `childcategory?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CHILDCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CHILDCATEGORY', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_CHILDCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchAllChildCategory({ commit }) {
            let url = config.apiBaseUrl + `show-childcategory`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CHILDCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CHILDCATEGORY', response.data.data);
                commit('SET_CHILDCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchChildCategoryById({ commit }, id) {
            let url = config.apiBaseUrl + `childcategory-id/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CHILDCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CHILDCATEGORY', response.data.data);
                commit('SET_CHILDCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditChildCategory({ commit }, id) {
            let url = config.apiBaseUrl + `edit-childcategory/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_CHILDCATEGORY_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_CHILDCATEGORY', response.data.data);
                commit('SET_SINGLE_CHILDCATEGORY_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchDeleteChildCategory({ commit }, id) {
            let url = config.apiBaseUrl + `delete-childcategory/${id}`;
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
        async fetchChildCategorySearch({ commit }, query) {
            let url = config.apiBaseUrl + `search-childcategory`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_CHILDCATEGORY_LOADING', true);
                let response = await axios.post(url, { query }, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_CHILDCATEGORY', response.data.data);
                commit('SET_CHILDCATEGORY_LOADING', false);
            } catch (error) {
                console.log('error', error);
                commit('SET_CHILDCATEGORY_LOADING', false);
            }
        },
    },
};

export default categoryModule;