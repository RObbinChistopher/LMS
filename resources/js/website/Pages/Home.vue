<template>
    <div class="">
        <div class="container d-flex gap-3 mb-3 mt-3">
            <div class="image-circle">C</div>
            <div class="">
                <p class="mb-0 w-header-text" style="font-weight: 800; line-height: 2.3rem;">Welcome back, Christopher
                </p>
                <router-link to="/" class="mb-0 card-title crad-interesting"
                    style="font-weight: 500;"><span class="card-items">Add occupation and interests</span></router-link>
            </div>
        </div>
        <div class="crad-design" style="position: relative;">
            <div class="card-inner-design ">
                <p class="mb-0 w-header-text" style="font-weight: 800; line-height: 2.3rem;">Christopher, thanks for
                    trying a free course</p>
                <p class="mb-0 card-title" style="font-weight: 500;">Now, unlock our best features with courses as low
                    as
                    $10.99 — limited time only.</p>
            </div>
        </div>
        <!-- <Adslider></Adslider> -->
        <div class="w-main-content">
            <div class="container">
                <p class="mb-0 w-header-text">All the skills you need in one place</p>
                <p style="margin-bottom: 2.5rem;">From critical skills to technical topics, Udemy supports your
                    professional development.</p>
                <div class="w-main-all-category mb-3">
                    <p class="w-catgeory-card">Data Science</p>
                    <p class="w-catgeory-card">IT Certifications</p>
                    <p class="w-catgeory-card">Leadership</p>
                    <p class="w-catgeory-card">Web Development</p>
                    <p class="w-catgeory-card">Communication</p>
                    <p class="w-catgeory-card">Business Analytics & Intelligence</p>
                </div>
            </div>
            <div class="lesson-card mt-3">
                <div class="container">
                    <swiper :modules="modules" :slides-per-view="'auto'" :space-between="20"
                        class="mySwiper subcateory-filter-card">
                        <swiper-slide v-for="(category, index) in subcategories" :key="index">
                            <div class="d-flex flex-column subcatgeory-card">
                                <p class="mb-0 subcategpry-card-option">{{ category.name }}</p>
                                <p class="mb-0 subcategpry-card-option">{{ category.learners }} learners</p>
                            </div>
                        </swiper-slide>
                    </swiper>
                    <div style="margin: 2rem 0;">
                        <Card></Card>
                    </div>
                    <div style="text-align: center;">
                        <button class="btn-all-data-science-course">Show All Data Science Course</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="brand-logo" style="margin-top: 3rem;">
            <p style="text-align: center;">Trusted by over 16,000 companies and millions of learners around the world
            </p>
            <div class="container d-flex gap-3 mt-3" style="justify-content: space-between;">
                <img src="frontend/images/volkswagen_logo.svg" alt="">
                <img src="../../../../public/frontend/images/samsung_logo.svg" alt="">
                <img src="../../../../public/frontend/images/cisco_logo.svg" alt="">
                <img src="../../../../public/frontend/images/vimeo_logo_resized-2.svg" alt="">
                <img src="../../../../public/frontend/images/procter_gamble_logo.svg" alt="">
                <img src="../../../../public/frontend/images/citi_logo.svg" alt="">
                <img src="../../../../public/frontend/images/ericsson_logo.svg" alt="">
                <img src="../../../../public/frontend/images/hewlett_packard_enterprise_logo.svg" alt="">
            </div>
        </div>
        <div class="container" style="margin-top: 5rem;">
            <p class="w-header-text mb-0">Learners are viewing</p>
            <Card></Card>
        </div>
        <div style="margin-top: 3rem;">
            <div class="container">
                <p class="w-header-text mb-0">Accelerate growth — for you or your organization</p>
                <p>Reach goals faster with one of our plans or programs. Try one free today or contact sales to learn
                    more.</p>
                <Plans></Plans>
            </div>
        </div>
        <div class="lesson-card mt-3" style="margin-top: 3rem !important; padding-bottom: 3rem !important;">
            <div class="d-col-center" style="padding-top: 2rem !important;">
                <p class="w-header-text mb-0">Our Achievements</p>
                <p>Become part of a vibrant community of learners and instructors, dedicated to growth and excellence.
                </p>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin-top: 2rem !important;">
                    <div class="d-center">
                        <div class="usp-type-design">
                            <img src="../../../../public/frontend/images/c1.png" style="width: 62%;" alt="">
                        </div>
                        <div class="d-col-center gap-0 usp-type-design-back">
                            <p class="w-header-text mb-0">350+</p>
                            <p class="w-header-text mb-0" style="font-size: x-large">Courses Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 2rem !important;">
                    <div class="d-center">
                        <div class="usp-type-design">
                            <img src="../../../../public/frontend/images/c2.png" style="width: 62%;" alt="">
                        </div>
                        <div class="d-col-center gap-0 usp-type-design-back">
                            <p class="w-header-text mb-0">500+</p>
                            <p class="w-header-text mb-0" style="font-size: x-large">Certified Instructors</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 2rem !important;">
                    <div class="d-center">
                        <div class="usp-type-design">
                            <img src="../../../../public/frontend/images/c3.png" style="width: 62%;" alt="">
                        </div>
                        <div class="d-col-center gap-0 usp-type-design-back">
                            <p class="w-header-text mb-0">350+</p>
                            <p class="w-header-text mb-0" style="font-size: x-large">Courses Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 2rem !important;">
                    <div class="d-center">
                        <div class="usp-type-design">
                            <img src="../../../../public/frontend/images/c4.png" style="width: 62%;" alt="">
                        </div>
                        <div class="d-col-center gap-0 usp-type-design-back">
                            <p class="w-header-text mb-0">7,500+</p>
                            <p class="w-header-text mb-0" style="font-size: x-large">Courses Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../include/Header.vue';
