<template>
    <div class="container mt-4">
        <p class="mb-3 w-header-text">Shopping Cart</p>
        <div class="row">
            <div class="col-md-9">
                <p class="card-title mb-3">4 Courses in Cart</p>
                <div v-for="course in courses" :key="course.id" class="row mb-3"
                    style="border-bottom: 1px solid #b9b6b6;">
                    <div class="col-md-2" style="width: 10.666667%;">
                        <img :src="course.image" style="width: 100%;" :alt="course.title">
                    </div>
                    <div class="col-md-5">
                        <p class="card-title mb-0" style="font-size: 16px; font-weight: 800;">
                            {{ course.title }}
                        </p>
                        <p class="mb-1" style="font-size: 12px;">
                            Pianalytix • 75,000+ Students Worldwide
                        </p>
                        <p class="d-flex gap-2" style="font-size: 12px;">
                            29.5 total hours
                            <li>250 lectures</li>
                            <li>All Levels</li>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <p class="card-title mb-2" style="font-size: 18px; font-weight: 900;">
                            {{ course.rating }} <span style="color: #c4710d;">★</span>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="card-title mb-2 d-flex flex-column gap-1">
                            <router-link to="/" style="color: #361d67; text-decoration: none;"><span
                                    class="card-items">Remove</span></router-link>
                            <router-link to="/" style="color: #361d67; text-decoration: none;"><span
                                    class="card-items">Save for Later</span></router-link>
                            <router-link to="/" style="color: #361d67; text-decoration: none;"><span
                                    class="card-items">Move to Wishlist</span></router-link>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <p class="card-title mb-2">
                            <span class="d-flex gap-2"
                                style="font-size: 18px; font-weight: 900; color: #361d67; align-items: end;">${{
                                    course.price }}<i class="fa-solid fa-tag"></i></span>
                            <span style="text-decoration: line-through; font-size: 14px;">
                                ${{ course.originalPrice }}
                            </span>
                        </p>
                    </div>
                </div>
                <p class="card-title mb-3 mt-4">Recently wishlisted</p>
                <div v-for="course in courses" :key="course.id" class="row mb-3"
                    style="border-bottom: 1px solid #b9b6b6;">
                    <div class="col-md-2" style="width: 10.666667%;">
                        <img :src="course.image" style="width: 100%;" :alt="course.title">
                    </div>
                    <div class="col-md-5">
                        <p class="card-title mb-0" style="font-size: 16px; font-weight: 800;">
                            {{ course.title }}
                        </p>
                        <p class="mb-1" style="font-size: 12px;">
                            Pianalytix • 75,000+ Students Worldwide
                        </p>
                        <p class="d-flex gap-2" style="font-size: 12px;">
                            29.5 total hours
                            <li>250 lectures</li>
                            <li>All Levels</li>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <p class="card-title mb-2" style="font-size: 18px; font-weight: 900;">
                            {{ course.rating }} <span style="color: #c4710d;">★</span>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="card-title mb-2 d-flex flex-column gap-1">
                            <router-link to="/" style="color: #361d67; text-decoration: none;"><span
                                    class="card-items">Remove</span></router-link>
                            <router-link to="/" style="color: #361d67; text-decoration: none;"><span
                                    class="card-items">Save for Later</span></router-link>
                            <router-link to="/" style="color: #361d67; text-decoration: none;"><span
                                    class="card-items">Move to Wishlist</span></router-link>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <p class="card-title mb-2">
                            <span class="d-flex gap-2"
                                style="font-size: 18px; font-weight: 900; color: #361d67; align-items: end;">${{
                                    course.price }}<i class="fa-solid fa-tag"></i></span>
                            <span style="text-decoration: line-through; font-size: 14px;">
                                ${{ course.originalPrice }}
                            </span>
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <p class="card-title mb-2">Total:</p>
                <p class="w-header-text mb-0">$38.97</p>
                <p class="card-title" style="text-decoration: line-through; font-weight: 500;">$239.97</p>
                <p class="card-title" style="font-weight: 500;">84% off</p>
                <router-link to="/payment-checkout" style="text-decoration: none;">
                    <p class="btn-all-data-science-course mt-2 mb-1" style="text-align: center;">Proceed to
                        Checkout&nbsp;<i class="fa-solid fa-arrow-right"></i></p>
                </router-link>
                <p style="font-size: 12px;" class="mb-1">You won't be charged yet</p>
                <hr>
                <p class="card-title mb-1">Promotions</p>
                <div class="d-flex gap-2 mt-0" style="align-items: baseline;">
                    <input type="text" class="form-control from-control" placeholder="Enter Coupon">
                    <p class="btn-all-data-coupon mb-2">Apply</p>
                </div>
            </div>
        </div>
        <p class="card-title mb-3 mt-4" style="font-size: larger;">You might also like</p>
        <Cards></Cards>
    </div>
</template>
<script>
import Cards from '../HomePageCompound/cards.vue';
export default {
    components: { Cards },
    data() {
        return {
            courses: [
                {
                    id: 1,
                    image: "https://img-c.udemycdn.com/course/100x100/4885940_14ce_2.jpg",
                    title: "Data Science Real World Projects in Python",
                    duration: "133.5",
                    updated: "1/2025 Updated",
                    rating: 4.5,
                    students: "3,622",
                    price: 9.99,
                    originalPrice: 47.99
                },
                {
                    id: 2,
                    image: "https://img-c.udemycdn.com/course/100x100/2367072_711c.jpg",
                    title: "Machine Learning Masterclass",
                    duration: "85.0",
                    updated: "2/2025 Updated",
                    rating: 4.7,
                    students: "5,100",
                    price: 12.99,
                    originalPrice: 59.99
                },
                {
                    id: 3,
                    image: "https://img-c.udemycdn.com/course/100x100/3730682_ea10_6.jpg",
                    title: "Full-Stack Web Development with Vue.js",
                    duration: "120.0",
                    updated: "3/2025 Updated",
                    rating: 4.8,
                    students: "4,500",
                    price: 14.99,
                    originalPrice: 69.99
                },
                {
                    id: 4,
                    image: "https://img-c.udemycdn.com/course/100x100/5961214_0e9b_3.jpg",
                    title: "The Top Data Scientist ™ BootCamp",
                    duration: "120.0",
                    updated: "3/2025 Updated",
                    rating: 4.8,
                    students: "4,500",
                    price: 14.99,
                    originalPrice: 69.99
                }
            ],
        };
    },

    methods: {
        toggleSection(index) {
            this.courseSections[index].isOpen = !this.courseSections[index].isOpen;
        }
    }
};
</script>

<style scoped>

</style>
