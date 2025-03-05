import axios from 'axios'
import config from '../../config.js'
const TeacherModule = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            teacher: [],
            teacherLoading: false,
            singleTeacher: [],
            singleTeacherLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_TEACHER(state, data) {
            state.teacher = data;
        },
        SET_TEACHER_LOADING(state, data) {
            state.teacherLoading = data;
        },
        SET_SINGLE_TEACHER(state, data) {
            state.singleTeacher = data;
        },
        SET_SINGLE_TEACHER_LOADING(state, data) {
            state.singleTeacherLoading = data;
        },
    },
    actions: {
        async fetchShowTeacher({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-teacher?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_TEACHER_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_TEACHER', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_TEACHER_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchShowuser({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-user?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_TEACHER_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_TEACHER', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_TEACHER_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditTeacher({ commit }, id) {
            let url = config.apiBaseUrl + `edit-teacher/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_TEACHER_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_TEACHER', response.data.data);
                commit('SET_SINGLE_TEACHER_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchTeacherSearch({ commit }, query) {
            let url = config.apiBaseUrl + `teacher-search`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_TEACHER_LOADING', true);
                let response = await axios.post(url, { query }, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_TEACHER', response.data.data);
                commit('SET_TEACHER_LOADING', false);
            } catch (error) {
                console.log('error', error);
                commit('SET_TEACHER_LOADING', false);
            }
        },
        async deleteTeacher({ commit }, id) {
            let url = config.apiBaseUrl + `delete-teacher/${id}`;
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
    },
};

export default TeacherModule;