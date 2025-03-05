import { createStore, createLogger } from 'vuex'
import auth from './modules/auth.js'
import category from './modules/category.js'
import teacher from './modules/teaher.js'
import cousre from './modules/cousre.js'
import courseModule from './modules/coursemodular.js'
import coursesLesson from './modules/courselesson.js'
import courseBilling from './modules/coursebilling.js'
import courseMaterial from './modules/courseMaterial.js'
import setting from './modules/setting.js'
const debug = process.env.NODE_ENV !== 'production'

export default createStore({
    modules: {
        auth,
        category,
        teacher,
        cousre,
        courseModule,
        coursesLesson,
        courseBilling,
        courseMaterial,
        setting,
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
})
