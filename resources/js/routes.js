// category
import category from './components/category/show.vue';
import categoryCreate from './components/category/create.vue';

// subCategory 
import subcategory from './components/category/subCategory/show.vue';
import subcategoryCreate from './components/category/subCategory/create.vue';
// childCategory 
import childCategory from './components/category/childCategory/show.vue';
import childCategoryCreate from './components/category/childCategory/create.vue';

// setting 
import setting from './components/setting/show.vue';

// profile
import profile from './components/Profile/show.vue';

// website page
import pages from './components/WebsitePages/show.vue';

// teacher
import teacher from './components/Teacher/show.vue'
import teacherCreate from './components/Teacher/create.vue'

// students
import users from './components/User/show.vue'
import userCreate from './components/User/create.vue'

// Courses
import Courses from './components/Courses/show.vue'
import coursesCreate from './components/Courses/create.vue'
import AllCourses from './components/Courses/AllCourses/show.vue'
// CoursesLesson
import coursesLesson from './components/Courses/CourseLesson/show.vue'
import coursesLessonCreate from './components/Courses/CourseLesson/create.vue'
// Course Materials
import coursesMaterials from './components/Courses/CourseMaterials/show.vue'
import coursesMaterialsCreate from './components/Courses/CourseMaterials/create.vue'
// Course Curriculum
import coursesCurriculum from './components/Courses/CourseModular/show.vue'
import coursesCurriculumCreate from './components/Courses/CourseModular/create.vue'
// Course Billing
import coursesBilling from './components/Courses/CourseBilling/show.vue'
import coursesBillingCreate from './components/Courses/CourseBilling/create.vue'

// login
import login from './components/Auth/login.vue'
// dasboard
import dashboard from './components/Dashboard/show.vue'

//  front end Devepler
import home from './website/Pages/Home.vue'
import topic from './website/Topics/topic.vue'
import course from './website/course/show.vue'
const routes = [
    // login
    { path: '/login', component: login, name: 'login', meta: { WebsiteHeader: false, WebsiteFooter: false, showHeader: false, showSlideBar: false, meta: { requiresAuth: false } } },
    // dashboard
    { path: '/dashboard', component: dashboard, name: 'dashboard', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // Course Billing
    { path: '/course-billing', component: coursesBilling, name: 'coursesBilling', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-billing-create', component: coursesBillingCreate, name: 'coursesBillingCreate' , meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-billing-edit/:id', component: coursesBillingCreate, name: 'coursesBillingEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // Course Curriculum
    { path: '/course-curriculum', component: coursesCurriculum, name: 'coursesCurriculum', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-curriculum-create', component: coursesCurriculumCreate, name: 'coursesCurriculumCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-curriculum-edit/:id', component: coursesCurriculumCreate, name: 'coursesCurriculumEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // Courses material
    { path: '/course-material', component: coursesMaterials, name: 'coursesMaterials', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-material-create', component: coursesMaterialsCreate, name: 'coursesMaterialsCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-material-edit/:id', component: coursesMaterialsCreate, name: 'coursesMaterialsEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // Courses Lesson
    { path: '/course-lesson', component: coursesLesson, name: 'coursesLesson', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-lesson-create', component: coursesLessonCreate, name: 'coursesLessonCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/course-lesson-edit/:id', component: coursesLessonCreate, name: 'coursesLessonEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // Courses
    { path: '/all-courses-list', component: AllCourses, name: 'AllCourses', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/courses-list', component: Courses, name: 'Courses', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/courses-create-list', component: coursesCreate, name: 'coursesCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/courses-edit-list/:id', component: coursesCreate, name: 'coursesEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // students
    { path: '/users', component: users, name: 'users', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/user-create', component: userCreate, name: 'userCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/user-edit/:id', component: userCreate, name: 'userEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // teacher
    { path: '/teacher', component: teacher, name: 'teacher', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/teacher-create', component: teacherCreate, name: 'teacherCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/teacher-edit/:id', component: teacherCreate, name: 'teacherEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    // category
    { path: '/category', component: category, name: 'category', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/category-create', component: categoryCreate, name: 'categoryCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/category-edit/:id', component: categoryCreate, name: 'categoryEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },

    // subcategory
    { path: '/subcategory', component: subcategory, name: 'subcategory', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/subcategory-create', component: subcategoryCreate, name: 'subcategoryCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/subcategory-edit/:id', component: subcategoryCreate, name: 'subcategoryEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },

    // childcategory
    { path: '/child-category', component: childCategory, name: 'childCategory', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/child-category-create', component: childCategoryCreate, name: 'childCategoryCreate', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    { path: '/child-category-edit/:id', component: childCategoryCreate, name: 'childCategoryEdit', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },

    // setting
    { path: '/settings', component: setting, name: 'setting', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },

    // setting
    { path: '/user-profile', component: profile, name: 'profile', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },

    // pages
    { path: '/pages', component: pages, name: 'pages', meta: { WebsiteHeader: false, WebsiteFooter: false, meta: { requiresAuth: true } } },
    
    
    
    // Front End routes 
    { path: '/', component: home, name: 'home' ,meta: { showHeader: false, showSlideBar: false, WebsiteHeader: true, WebsiteFooter: true, meta: { requiresAuth: false } } },
    { path: '/topic', component: topic, name: 'topic' ,meta: { showHeader: false, showSlideBar: false, WebsiteHeader: true, WebsiteFooter: true, meta: { requiresAuth: false } } },
    { path: '/course', component: course, name: 'course' ,meta: { showHeader: false, showSlideBar: false, WebsiteHeader: true, WebsiteFooter: true, meta: { requiresAuth: false } } },
];

export default routes;
