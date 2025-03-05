<template>
    <div class="p-4">
        <div class="row mb-5">
            <p class="s-text" v-if="this.$route.params.id">Child Category&nbsp;&nbsp;<i
                    class="fas fa-angle-right"></i>&nbsp;&nbsp;Edit Child
                Category</p>
            <p class="s-text" v-else>Child Category&nbsp;&nbsp;<i class="fas fa-angle-right"></i>&nbsp;&nbsp;Create
                Child
                Category</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit Child Category</h3>
                <h3 class="heading" v-else>Create Child Category</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/child-category" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <form @submit.prevent="CreateUsers()" novalidate>
            <!-- Loading Spinner -->
            <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleChildcategoryLoading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="table-main p-3" v-else>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Category Name*</label>
                            <select class="form-select form-select-lg mb-3 select-option" v-model="from.catId"
                                :class="{ 'is-invalid': errors.includes('Your Category Name Is Required') }"
                                aria-label=".form-select-lg example" @change="fetchSubCategoryById(from.catId)">
                                <option selected>Select Category</option>
                                <option :value="items.id" v-for="items in category">{{ items.name }}</option>
                            </select>
                            <span v-if="errors.includes('Your Category Name Is Required')" class="invalid-feedback">Your
                                Category Name Is Required</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Subcategory Name*</label>
                            <select class="form-select form-select-lg mb-3 select-option" v-model="from.subCatId"
                                :class="{ 'is-invalid': errors.includes('Your SubCategory Name Is Required') }"
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
                            <label for="desktopSlider" class="form-label">Child Category Name*</label>
                            <input type="text" class="form-control" id="desktopSlider" v-model="from.name"
                                :class="{ 'is-invalid': errors.includes('Your Child Category Name Is Required') }"
                                placeholder="Enter Your Child Category Name" />
                            <span v-if="errors.includes('Your Child Category Name Is Required')"
                                class="invalid-feedback">Your
                                Child Category Name Is Required</span>
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
                subCatId: "",
            },
            errors: [],
            loading: false,
        };
    },

    methods: {
        ...mapActions('category', ['fetchAllCategory', 'fetchSubCategoryById', 'fetchEditChildCategory']),
        async CreateUsers() {
            this.errors = [];
            if (!this.from.name) this.errors.push('Your Child Category Name Is Required');
            if (!this.from.catId) this.errors.push('Your Category Name Is Required');
            if (!this.from.subCatId) this.errors.push('Your SubCategory Name Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('name', this.from.name);
            formData.append('catId', this.from.catId);
            formData.append('subCatId', this.from.subCatId);

            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-childcategory/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-childcategory`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/child-category');
                    setTimeout(() => {
                        toast.success('Your Child-category Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/child-category');
                    setTimeout(() => {
                        toast.success('Your Child-category Created Successfully');
                    }, 500);
                }

            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('category', ['category', 'subCategory', 'singleChildcategory', 'singleChildcategoryLoading']),
    },
    watch: {
        singleChildcategory(newDetail) {
            if (newDetail) {
                this.from.name = newDetail.name || '';
                this.from.catId = newDetail.catId || '';
                this.from.subCatId = newDetail.subCatId || '';

                // Fetch subcategories when editing
                if (this.from.catId) {
                    this.fetchSubCategoryById(this.from.catId);
                }
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.fetchEditChildCategory(this.$route.params.id)
        }
        this.fetchAllCategory()
    }
};
</script>