import Adslider from '../HomePageCompound/Slider.vue'
import Card from '../HomePageCompound/cards.vue'
import Plans from '../HomePageCompound/Plans.vue';
import Footer from '../include/Footer.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';
import { Navigation } from 'swiper/modules';
export default {
    components: { Header, Adslider, Swiper, SwiperSlide, Card, Plans, Footer },
    setup() {
        const subcategories = [
            { name: "ChatGPT", learners: "4M+" },
            { name: "Data Science", learners: "7M+" },
            { name: "Python", learners: "47.7M+" },
            { name: "Machine Learning", learners: "8M+" },
            { name: "Cyber Security", learners: "3M+" },
            { name: "Deep Learning", learners: "9M+" },
            { name: "Artificial Intelligence (AI)", learners: "2M+" },
            { name: "Statistics", learners: "1M+" },
            { name: "Natural Language Processing (NLP)", learners: "803,600+ learners" },
        ];

        return {
            modules: [Navigation],
            subcategories,
        };

    },
}
</script>

<style scoped>
.crad-interesting {
    font-weight: 500;
    font-size: medium;
    color: #391e6b;
}

.image-circle {
    width: 60px;
    height: 60px;
    border: 1px solid #391e6b;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background: #391e6b;
    color: white;
    font-size: 42px;
}

.crad-design {
    background-image: url(/frontend/images/t3.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 80vh;
}

.card-inner-design {
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    width: 27%;
    padding: 15px;
    position: absolute;
    top: 3rem;
    left: 8rem;
    border-radius: 5px;
}

.usp-type-design-back {
    line-height: 35px;
    background: #361d67;
    padding: 23px 10px;
    color: white;
    border-radius: 13px;
}

.usp-type-design {
    width: 12%;
    border: 2px solid #361d67;
    text-align: center;
    padding: 11px 6px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

.subcateory-filter-card {
    display: flex;
    gap: 20px;
    padding: 10px 0;
}

.swiper {
    width: 100%;
    height: auto;
}

.swiper-slide {
    width: auto;
    /* Allow dynamic sizing based on content */
    flex-shrink: 0;
}

.subcategpry-card-option {
    font-size: 13px;
    font-weight: 800;
}

.subcatgeory-card {
    background: #391e6b;
    padding: 8px 23px;
    color: white;
    font-size: 13px;
    border-radius: 10px;
    margin-top: 2rem;
}

.subcatgeory-card:hover {
    background: #6ee0fb;
    color: black;
}

.w-main-content {
    margin-top: 3rem;
    margin-bottom: 3rem;
}

.w-main-all-category {
    display: flex;
    gap: 40px;
}
</style>