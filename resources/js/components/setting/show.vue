<template>
    <div class="p-4">
        <div class="row mb-5">
            <p class="s-text">Settings</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading">Settings</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                </div>
            </div>
        </div>
        <div class="spinner2 d-flex justify-content-center mb-3" v-if="settingLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <form @submit.prevent="UpdateSetting()" novalidate>
                <div class="table-main p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Website Name*</label>
                                <input type="text" class="form-control" id="desktopSlider"
                                    placeholder="Enter Website Name"
                                    :class="{ 'is-invalid': errors.includes('Website Name Is Required') }"
                                    v-model="from.website_name" />
                                <span v-if="errors.includes('Website Name Is Required')"
                                    class="invalid-feedback">Website
                                    Name
                                    Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Email*</label>
                                <input type="email" class="form-control" id="desktopSlider" v-model="from.email"
                                    :class="{ 'is-invalid': errors.includes('Website Email Is Required') }"
                                    placeholder="Enter Email" />
                                <span v-if="errors.includes('Website Email Is Required')"
                                    class="invalid-feedback">Website
                                    Email
                                    Is Required</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Phone Number*</label>
                                <input type="text" class="form-control" id="desktopSlider" v-model="from.phone_number"
                                    placeholder="Enter Phone Number" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Facebook Link*</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">https://facebook.com</span>
                                    <input type="text" class="form-control" v-model="from.facebook_link"
                                        placeholder="Enter Facebook Link" aria-label="Enter Facebook Link"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Instagram Link*</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">https://Instagram.com</span>
                                    <input type="text" class="form-control" v-model="from.instagram_link"
                                        placeholder="Enter Instagram Link" aria-label=""
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Linkedin Link*</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">https://Linkedin.com</span>
                                    <input type="text" class="form-control" v-model="from.linkedin_link"
                                        placeholder="Enter Linkedin Link" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="desktopSlider" class="form-label">Website Logo*</label>
                                <input type="file" class="form-control" id="desktopSlider" @change="onFileChange"
                                    accept="image/*" />
                                <div v-if="previewImage" class="mt-3">
                                    <img :src="previewImage" alt="Profile Preview" class="img-thumbnail"
                                        style="max-width: 200px; max-height: 200px; margin-bottom: 25px;">
                                </div>
                                <img v-if="setting.website_logo" :src="'/' + from.logo"
                                    style="max-width: 200px; max-height: 200px; margin: 25px 0 0 0;">
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
import config from '../../config';
import { mapActions, mapState } from "vuex";
export default {
    data() {
        return {
            from: {
                website_name: "",
                email: "",
                phone_number: "",
                facebook_link: "",
                instagram_link: "",
                linkedin_link: "",
                logo: "",
            },
            errors: [],
            loading: false,
            previewImage: null,
        };
    },

    methods: {
        ...mapActions('setting', ['fetchSetting']),
        onFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.from.logo = file;
                this.previewImage = URL.createObjectURL(file);
            }
        },
        async UpdateSetting() {
            this.errors = [];
            if (!this.from.website_name) this.errors.push('Website Name Is Required');
            if (!this.from.email) this.errors.push('Website Email Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('website_name', this.from.website_name);
            formData.append('email', this.from.email);
            formData.append('phone_number', this.from.phone_number);
            formData.append('facebook_link', this.from.facebook_link);
            formData.append('instagram_link', this.from.instagram_link);
            formData.append('linkedin_link', this.from.linkedin_link);
            if (this.from.logo) {
                formData.append('logo', this.from.logo);
            }

            let url = config.apiBaseUrl + `update-setting`;

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                this.loading = false;
                this.previewImage= null,
                toast.success('Your Setting Update Successfully');
                this.fetchSetting();
            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('setting', ['setting', 'settingLoading']),
    },
    watch: {
        setting(newDetail) {
            if (newDetail) {
                this.from.website_name = newDetail.website_name || '';
                this.from.email = newDetail.email || '';
                this.from.phone_number = newDetail.phone_number || '';
                this.from.facebook_link = newDetail.facebook_link || '';
                this.from.instagram_link = newDetail.instagram_link || '';
                this.from.linkedin_link = newDetail.linkedin_link || '';
                this.from.logo = newDetail.website_logo || '';
            }
        }
    },
    mounted() {
        this.fetchSetting()
    }
};
</script>
