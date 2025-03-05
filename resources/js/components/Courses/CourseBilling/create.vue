<template>
    <div class="p-4">
        <div class="row mb-4">
            <p class="s-text">Course Billing <i class="fas fa-angle-right"></i> Create Course Billing</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading">Create Course Billing</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/course-billing" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <form @submit.prevent="CreateUsers()" novalidate>
            <!-- Loading Spinner -->
            <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleCourseBillingLoading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="table-main p-3" v-else>
                <p class="s-text">Course Billing Values</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Course Name *</label>
                            <select class="form-select" aria-label="Default select example" v-model="from.course_id"
                                :class="{ 'is-invalid': errors.includes('Your Course Name Is Required') }">
                                <option selected disabled>Course Name</option>
                                <option :value="items.id" v-for="items in cousre">{{ items.course_title }}</option>
                            </select>
                            <span v-if="errors.includes('Your Course Name Is Required')" class="invalid-feedback">Your
                                Course Name Is Required</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Course Price *</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="text" class="form-control" placeholder="Course Price"
                                    v-model="from.course_price" aria-label="Username"
                                    :class="{ 'is-invalid': errors.includes('Your Course Price Is Required') }"
                                    aria-describedby="basic-addon1">
                            </div>

                            <span v-if="errors.includes('Your Course Price Is Required')" class="invalid-feedback">Your
                                Course Price Is Required</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Discount Price *</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">%</span>
                                <input type="text" class="form-control" v-model="from.course_discount_price"
                                    placeholder="Discount Price" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Subscription Model *</label>
                            <select class="form-select" aria-label="Default select example"
                                v-model="from.course_subscription_model">
                                <option selected>Subscription Model</option>
                                <option value="Monthly Access">Monthly Access</option>
                                <option value="Yearly Access">Yearly Access</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Access Type *</label>
                            <select class="form-select" aria-label="Default select example"
                                v-model="from.course_access">
                                <option selected>Access Type</option>
                                <option value="Lifetime access">Lifetime access</option>
                                <option value="limited-time access">limited-time access</option>
                                <option value="Subscription-based">Subscription-based</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-3" style="display: flex;">
                    <button type="submit" class="import2 add-cc hover-cc">
                        <span v-if="!loading">Save</span>
                        <span v-else class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                    </button>
                </div>
            </div>
        </form>

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
                course_price: "",
                course_discount_price: "",
                course_subscription_model: "",
                course_access: "",
            },
            errors: [],
            loading: false,
        };
    },

    methods: {
        ...mapActions('cousre', ['fetchAllCousre']),
        ...mapActions('courseBilling', ['fetchEditCourseBilling']),
        async CreateUsers() {
            this.errors = [];
            if (!this.from.course_id) this.errors.push('Your Course Name Is Required');
            if (!this.from.course_price) this.errors.push('Your Course Price Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('course_id', this.from.course_id);
            formData.append('course_price', this.from.course_price);
            formData.append('course_discount_price', this.from.course_discount_price);
            formData.append('course_subscription_model', this.from.course_subscription_model);
            formData.append('course_access', this.from.course_access);

            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-cousre-modular-billing/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-cousre-modular-billing`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/course-billing');
                    setTimeout(() => {
                        toast.success('Your Course Billing Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/course-billing');
                    setTimeout(() => {
                        toast.success('Your Course Billing Created Successfully');
                    }, 500);
                }

            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('cousre', ['cousre', 'cousreLoading']),
        ...mapState('courseBilling', ['singleCourseBilling', 'singleCourseBillingLoading']),
    },
    watch: {
        singleCourseBilling(newDetail) {
            if (newDetail) {
                this.from.course_id = newDetail.course_id || '';
                this.from.course_price = newDetail.course_price || '';
                this.from.course_discount_price = newDetail.course_discount_price || '';
                this.from.course_subscription_model = newDetail.course_subscription_model || '';
                this.from.course_access = newDetail.course_access || '';
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.fetchEditCourseBilling(this.$route.params.id)
        }
        this.fetchAllCousre()
    }
};
</script>
