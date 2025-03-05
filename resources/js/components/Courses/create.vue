<template>
    <div class="p-4">
        <div class="row mb-4">
            <p class="s-text" v-if="this.$route.params.id">Courses List <i class="fas fa-angle-right"></i> Edit Courses list</p>
            <p class="s-text" v-else>Courses List <i class="fas fa-angle-right"></i> Create Courses list</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit Courses</h3>
                <h3 class="heading" v-else>Create Courses</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/courses-list" class="import2 add-cc hover-cc">Back</router-link>
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
                    <p class="s-text">Course Information</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="profileImage" class="form-label">Course Thumbnail Images*</label>
                                <input type="file" class="form-control" id="profileImage" @change="onFileChange"
                                    accept="image/*" />
                            </div>
                            <div v-if="previewImage" class="mt-3">
                                <img :src="previewImage" alt="Profile Preview" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px; margin-bottom: 25px;">
                            </div>
                            <img :src="'/' + from.image" style="max-width: 200px; max-height: 200px; margin-bottom: 25px;">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Course Title *</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.course_title"
                                    :class="{ 'is-invalid': errors.includes('Your Course Title Is Required') }"
                                    placeholder="Course Title" />
                                <span v-if="errors.includes('Your Course Title Is Required')"
                                    class="invalid-feedback">Your
                                    Course Title Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Instructor Name *</label>
                                <input type="text" class="form-control" id="desktopSlider"
                                    v-model="from.instructor_name"
                                    :class="{ 'is-invalid': errors.includes('Your Instructor Name Is Required') }"
                                    placeholder="Instructor Name" />
                                <span v-if="errors.includes('Your Instructor Name Is Required')"
                                    class="invalid-feedback">Your
                                    Instructor Name Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Category *</label>
                                <select class="form-select form-select-lg mb-3 select-option" v-model="from.catId"
                                    :class="{ 'is-invalid': errors.includes('Your Category Name Is Required') }"
                                    aria-label=".form-select-lg example" @change="fetchSubCategoryById(from.catId)">
                                    <option selected>Select Category</option>
                                    <option :value="items.id" v-for="items in category">{{ items.name }}</option>
                                </select>
                                <span v-if="errors.includes('Your Category Name Is Required')"
                                    class="invalid-feedback">Your
                                    Category Name Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Subcategory *</label>
                                <select class="form-select form-select-lg mb-3 select-option" v-model="from.subCatId"
                                    :class="{ 'is-invalid': errors.includes('Your SubCategory Name Is Required') }"
                                    @change="fetchChildCategoryById(from.subCatId)"
                                    aria-label=".form-select-lg example">
                                    <option selected>Select Subcategory</option>
                                    <option :value="items.id" v-for="items in subCategory">{{ items.name }}</option>
                                </select>
                                <span v-if="errors.includes('Your SubCategory Name Is Required')"
                                    class="invalid-feedback">Your
                                    SubCategory Name Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Child Category *</label>
                                <select class="form-select form-select-lg mb-3 select-option" v-model="from.childCatId"
                                    :class="{ 'is-invalid': errors.includes('Your Child Category Name Is Required') }"
                                    aria-label=".form-select-lg example">
                                    <option disable>Select Child Category</option>
                                    <option :value="items.id" v-for="items in childCategory">{{ items.name }}</option>
                                </select>
                                <span v-if="errors.includes('Your Child Category Name Is Required')"
                                    class="invalid-feedback">Your Child Category Name Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Difficulty level *</label>
                                <select class="form-select" aria-label="Default select example" v-model="from.level"
                                    :class="{ 'is-invalid': errors.includes('Your Difficulty level Is Required') }">
                                    <option selected>Select level</option>
                                    <option value="1">Beginner level</option>
                                    <option value="2">Intermediate level</option>
                                    <option value="3">Advanced level</option>
                                </select>
                                <span v-if="errors.includes('Your Difficulty level Is Required')"
                                    class="invalid-feedback">Your
                                    Difficulty level Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Course Language *</label>
                                <input type="text" class="form-control" id="desktopSlider"
                                    v-model="from.course_language" placeholder="Course Language" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Course Description *</label>
                                <quill-editor toolbar="full" v-model:content="from.course_description"
                                    :content-type="'html'" class="custom-quill-editor" theme="snow" />

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
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { toast } from "vue3-toastify";
import config from '../../config';
import { mapActions, mapState } from "vuex";
export default {
    components: { QuillEditor },
    data() {
        return {
            from: {
                course_title: "",
                instructor_name: "",
                catId: "",
                subCatId: "",
                childCatId: "",
                level: "",
                course_language: "",
                course_description: "",
                image: "",
            },
            errors: [],
            loading: false,
            previewImage: null,
        };
    },
    methods: {
        ...mapActions('category', ['fetchAllCategory', 'fetchSubCategoryById', 'fetchChildCategoryById']),
        ...mapActions('cousre', ['fetchEditCousre']),
        onFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.from.image = file;
                this.previewImage = URL.createObjectURL(file);
            }
        },
        async CreateCourse() {
            this.errors = [];
            if (!this.from.course_title) this.errors.push('Your Course Title Is Required');
            if (!this.from.instructor_name) this.errors.push('Your Instructor Name Is Required');
            if (!this.from.catId) this.errors.push('Your Category Name Is Required');
            if (!this.from.subCatId) this.errors.push('Your SubCategory Name Is Required');
            if (!this.from.childCatId) this.errors.push('Your Child Category Name Is Required');
            if (!this.from.level) this.errors.push('Your Difficulty level Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('course_title', this.from.course_title);
            formData.append('instructor_name', this.from.instructor_name);
            formData.append('catId', this.from.catId);
            formData.append('subCatId', this.from.subCatId);
            formData.append('childCatId', this.from.childCatId);
            formData.append('level', this.from.level);
            formData.append('course_language', this.from.course_language);
            formData.append('course_description', this.from.course_description);
            if (this.from.image) {
                formData.append('image', this.from.image);
            }
            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-cousre/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-cousre`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/courses-list');
                    setTimeout(() => {
                        toast.success('Your Courses list Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/courses-list');
                    setTimeout(() => {
                        toast.success('Your Courses list Created Successfully');
                    }, 500);
                }

            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('category', ['category', 'subCategory', 'childCategory', 'childcategoryLoading',]),
        ...mapState('cousre', ['singleCousre', 'singleCousreLoading'])
    },
    watch: {
        singleCousre(newDetail) {
            if (newDetail) {
                this.from.course_title = newDetail.course_title || '';
                this.from.instructor_name = newDetail.instructor_name || '';
                this.from.catId = newDetail.catId || '';
                this.from.subCatId = newDetail.subCatId || '';
                this.from.childCatId = newDetail.childCatId || '';
                this.from.level = newDetail.level || '';
                this.from.course_language = newDetail.course_language || '';
                this.from.course_description = newDetail.course_description || '';
                this.from.image = newDetail.course_thumbnail_images || '';
                // Fetch subcategories when editing
                if (this.from.catId) {
                    this.fetchSubCategoryById(this.from.catId);
                }
                if (this.from.subCatId) {
                    this.fetchChildCategoryById(this.from.subCatId);
                }
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.fetchEditCousre(this.$route.params.id)
        }
        this.fetchAllCategory();
    }
};
</script>
