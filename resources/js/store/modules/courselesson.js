import axios from 'axios'
import config from '../../config.js'
const coursesLesson = {
    namespaced: true,
    state() {
        return {
            pagination: null,
            courseLesson: [],
            courseLessonLoading: false,
            singleCourseLesson: [],
            singleCourseLessonLoading: false,
        }
    },
    mutations: {
        SET_PAGINATION(state, page) {
            state.pagination = page
        },
        SET_COURSE_LESSON(state, data)
        {
            state.courseLesson = data
        },
        SET_COURSE_LESSON_LOADING(state, data)
        {
            state.courseLessonLoading = data
        },
        SET_SINGLE_COURSE_LESSON(state, data)
        {
            state.singleCourseLesson = data
        },
        SET_SINGLE_COURSE_LESSON_LOADING(state, data)
        {
            state.singleCourseLessonLoading = data
        },
    },
    actions: {
        async fetchShowCourseLesson({ commit }, page_number) {
            let url = config.apiBaseUrl + `show-cousre-modular-lesson?page=${page_number}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_COURSE_LESSON_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_COURSE_LESSON', response.data.data);
                commit('SET_PAGINATION', response.data.meta);
                commit('SET_COURSE_LESSON_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchEditCourseLesson({ commit }, id) {
            let url = config.apiBaseUrl + `edit-cousre-modular-lesson/${id}`;
            const token = localStorage.getItem('token');
            try {
                commit('SET_SINGLE_COURSE_LESSON_LOADING', true)
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                commit('SET_SINGLE_COURSE_LESSON', response.data.data);
                commit('SET_SINGLE_COURSE_LESSON_LOADING', false)
            } catch (error) {
                console.log('error', error)
            }
        },
        async fetchDeleteCourseLesson({ commit }, id) {
            let url = config.apiBaseUrl + `delete-cousre-modular-lesson/${id}`;
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

export default coursesLesson;