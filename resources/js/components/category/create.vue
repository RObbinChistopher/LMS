<template>
    <div class="p-4">
        <div class="row mb-5">
            <p class="s-text" v-if="this.$route.params.id">Category&nbsp;&nbsp;<i class="fas fa-angle-right"></i>&nbsp;&nbsp;Edit Category</p>
            <p class="s-text" v-else>Category&nbsp;&nbsp;<i class="fas fa-angle-right"></i>&nbsp;&nbsp;Create Category</p>
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading" v-if="this.$route.params.id">Edit Category</h3>
                <h3 class="heading" v-else>Create Category</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/category" class="import2 add-cc hover-cc">Back</router-link>
                </div>
            </div>
        </div>
        <form @submit.prevent="CreateUsers()" novalidate>
              <!-- Loading Spinner -->
              <div class="spinner2 d-flex justify-content-center mb-3" v-if="singleCategoryLoading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="table-main p-3" v-else>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desktopSlider" class="form-label">Category Name*</label>
                            <input type="text" class="form-control" id="desktopSlider" v-model="from.name"
                                :class="{ 'is-invalid': errors.includes('Your Category Name Is Required') }"
                                placeholder="Enter Category Name" />
                            <span v-if="errors.includes('Your Category Name Is Required')" class="invalid-feedback">Your
                                Category Name Is Required</span>
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
</template>
<script>
import { toast } from "vue3-toastify";
import config from '../../config';
import { mapActions, mapState } from "vuex";
export default {
    data() {
        return {
            from: {
                name: "",
            },
            errors: [],
            loading: false,
        };
    },

    methods: {
        ...mapActions('category', ['fetchEditCategory']),
        async CreateUsers() {
            this.errors = [];
            if (!this.from.name) this.errors.push('Your Category Name Is Required');
            if (this.errors.length > 0) {
                console.log("Validation errors:", this.errors);
                return;
            }
            this.loading = true;
            const formData = new FormData();
            formData.append('name', this.from.name);

            let url;
            if (this.$route.params.id) {
                url = config.apiBaseUrl + `update-category/${this.$route.params.id}`;
            } else {
                url = config.apiBaseUrl + `create-category`;
            }

            const token = localStorage.getItem('token');
            try {
                await axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                });
                if (this.$route.params.id) {
                    this.$router.push('/category');
                    setTimeout(() => {
                        toast.success('Your Category Update Successfully');
                    }, 500);
                } else {
                    this.$router.push('/category');
                    setTimeout(() => {
                        toast.success('Your Category Created Successfully');
                    }, 500);
                }

            } catch (error) {
                console.error("API call error:", error);
                this.loading = false;
            }
        },
    },
    computed: {
        ...mapState('category', ['singleCategory', 'singleCategoryLoading']),
    },
    watch:{
        singleCategory(newDetail) {
            if (newDetail) {
                this.from.name = newDetail.name || '';
            }
        }
    },
    mounted() {
        if(this.$route.params.id)
        {
            this.fetchEditCategory(this.$route.params.id)
        }
    }
};
</script>