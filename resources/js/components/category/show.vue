<template>
    <div class="p-4">
        <div class="row mb-5">
            <div class="col-md-4 col-6 header-col">
                <h3 class="heading">Category</h3>
            </div>
            <div class="col-md-8 col-6">
                <div class="btn-text m-0 add-new-cat" style="display: flex; justify-content: flex-end;">
                    <router-link to="/category-create" class="import2 add-cc hover-cc">Add &nbsp;New</router-link>
                </div>
            </div>
        </div>
        <div class="table-main">
            <div class="row p-2">
                <div class="col-md-6 col-12 left-side-filttle">
                    <!-- Status Filter -->
                    <div class="status-filter flex-start gap-4">
                        <p class="active-lable mb-0" @click="fetchshowCategory(1)" style="cursor: pointer;">All</p>
                    </div>

                </div>
                <div class="col-md-6 col-12 right-side-search">
                    <div class="search-input">
                        <input type="text" class="form-control input-seach" v-model="searchQuery" @input="debouncedAreaSearchWord"
                            placeholder="Search By Category Name" />
                        <i class="fa fa-search search-icon"></i>
                    </div>
                </div>
            </div>
            <!-- Loading Spinner -->
            <div class="spinner2 d-flex justify-content-center mb-3" v-if="categoryLoading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div v-else>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class='input-check-box'><input data-v-0b14badc="" type="checkbox"></th>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(items, index) in category">
                                <th class='input-check-box'><input data-v-0b14badc="" type="checkbox"></th>
                                <th>{{ index + 1 }}</th>
                                <td>{{ items.name }}</td>
                                <td>{{ items.created_at }}</td>
                                <td>
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit data">
                                        <router-link :to="{ name: 'categoryEdit', params: { id: items.id } }"
                                            class="import2 add-cc hover-cc py-2">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </router-link>
                                    </span>
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete data">
                                        <a @click="confirmDelete(items.id)" class="import2 add-cc hover-cc py-2">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <Bootstrap5Pagination :show-disabled=true :limit="5" :data="currentPagination"
                    @pagination-change-page="fetchshowCategory" />
                <div v-if="category && category.length === 0" class="text" style="text-align: center; margin: 10px 0 15px 0;">
                    No Category Found
                </div>
            </div>

        </div>


    </div>
</template>
<script>
import { mapActions, mapState } from 'vuex';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
function debounce(func, wait) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}
export default {
    components: { Bootstrap5Pagination },
    data() {
        return {
            searchQuery: '',
        };
    },
    methods: {
        ...mapActions('category', ['fetchshowCategory', 'fetchDeleteCategory', 'fetchCategorySearch']),
        CategorySearchWord() {
            if (this.searchQuery.length >= 3) {
                this.fetchCategorySearch({
                    query: this.searchQuery,
                });
            }
        },
        debouncedAreaSearchWord: debounce(function () {
            this.CategorySearchWord();
        }, 500),
        confirmDelete(id) {
            if (!id || typeof id !== 'number' && typeof id !== 'string') {
                console.error("Invalid ID passed to delete operation");
                return;
            }

            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.fetchDeleteCategory(id).then(() => {
                        this.$swal.fire({
                            title: "Deleted!",
                            text: "Category is deleted successfully.",
                            icon: "success"
                        });
                    });
                    this.fetchshowCategory(1);
                }
            });
        }
    },
    computed: {
        ...mapState('category', ['category', 'categoryLoading', 'pagination']),
        currentPagination() {
            return this.pagination ? this.pagination : "no pagination";
        },
        filterCategory() {
            return this.category.filter(category =>
                category.name.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }
    },
    mounted() {
        this.fetchshowCategory(1);
    }
};
</script>


<style scoped>
.input-seach::placeholder{
    font-size: x-small !important;
}
.table {
    background-color: #111313;
    color: white;
    border-radius: 8px;
    border-bottom: 2px solid #8b918f;
}

.table thead {
    border-bottom: 2px solid #8b918f;
    /* Change the white line to red */
}

.table thead tr {
    border-bottom: 2px solid #8b918f;
    /* Ensure the border of the row is red */
}

.input-check-box {
    width: 3%;
    padding-left: 12px;
}
</style>