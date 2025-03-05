<template>
    <div class="p-4">
        <div class="row mb-4">
            <p class="s-text">Website Pages</p>
            <div class="col-md-4 col-6 header-col">
                <!-- <h3 class="heading">WebPages</h3> -->
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <!-- <router-link to="/model" class="import2 add-cc hover-cc">Back</router-link> -->
                </div>
            </div>
        </div>
        <div class="spinner2 d-flex justify-content-center mb-3" v-if="webPageLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <form @submit.prevent="UpdateWebsitePages()" novalidate>
                <h3 class="heading">About Us</h3>
                <div class="table-main p-3 mb-5">
                    <h3 class="s-text">About Us</h3>
                    <quill-editor toolbar="full" v-model:content="form.about_us" :content-type="'html'"
                        class="custom-quill-editor" theme="snow" />
                </div>
                <h3 class="heading">Terms of Use</h3>
                <div class="table-main p-3 mb-5">
                    <h3 class="s-text">Terms of Use</h3>
                    <quill-editor toolbar="full" v-model:content="form.terms_of_use" :content-type="'html'"
                        class="custom-quill-editor" theme="snow" />
                </div>
                <h3 class="heading">Privacy Policy</h3>
                <div class="table-main p-3 mb-5">
                    <h3 class="s-text">Privacy Policy</h3>
                    <quill-editor toolbar="full" v-model:content="form.privacy_policy" :content-type="'html'"
                        class="custom-quill-editor" theme="snow" />
                </div>
                <h3 class="heading">Help Center</h3>
                <div class="table-main p-3 mb-5">
                    <h3 class="s-text">Help Center</h3>
                    <quill-editor toolbar="full" v-model:content="form.help_center" :content-type="'html'"
                        class="custom-quill-editor" theme="snow" />
                </div>
                <h3 class="heading">Cookie Policy</h3>
                <div class="table-main p-3 mb-5">
                    <h3 class="s-text">Cookie Policy</h3>
                    <quill-editor toolbar="full" v-model:content="form.cookie_policy" :content-type="'html'"
                        class="custom-quill-editor" theme="snow" />
                </div>
                <h3 class="heading">Referral Program</h3>
                <div class="table-main p-3 mb-5">
                    <h3 class="s-text">Referral Program</h3>
                    <quill-editor toolbar="full" v-model:content="form.referral_program" :content-type="'html'"
                        class="custom-quill-editor" theme="snow" />
                </div>
                <div class="mt-3" style="display: flex;">
                    <button type="submit" class="import2 add-cc hover-cc">
                        <span v-if="!loading">Update</span>
                        <span v-else class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { mapActions, mapState } from 'vuex';
import config from '../../config';
import { toast } from "vue3-toastify";
export default {
    components: { QuillEditor },
    data() {
        return {
            form: {
                about_us: "",
                privacy_policy: "",
                help_center: "",
                cookie_policy: "",
                referral_program: "",
                terms_of_use: "",
            },
            errors: [],
            loading: false,
        };
    },
    methods: {
        ...mapActions('setting', ['fetchWebsitePages']),
        async UpdateWebsitePages() {
            this.errors = [];
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('about_us', this.form.about_us);
            formData.append('privacy_policy', this.form.privacy_policy);
            formData.append('help_center', this.form.help_center);
            formData.append('cookie_policy', this.form.cookie_policy);
            formData.append('referral_program', this.form.referral_program);
            formData.append('terms_of_use', this.form.terms_of_use);
            let url = config.apiBaseUrl + `update-website-pages`;

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                this.loading = false;
                toast.success('Your Website Update Successfully');
                this.fetchWebsitePages();
            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('setting', ['webPage', 'webPageLoading']),
    },
    watch: {
        webPage(newDetail) {
            if (newDetail) {
                this.form.about_us = newDetail.about_us || '';
                this.form.privacy_policy = newDetail.privacy_policy || '';
                this.form.help_center = newDetail.help_center || '';
                this.form.cookie_policy = newDetail.cookie_policy || '';
                this.form.referral_program = newDetail.referral_program || '';
                this.form.terms_of_use = newDetail.terms_of_use || '';
            }
        }
    },
    mounted() {
        this.fetchWebsitePages()
    }
}   
</script>
