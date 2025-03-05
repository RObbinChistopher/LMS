<template>
    <div class="Sidebar p-4">
        <h1 class="header">
            <img src="../../../../public/images/logo.png" alt="" style="width: 52%;"> <span class="p-text">Dashboard</span>
        </h1>
        <div class="d-flex flex-column flex-shrink-0 py-3">
            <h2 class="p-text">Navigation</h2>
            <ul class="nav nav-pills flex-column mb-auto">
                <router-link to="/dashboard" aria-current="page"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/dashboard') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-gauge  common-icon"></i>
                        Dashboard
                    </li>
                </router-link>
                <h2 class="p-text mt-2" v-if="profile.role === 'Admin'">Role</h2>
                <router-link to="/users" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/users') || isActive('/user-create') || isActive('/edit-users') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-users common-icon"></i>
                        Users
                    </li>
                </router-link>
                <router-link to="/teacher" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/teacher') || isActive('/teacher-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-person-chalkboard common-icon"></i>
                        Teachers
                    </li>
                </router-link>
                <h2 class="p-text mt-2" v-if="profile.role === 'Admin'">Category</h2>
                <router-link to="/category" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/category') || isActive('/category-create') || isActive('/category-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-list common-icon"></i>
                        Category
                    </li>
                </router-link>
                <router-link to="/subcategory" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/subcategory') || isActive('/subcategory-create') || isActive('/subcategory-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-brands fa-slack common-icon"></i>
                        SubCategory
                    </li>
                </router-link>
                <router-link to="/child-category" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/child-category') || isActive('/child-category-create') || isActive('/child-category-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-brands fa-medium common-icon"></i>
                        Child Category
                    </li>
                </router-link>
                <h2 class="p-text mt-2">Courses</h2>
                <router-link to="/courses-list" aria-current="page" v-if="profile.role !== 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/courses-list') || isActive('/courses-create-list') || isActive('/courses-edit-list') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fab fa-font-awesome common-icon"></i>
                        Courses List
                    </li>
                </router-link>
                <router-link to="/all-courses-list" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/all-courses-list') || isActive('/courses-create-list') || isActive('/courses-edit-list') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-book common-icon"></i>
                        All Courses List
                    </li>
                </router-link>
                <router-link to="/course-curriculum" aria-current="page"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/course-curriculum') || isActive('/course-curriculum-create') || isActive('/course-curriculum-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-brands fa-squarespace common-icon"></i>
                        Courses Curriculum
                    </li>
                </router-link>
                <router-link to="/course-lesson" aria-current="page"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/course-lesson') || isActive('/course-lesson-create') || isActive('/course-lesson-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-chalkboard-user common-icon"></i>
                        Courses Lessons
                    </li>
                </router-link>
                <router-link to="/course-material" aria-current="page"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/course-material') || isActive('/course-material-create') || isActive('/course-material-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-recycle common-icon"></i>
                        Courses Materials
                    </li>
                </router-link>
                <router-link to="/course-billing" aria-current="page"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/course-billing') || isActive('/course-billing-create') || isActive('/course-billing-edit') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-money-bill common-icon"></i>
                        Courses Billing
                    </li>
                </router-link>
                <h2 class="p-text mt-2" v-if="profile.role === 'Admin'">Information</h2>
                <router-link to="/settings" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/settings') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-gear common-icon"></i>
                        Setting
                    </li>
                </router-link>
                <router-link to="/pages" aria-current="page" v-if="profile.role === 'Admin'"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/pages') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-regular fa-file-lines common-icon"></i>
                        WebPages
                    </li>
                </router-link>
                <h2 class="p-text mt-2">Profile</h2>
                <router-link to="/user-profile" aria-current="page"
                    :class="{ 'link-items mt-2 common-side-item': true, 'active': isActive('/user-profile') }"
                    active-class="active">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-user common-icon"></i>
                        Profile
                    </li>
                </router-link>
                <router-link to="/" aria-current="page" class="link-items mt-2 common-side-item" @click="logoutUser">
                    <li class="nav-item mb-2 mt-2">
                        <i class="fa-solid fa-right-from-bracket common-icon"></i>
                        Logout
                    </li>
                </router-link>
            </ul>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
export default {
    methods: {
        ...mapActions('auth', ['logout', 'fetchloginUser']),
        isActive(route) {
            const path = this.$route.path;
            const basePath = route.split('/').filter(part => !part.startsWith(':')).join('/');
            console.log(`Checking if ${path} starts with ${basePath}`);
            return path.startsWith(basePath);
        },
        logoutUser() {
            this.logout();
            this.$router.push('/');
        },
    },
    computed:{
        ...mapState('auth', ['profile']),
    },
    mounted(){
        this.fetchloginUser();
    }
}
</script>

<style scoped>
.link-items {
    color: white;
    font-size: 15px;
    text-decoration: none;

}

.Sidebar {
    background-color: var(--pBackground);
    height: 100vh;
    color: white !important;
    overflow-y: auto;
    border: 2px solid #8b918f;
    border-left: none;
    /* Enable vertical scrolling */
}


.common-icon {
    width: 28px;
}

.active {
    background-color: var(--sBackground);
    padding: 0 7px;
    border-radius: 10px;
}
</style>