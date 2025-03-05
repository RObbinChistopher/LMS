<template>
    <div class="p-4">
        <div class="row mb-5">
            <p class="s-text" v-if="this.$route.params.id">Course Materials <i class="fas fa-angle-right"></i> Edit
                Course Materials</p>
            <p class="s-text" v-else>Course Materials <i class="fas fa-angle-right"></i> Create Course Materials</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit Course Materials</h3>
                <h3 class="heading" v-else>Create Course Materials</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/course-material" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleCourseMaterialLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <div class="table-main p-3">
                <form @submit.prevent="CreateCourseMaterials()" novalidate>
                    <div class="row">
                        <p class="s-text">Course Materials</p>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Course Title *</label>
                                <select class="form-select" aria-label="Default select example" v-model="from.course_id"
                                    @change="fetchCourseModularBYId(from.course_id)"
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
                                <label for="desktopSlider" class="form-label">Course Curriculum*</label>
                                <select class="form-select" aria-label="Default select example"
                                    v-model="from.course_modular"
                                    :class="{ 'is-invalid': errors.includes('Your Course Curriculum Is Required') }">
                                    <option selected disabled>Course Curriculum</option>
                                    <option :value="items.id" v-for="items in courseModular">{{ items.name }}</option>
                                </select>
                                <span v-if="errors.includes('Your Course Curriculum Is Required')"
                                    class="invalid-feedback">Your
                                    Course Curriculum Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Textbooks Links </label>
                                <input type="link" class="form-control" id="desktopSlider" v-model="from.textbook_link"
                                    placeholder="Enter Textbooks Links" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Online Resources Link </label>
                                <input type="link" class="form-control" id="desktopSlider"
                                    v-model="from.online_resource" placeholder="Enter Online Resources Link" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="courseLectureNotes" class="form-label">Course Lecture Notes </label>
                                <input type="file" class="form-control" id="courseLectureNotes" @change="onFileChange">
                                <small class="s-text mt-2">You Should Upload Image</small>
                            </div>
                            <!-- Image Preview -->
                            <div v-if="previewImage">
                                <img :src="previewImage" alt="Image Preview" class="img-thumbnail"
                                    style="max-width: 200px;">
                            </div>
                            <div v-if="from.lecture_notes">
                                <img :src="from.lecture_notes" alt="Image Preview" class="img-thumbnail"
                                    style="max-width: 200px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="courseAssignments" class="form-label">Course Assignments (PDF) </label>
                                <input type="file" class="form-control" id="courseAssignments" accept="application/pdf"
                                    @change="onPdfChange">
                                <small class="s-text mt-2">You Should Upload (PDF)</small>
                            </div>
                            <!-- PDF Preview -->
                            <div v-if="previewPdf" class="mt-3">
                                <embed :src="previewPdf" type="application/pdf" width="100%" height="300px" />
                            </div>
                            <div v-if="from.lecture_notes" class="mt-3">
                                <embed :src="from.lecture_notes" type="application/pdf" width="100%" height="300px" />
                            </div>

                        </div>
                    </div>
                    <div class="mt-3" style="display: flex;">
                        <button type="submit" class="import2 add-cc hover-cc">
                            <span v-if="!loading">Update</span>
                            <span v-else class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import config from '../../../config';
import { toast } from "vue3-toastify";
export default {
    data() {
        return {
            from: {
                course_id: "",
                course_modular: "",
                textbook_link: "",
                lecture_notes: "",
                online_resource: "",
                Assignments: null, // Store PDF file
            },
            previewImage: null,
            errors: [],
            loading: false,
        };
    },
    methods: {
        ...mapActions('cousre', ['fetchAllCousre',]),
        ...mapActions('courseModule', ['fetchCourseModularBYId']),
        ...mapActions('courseMaterial', ['fetchEditCourseMaterial']),
        onFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.from.lecture_notes = file;
                this.previewImage = URL.createObjectURL(file);
            }
        },
        onPdfChange(event) {
            const file = event.target.files[0];
            if (file && file.type === "application/pdf") {
                this.from.Assignments = file; // Store PDF file
                this.previewPdf = URL.createObjectURL(file); // Generate preview URL
            } else {
                alert("Please upload a valid PDF file.");
            }
        },
        async CreateCourseMaterials() {
            this.errors = [];
            if (!this.from.course_id) this.errors.push('Your Course Name Is Required');
            if (!this.from.course_modular) this.errors.push('Your Course Curriculum Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('course_id', this.from.course_id);
            formData.append('course_modular', this.from.course_modular);
            formData.append('textbook_link', this.from.textbook_link);
            formData.append('online_resource', this.from.online_resource);
            if (this.from.lecture_notes) {
                formData.append('lecture_notes', this.from.lecture_notes);
            }
            if (this.from.Assignments) {
                formData.append('Assignments', this.from.Assignments);
            }
            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-cousre-material/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-cousre-material`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/course-material');
                    setTimeout(() => {
                        toast.success('Your Courses Materials Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/course-material');
                    setTimeout(() => {
                        toast.success('Your Courses Materials Created Successfully');
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
        ...mapState('courseModule', ['courseModular', 'courseModularLoading']),
        ...mapState('courseMaterial', ['singleCourseMaterial', 'singleCourseMaterialLoading']),
    },
    watch: {
        singleCourseMaterial(newDetail) {
            if (newDetail) {
                this.from.course_id = newDetail.course_id || '';
                this.from.course_modular = newDetail.course_modular || '';
                this.from.textbook_link = newDetail.textbook_link || '';
                this.from.online_resource = newDetail.online_resource || '';
                // Fetch subcategories when editing
                if (this.from.course_modular) {
                    this.fetchCourseModularBYId(this.from.course_modular);
                }
                if (this.from.lecture_notes) {
                    this.from.lecture_notes = newDetail.lecture_notes || '';
                }
                if (this.from.Assignments) {
                    this.from.Assignments = newDetail.Assignments || '';
                }
            }
        }
    },
    mounted() {
        this.fetchAllCousre()
        if (this.$route.params.id) {
            this.fetchEditCourseMaterial(this.$route.params.id);
        }
    }
};
</script>
