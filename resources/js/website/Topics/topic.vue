<template>
    <div class="">
        <div class="lesson-card" style="padding: 2rem 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <p class="w-header-text">Machine Learning Courses</p>
                        <p class="wtext">Machine learning courses teach algorithms that enable systems to learn from
                            data. Learn to build
                            predictive models, train neural networks, and deploy intelligent applications. Mastering
                            machine
                            learning enables you to develop advanced AI solutions, crucial for roles in AI and data
                            science.
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column">
                                            <p class="wtext mb-0">Number of learners</p>
                                            <p class="" style="font-weight: 900;">8,824,317</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column">
                                            <p class="wtext mb-0">Number of courses</p>
                                            <p class="" style="font-weight: 900;">830</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="d-flex flex-column">
                                            <p class="wtext mb-0">Number of hands-on practice</p>
                                            <p class="" style="font-weight: 900;">2,416</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column">
                                            <p class="wtext mb-0">Average course rating</p>
                                            <p class="" style="font-weight: 900;">4.4</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-5" style="align-items: center;">
                            <p style="font-size: 14px; font-weight: 800;">Related</p>
                            <p class="labels">Development</p>
                            <p class="labels">IT & Software</p>
                            <p class="labels">Data Science</p>
                            <p class="labels">Other IT & Software</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <p class="w-header-text mb-0" style="font-size: 25px;">Looking to advance your skills in Machine Learning?
                We've got you.</p>
            <p class="w-text mb-2">Get everything you need to reach your goals in one convenient bundle.</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex gap-3">
                        <p class="wtext-2 label2">Top-rated courses</p>
                        <p class="wtext-2 label2">Popular with learners just like you</p>
                        <p class="wtext-2 label2">Guidance from real-world experts</p>
                    </div>
                </div>
            </div>
            <Card />
            <p class="w-header-text mb-0 mt-5" style="font-size: 25px;">Courses to get you started</p>
            <p class="w-text mb-2">Explore courses from experienced, real-world experts.</p>
            <div class="category-container mt-4">
                <div class="d-flex gap-5">
                    <p class="w-catgeory-card" :class="{ Categoryactive: activeCategory === 'Most popular' }"
                        @click="setActiveCategory('Most popular')">
                        Most popular
                    </p>
                    <p class="w-catgeory-card" :class="{ Categoryactive: activeCategory === 'Beginner Favorites' }"
                        @click="setActiveCategory('Beginner Favorites')">
                        Beginner Favorites
                    </p>
                </div>

                <!-- Animated Line -->
                <div class="underline"
                    :style="{ transform: activeCategory === 'Most popular' ? 'translateX(0)' : 'translateX(100%)' }">
                </div>
            </div>
            <Card />
            <p class="w-header-text mb-0 mt-4" style="font-size: 25px;">Neural Networks students also learn</p>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Deep Learning
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Artificial Intelligence (AI)
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Machine Learning
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Convolutional Neural Networks
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Data Science
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        TensorFlow
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        PyTorch
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Natural Language Processing (NLP)
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Computer Vision
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-all-data-science-course" style="text-align: center;">
                        Keras
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 mt-5">
            <LineCard />
        </div>
    </div>
</template>

<script>
import Card from '../HomePageCompound/cards.vue'
import LineCard from './lineCard.vue';
export default {
    components: {
        Card,
        LineCard
    },
    data() {
        return {
            activeCategory: 'Most popular'
        };
    },
    methods: {
        setActiveCategory(category) {
            this.activeCategory = category;
        }
    }
}
</script>
<style scoped>
.col-md-3 {
    height: 59px;
}

.flex-column {
    height: 43px;
    border-right: 2px solid #00bcd4;
}

.container {
    overflow: hidden;
}

.category-container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: fit-content;
}

/* Category Items */
.w-catgeory-card {
    cursor: pointer;
    position: relative;
}

/* Active Category */
.w-catgeory-card.Categoryactive {
    color: black;
}

/* Underline Animation */
.underline {
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 50%;
    height: 3px;
    background-color: black;
    transition: transform 0.3s ease-in-out;
}
</style>