<template>
    <div class="p-4">
        <div class="row mb-5">
            <p class="s-text" v-if="this.$route.params.id">SubCategory&nbsp;&nbsp;<i class="fas fa-angle-right"></i>&nbsp;&nbsp;Edit SubCategory
            </p>
            <p class="s-text" v-else>SubCategory&nbsp;&nbsp;<i class="fas fa-angle-right"></i>&nbsp;&nbsp;Create SubCategory
            </p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit SubCategory</h3>
                <h3 class="heading" v-else>Create SubCategory</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/subcategory" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <form @submit.prevent="Subcategory()" novalidate>
             <!-- Loading Spinner -->
             <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleSubCategoryLoading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="table-main p-3" v-else>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Select Category Name*</label>
                            <select class="form-select form-select-lg mb-3 select-option"
                                aria-label=".form-select-lg example" v-model="from.catId"
                                :class="{ 'is-invalid': errors.includes('Your Category Name Is Required') }">
                                <option selected>Select Category</option>
                                <option :value="item.id" v-for="item in category">{{ item.name }}</option>
                            </select>
                            <span v-if="errors.includes('Your Category Name Is Required')" class="invalid-feedback">Your
                                Category Name Is Required</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Subcategory Name*</label>
                            <input type="text" class="form-control" id="desktopSlider" v-model="from.name"
                                :class="{ 'is-invalid': errors.includes('Your Subcategory Name Is Required') }"
                                placeholder="Enter Your Subcategory Name" />
                            <span v-if="errors.includes('Your Subcategory Name Is Required')"
                                class="invalid-feedback">Your
                                Subcategory Name Is Required</span>
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
                name: "",
                catId: "",
            },
            errors: [],
            loading: false,
        };
    },

    methods: {
        ...mapActions('category', ['fetchAllCategory', 'fetchEditSubCategory']),
        async Subcategory() {
            this.errors = [];
            if (!this.from.name) this.errors.push('Your Subcategory Name Is Required');
            if (!this.from.catId) this.errors.push('Your Category Name Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('name', this.from.name);
            formData.append('catId', this.from.catId);

            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-subcategory/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-subcategory`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/subcategory');
                    setTimeout(() => {
                        toast.success('Your Subcategory Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/subcategory');
                    setTimeout(() => {
                        toast.success('Your Subcategory Created Successfully');
                    }, 500);
                }

            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('category', ['category', 'singleSubCategory', 'singleSubCategoryLoading'])
    },
    watch: {
        singleSubCategory(newDetail) {
            if (newDetail) {
                this.from.name = newDetail.name || '';
                this.from.catId = newDetail.catId || '';
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.fetchEditSubCategory(this.$route.params.id)
        }
        this.fetchAllCategory();
    }
};
</script>
