<template>
    <div class="p-4">
        <div class="row mb-4">
            <p class="s-text">Teachers <i class="fas fa-angle-right"></i> Edit Teachers</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit Teachers</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/teacher" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleTeacherLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <form @submit.prevent="EditTeacher()" novalidate>
                <div class="table-main p-3">
                    <p class="s-text">Instructor Information</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="profileImage" class="form-label">Profile Image*</label>
                                <input type="file" class="form-control" id="profileImage" @change="onFileChange"
                                    accept="image/*" />
                            </div>
                            <div v-if="previewImage" class="mt-3">
                                <img :src="previewImage" alt="Profile Preview" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px; margin-bottom: 25px;">
                            </div>
                            <img :src="'/' + from.profile"
                                style="max-width: 200px; max-height: 200px; margin-bottom: 25px;">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">First Name*</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.first_name"
                                    :class="{ 'is-invalid': errors.includes('Your First Name Is Required') }"
                                    placeholder="Enter Name" />
                                <span v-if="errors.includes('Your First Name Is Required')"
                                    class="invalid-feedback">Your
                                    First
                                    Name Is
                                    Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Last Name*</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.last_name"
                                    :class="{ 'is-invalid': errors.includes('Your Last Name Is Required') }"
                                    placeholder="Enter Last Name" />
                                <span v-if="errors.includes('Your Last Name Is Required')" class="invalid-feedback">Your
                                    Last
                                    Name Is
                                    Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Email*</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.email"
                                    :class="{ 'is-invalid': errors.includes('Your Email Is Required') }"
                                    placeholder="Enter Email" />
                                <span v-if="errors.includes('Your Email Is Required')" class="invalid-feedback">Your
                                    Email
                                    Is
                                    Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Phone Number*</label>
                                <vue-tel-input v-model="from.phone" mode="international" placeholder="Enter Phone"
                                    class="flag-input"></vue-tel-input>
                                <span v-if="errors.includes('Your Phone Number Is Required')"
                                    class="invalid-feedback">Your
                                    Phone Number Is
                                    Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Password*</label>
                                <div class="input-group">
                                    <input :type="showPassword ? 'text' : 'password'" class="form-control" id="password"
                                        v-model="from.password" placeholder="Enter Password" />
                                    <span class="input-group-text" @click="togglePasswordVisibility">
                                        <i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Confirm Password*</label>
                                <div class="input-group">
                                    <input :type="showConfirmPassword ? 'text' : 'password'" class="form-control"
                                        id="confirmPassword" v-model="from.confirm_password"
                                        placeholder="Enter Confirm password" />
                                    <span class="input-group-text" @click="toggleConfirmPasswordVisibility">
                                        <i :class="showConfirmPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="s-text">Professional Details</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Expertise *</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.expertise"
                                    :class="{ 'is-invalid': errors.includes('Your Expertise Is Required') }"
                                    placeholder="Enter Expertise" />
                                <span v-if="errors.includes('Your Expertise Is Required')" class="invalid-feedback">Your
                                    Expertise Is
                                    Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Experience *</label>
                                <input type="number" class="form-control" id="desktopSlider" v-model="from.experience"
                                    :class="{ 'is-invalid': errors.includes('Your Experience Is Required') }"
                                    placeholder="Enter Experience" />
                                <span v-if="errors.includes('Your Experience Is Required')"
                                    class="invalid-feedback">Your
                                    Experience Is
                                    Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Education *</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.education"
                                    :class="{ 'is-invalid': errors.includes('Your Education Is Required') }"
                                    placeholder="Enter Education" />
                                <span v-if="errors.includes('Your Education Is Required')" class="invalid-feedback">Your
                                    Education Is
                                    Required</span>
                            </div>
                        </div>
                        <p class="s-text">Social Links</p>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">LinkedIn *</label>
                                <input type="link" class="form-control" id="desktopSlider" v-model="from.linkedIn"
                                    placeholder="Enter LinkedIn" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Twitter *</label>
                                <input type="link" class="form-control" id="desktopSlider" v-model="from.twitter"
                                    placeholder="Enter Twitter" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">YouTube *</label>
                                <input type="link" class="form-control" id="desktopSlider" v-model="from.youTube"
                                    placeholder="Enter YouTube" />
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
import { toast } from "vue3-toastify";
import 'vue3-toastify/dist/index.css';
import config from '../../config';
import { mapActions, mapState } from "vuex";
export default {
    data() {
        return {
            from: {
                first_name: "",
                last_name: "",
                email: "",
                role: "",
                expertise: "",
                experience: "",
                education: "",
                linkedIn: "",
                youTube: "",
                twitter: "",
                password: "",
                profile: "",
            },
            errors: [],
            loading: false,
            previewImage: null,
            showPassword: false,
            showConfirmPassword: false,
        };
    },

    methods: {
        ...mapActions('teacher', ['fetchEditTeacher']),
        togglePasswordVisibility() {
            this.showPassword = !this.showPassword;
        },
        toggleConfirmPasswordVisibility() {
            this.showConfirmPassword = !this.showConfirmPassword;
        },
        onFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.from.profile = file; // Make sure it's a File object
                this.previewImage = URL.createObjectURL(file);
            }
        },
        async EditTeacher() {
            this.errors = [];

            // Required field validation
            if (!this.from.first_name) this.errors.push('Your First Name Is Required');
            if (!this.from.last_name) this.errors.push('Your Last Name Is Required');
            if (!this.from.email) this.errors.push('Your Email Is Required');
            if (!this.from.expertise) this.errors.push('Your Expertise Is Required');
            if (!this.from.experience) this.errors.push('Your Experience Is Required');
            if (!this.from.education) this.errors.push('Your Education Is Required');

            // Password confirmation validation
            if (this.from.password && this.from.password !== this.from.confirm_password) {
                toast.error('Passwords do not match');
                return;
            }

            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }

            this.loading = true;
            const formData = new FormData();
            formData.append('first_name', this.from.first_name);
            formData.append('last_name', this.from.last_name);
            formData.append('email', this.from.email);
            formData.append('role', this.from.role);
            formData.append('expertise', this.from.expertise);
            formData.append('experience', this.from.experience);
            formData.append('education', this.from.education);
            formData.append('linkedIn', this.from.linkedIn);
            formData.append('youTube', this.from.youTube);
            formData.append('twitter', this.from.twitter);
            formData.append('password', this.from.password);
            if (this.from.profile) {
                formData.append('profile', this.from.profile);
            }

            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-teacher/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-teacher`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/teacher');
                    setTimeout(() => {
                        toast.success('Your Teacher Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/teacher');
                    setTimeout(() => {
                        toast.success('Your Teacher Created Successfully');
                    }, 500);
                }
            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('teacher', ['singleTeacher', 'singleTeacherLoading']),
    },
    watch: {
        singleTeacher(newDetail) {
            if (newDetail) {
                this.from.first_name = newDetail.first_name || '';
                this.from.last_name = newDetail.last_name || '';
                this.from.email = newDetail.email || '';
                this.from.phone = newDetail.phone || '';
                this.from.role = newDetail.role || '';
                this.from.expertise = newDetail.expertise || '';
                this.from.experience = newDetail.experience || '';
                this.from.education = newDetail.education || '';
                this.from.linkedIn = newDetail.linkedIn || '';
                this.from.youTube = newDetail.youTube || '';
                this.from.twitter = newDetail.twitter || '';
                this.from.profile = newDetail.profile || '';
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.fetchEditTeacher(this.$route.params.id)
        }
    }
};
</script>
