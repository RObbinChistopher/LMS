<template>
    <div class="p-4">
        <div class="row mb-5">
            <p class="s-text">Course Lesson <i class="fas fa-angle-right"></i> Course Lesson Create</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading">Course Lesson Create</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/course-lesson" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleCourseLessonLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <form @submit.prevent="CreateCourseLesson()" novalidate>
                <div class="table-main p-3">
                    <p class="s-text">Course Content information</p>
                    <div class="row">
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
                                    v-model="from.course_modular_id"
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
                                <label for="desktopSlider" class="form-label">Lesson Name *</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.lesson_name"
                                    :class="{ 'is-invalid': errors.includes('Your Lesson Name Is Required') }"
                                    placeholder="Enter Lesson Name" />
                                <span v-if="errors.includes('Your Lesson Name Is Required')"
                                    class="invalid-feedback">Your
                                    Lesson Name Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Lesson Type *</label>
                                <select class="form-select" aria-label="Default select example"
                                    v-model="from.lesson_type"
                                    :class="{ 'is-invalid': errors.includes('Your Lesson Type Is Required') }">
                                    <option selected disabled>Lesson Type</option>
                                    <option value="Lecture">Lecture</option>
                                    <option value="Exercise">Exercise</option>
                                    <option value="Live Session">Live Session</option>
                                    <option value="Quiz">Quiz</option>
                                    <option value="Assignment">Assignment</option>
                                    <option value="Self-Paced">Self-Paced</option>
                                    <option value="Practical">Practical</option>
                                </select>
                                <span v-if="errors.includes('Your Lesson Type Is Required')"
                                    class="invalid-feedback">Your
                                    Lesson Type Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Duration *</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.duration"
                                    :class="{ 'is-invalid': errors.includes('Your Duration Is Required') }"
                                    placeholder="Enter Duration of video" />
                                <span v-if="errors.includes('Your Duration Is Required')" class="invalid-feedback">Your
                                    Duration Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Video Upload *</label>
                                <input type="file" class="form-control" id="desktopSlider"
                                    @change="handleFileUpload($event, 'video_upload')" accept="video/*" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Resources *</label>
                                <input type="file" class="form-control" id="desktopSlider"
                                    @change="handleFileUpload($event, 'resource')" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-3" style="display: flex; flex-direction: column; gap: 20px;">
                        <!-- Upload Progress -->
                        <div v-if="uploadProgress > 0" class="progress-container mt-3">
                            <p>Uploading: {{ uploadProgress }}% - {{ estimatedTime }}</p>
                            <div class="progress">
                                <div class="progress-bar" :style="{ width: uploadProgress + '%' }"></div>
                            </div>
                        </div>
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
import { toast } from "vue3-toastify";
import config from '../../../config';
import { mapActions, mapState } from "vuex";
export default {
    data() {
        return {
            from: {
                course_id: "",
                lesson_name: "",
                course_modular_id: "",
                lesson_type: "",
                duration: "",
                video_upload: "",
                resource: "",
            },
            errors: [],
            loading: false,
            uploadProgress: 0,
            estimatedTime: ''
        };
    },

    methods: {
        ...mapActions('cousre', ['fetchAllCousre',]),
        ...mapActions('courseModule', ['fetchCourseModularBYId', 'fetchEditCourseLesson']),
        ...mapActions('coursesLesson', ['fetchEditCourseLesson']),
        handleFileUpload(event, field) {
            this.from[field] = event.target.files[0];
        },
        async CreateCourseLesson() {
            this.errors = [];
            if (!this.from.lesson_name) this.errors.push('Your Lesson Name Is Required');
            if (!this.from.course_id) this.errors.push('Your Course Name Is Required');
            if (!this.from.course_modular_id) this.errors.push('Your Course Curriculum Is Required');
            if (!this.from.lesson_type) this.errors.push('Your Lesson Type Is Required');
            if (!this.from.duration) this.errors.push('Your Duration Is Required');
            if (!this.from.video_upload) this.errors.push('Your Video Upload Is Required');

            if (this.errors.length > 0) return;
            this.loading= true,
            this.uploadProgress = 0;
            this.estimatedTime = 'Calculating...';

            const formData = new FormData();
            formData.append('lesson_name', this.from.lesson_name);
            formData.append('course_id', this.from.course_id);
            formData.append('course_modular_id', this.from.course_modular_id);
            formData.append('lesson_type', this.from.lesson_type);
            formData.append('duration', this.from.duration);
            formData.append('video_upload', this.from.video_upload);
            formData.append('resource', this.from.resource);

            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-cousre-modular-lesson/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-cousre-modular-lesson`;
            }

            const token = localStorage.getItem('token');
            const startTime = Date.now();

            try {
                const response = await axios.post(url, formData, {
                    headers: { 'Authorization': `Bearer ${token}` },
                    onUploadProgress: (progressEvent) => {
                        const { loaded, total } = progressEvent;
                        this.uploadProgress = Math.round((loaded / total) * 100);

                        const elapsedTime = (Date.now() - startTime) / 1000; // seconds
                        const remainingSize = total - loaded;
                        const uploadSpeed = loaded / elapsedTime; // Bytes per second
                        const estimatedTimeLeft = remainingSize / uploadSpeed;

                        this.estimatedTime = estimatedTimeLeft > 0
                            ? `${Math.round(estimatedTimeLeft)}s remaining`
                            : 'Almost done!';
                    }
                });

                if (response.status === 200) {
                    this.uploadProgress = 100;
                    this.estimatedTime = "Upload Complete!";

                    // ✅ Handle success messages differently for update vs create
                    if (this.$route.params.id) {
                        toast.success('Your Course Lesson Update Successfully');
                    } else {
                        toast.success('Your Course Lesson Created Successfully');
                    }

                    // ✅ Redirect after a short delay for better UX
                    setTimeout(() => {
                        this.$router.push('/course-lesson');
                    }, 1000);
                } else {
                    throw new Error("Upload failed, please try again.");
                }
                this.loading= false;
            } catch (error) {
                console.error("API call error:", error);
                toast.error("Upload failed. Please try again.");
                this.uploadProgress = 0;
                this.estimatedTime = "";
            }
        }

    },
    computed: {
        ...mapState('cousre', ['cousre']),
        ...mapState('courseModule', ['courseModular', 'courseModularLoading']),
        ...mapState('coursesLesson', ['singleCourseLesson', 'singleCourseLessonLoading']),
    },
    watch: {
        singleCourseLesson(newDetail) {
            if (newDetail) {
                this.from.lesson_name = newDetail.lesson_name || '';
                this.from.course_id = newDetail.course_id || '';
                this.from.course_modular_id = newDetail.course_modular_id || '';
                this.from.lesson_type = newDetail.lesson_type || '';
                this.from.duration = newDetail.duration || '';
                this.from.video_upload = newDetail.video_upload || '';
                this.from.resource = newDetail.resource || '';
                if (newDetail.course_id) {
                    this.fetchCourseModularBYId(newDetail.course_id)
                }
            }
        }
    },
    mounted() {
        this.fetchAllCousre()
        if (this.$route.params.id) {
            this.fetchEditCourseLesson(this.$route.params.id)
        }
    }
};
</script>
<style scoped>
.progress-container {
    margin-top: 10px;
    color: white !important;
}

.progress {
    width: 100%;
    height: 8px;
    background-color: #ddd;
    border-radius: 4px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background-color: #28a745;
    transition: width 0.2s;
}
</style>
