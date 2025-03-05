<template>
    <div class="p-4">
        <div class="row mb-4">
            <p class="s-text" v-if="this.$route.params.id">Course Curriculum <i class="fas fa-angle-right"></i> Edit Course Curriculum</p>
            <p class="s-text" v-else>Course Curriculum <i class="fas fa-angle-right"></i> Create Course Curriculum</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit Course Curriculum</h3>
                <h3 class="heading" v-else>Create Course Curriculum</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/course-curriculum" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleCousreLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <form @submit.prevent="CreateCourse()" novalidate>
                <div class="table-main p-3">
                    <p class="s-text">Course Curriculum Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Course Name *</label>
                                <select class="form-select" aria-label="Default select example" v-model="from.courseId"
                                    :class="{ 'is-invalid': errors.includes('Your Course Name Is Required') }">
                                    <option disabled selected>Course Name</option>
                                    <option :value="items.id" v-for="items in cousre">{{ items.course_title }}</option>
                                </select>
                                <span v-if="errors.includes('Your Course Name Is Required')"
                                    class="invalid-feedback">Your
                                    Course Name Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Course Curriculum *</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.name"
                                    :class="{ 'is-invalid': errors.includes('Your Course Curriculum Is Required') }"
                                    placeholder="Course Curriculum" />
                                <span v-if="errors.includes('Your Course Curriculum Is Required')"
                                    class="invalid-feedback">Your
                                    Course Curriculum Is Required</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3" style="display: flex;">
                        <button type="submit" class="import2 add-cc hover-cc">
                            <span v-if="!loading">Save</span>
                            <span v-else class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { mapActions, mapState } from 'vuex';
import config from '../../../config';
export default {
    components: { QuillEditor },
    data() {
        return {
            from: {
                name: "",
                courseId: "",
            },
            errors: [],
            loading: false,
        };
    },
    methods: {
        ...mapActions('cousre', ['fetchAllCousre',]),
        ...mapActions('courseModule', ['fetchEditCourseModular']),
        async CreateCourse() {
            this.errors = [];
            if (!this.from.name) this.errors.push('Your Course Curriculum Is Required');
            if (!this.from.courseId) this.errors.push('Your Course Name Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('name', this.from.name);
            formData.append('courseId', this.from.courseId);
            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-cousre-modular/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-cousre-modular`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/course-curriculum');
                    setTimeout(() => {
                        toast.success('Your Courses Curriculum Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/course-curriculum');
                    setTimeout(() => {
                        toast.success('Your Courses Curriculum Created Successfully');
                    }, 500);
                }

            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },

    computed: {
        ...mapState('cousre', ['cousre']),
        ...mapState('courseModule', ['singleCourseModularLoading', 'singleCourseModular']),
    },
    watch: {
        singleCourseModular(newDetail) {
            if (newDetail) {
                this.from.name = newDetail.name || '';
                this.from.courseId = newDetail.courseId || '';
            }
        }
    },
    mounted() {
        this.fetchAllCousre()
        if (this.$route.params.id) {
            this.fetchEditCourseModular(this.$route.params.id)
        }
    }
};
</script>
