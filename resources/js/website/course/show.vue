<template>
    <div>
        <div class="lesson-card" style="padding:2rem 0;">
            <div class="container">
                <p class="categoryCard mb-1">IT & Software <i class="fas fa-angle-right"></i> Other IT & Software <i
                        class="fas fa-angle-right"></i>
                    Data Science</p>
                <p class="mb-0 w-header-text" style="color: #361d67;">Data Science Real World Projects in Python</p>
                <p class="card-title mb-2">Build Data science Real world Projects in AI, ML , NLP and Time Series domain
                    &
                    get a job of Data Scientist/ML Engineer</p>
                <p class="card-rating mb-1">
                    <span class="rating-ratio-text">4.5 </span>
                    <span v-for="(star, index) in Array.from({ length: Math.floor(4.5) })" :key="'filled-' + index"
                        class="filled">★</span>
                    <span v-for="(star, index) in Array.from({ length: Math.max(0, 5 - Math.floor(4.5 || 0)) })"
                        :key="'empty-' + index" class="empty">☆</span>
                    <span class="rating-ratio" style="text-decoration: underline;">&nbsp; (1,348) rating</span>
                    <span class="total-student">&nbsp;84,378 students</span>
                </p>
                <p class="mb-1">Created by <span class="rating-ratio"
                        style="text-decoration: underline;">christopher</span>
                </p>
                <div class="d-flex gap-3">
                    <p class="total-student"><i class="fa-regular fa-clock"
                            style="font-size: 14px;"></i>&nbsp;&nbsp;Last
                        updated 11/2024</p>
                    <p class="total-student"><i class="fa-solid fa-globe"
                            style="font-size: 14px;"></i>&nbsp;&nbsp;English
                    </p>
                    <p class="total-student"><i class="fa-solid fa-headphones"
                            style="font-size: 14px;"></i>&nbsp;&nbsp;English [Auto], Korean [Auto]</p>
                </div>
            </div>
        </div>
        <div class="container mt-5" style="max-width: 1150px;">
            <div class="row">
                <div class="col-md-8 p-2">
                    <div class="p-3" style="border: 1px solid #d1d2e0; border-radius: 10px;">
                        <p class="mb-3 w-header-text" style="font-size: 25px;">What you'll learn</p>
                        <div class="d-flex align-items-start mb-3">
                            <div class="col-md-6 flex-fill" style="padding: 0 20px 0 0;">
                                <div class="d-flex gap-3" style="align-items: baseline;">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p class="card-text">Hands on Real-World Projects on Various Domains
                                        of Data Science in Machine Learning, Natural Language Processing</p>
                                </div>
                            </div>
                            <div class="col-md-6 flex-fill" style="padding: 0 0 0 20px;">
                                <div class="d-flex gap-3" style="align-items: baseline;">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p class="card-text">Develop Natural Language Processing Models for Customer
                                        Sentiments</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="col-md-6 flex-fill" style="padding: 0 20px 0 0;">
                                <div class="d-flex gap-3" style="align-items: baseline;">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p class="card-text">Develop time series forecasting models to predict Prices of
                                        stocks</p>
                                </div>
                            </div>
                            <div class="col-md-6 flex-fill" style="padding: 0 0 0 20px;">
                                <div class="d-flex gap-3" style="align-items: baseline;">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p class="card-text">Learn how to map your Problem into Data Science problem</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="col-md-6 flex-fill" style="padding: 0 20px 0 0;">
                                <div class="d-flex gap-3" style="align-items: baseline;">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p class="card-text">Learn best practices for real-world data sets.</p>
                                </div>
                            </div>
                            <div class="col-md-6 flex-fill" style="padding: 0 0 0 20px;">
                                <div class="d-flex gap-3" style="align-items: baseline;">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p class="card-text">Data Science Capstone Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 mb-2 w-header-text" style="font-size: 25px;">Explore related topics</p>
                    <div class="d-flex gap-3">
                        <p class="wtext-2 label2">Data Science</p>
                        <p class="wtext-2 label2">Other IT & Software</p>
                        <p class="wtext-2 label2">IT & Software</p>
                    </div>
                    <p class="mb-3 mt-4 w-header-text" style="font-size: 25px;">This course includes:</p>
                    <div class="d-flex align-items-start mb-3">
                        <div class="col-md-6 flex-fill">
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-regular fa-circle-play"></i>
                                <p class="card-text" style="font-weight: 800;">11 hours on-demand videos</p>
                            </div>
                        </div>
                        <div class="col-md-6 flex-fill">
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-tv"></i>
                                <p class="card-text" style="font-weight: 800;">Access on mobile and TV</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="col-md-6 flex-fill">
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-regular fa-file"></i>
                                <p class="card-text" style="font-weight: 800;">5 articles</p>
                            </div>
                        </div>
                        <div class="col-md-6 flex-fill">
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-trophy"></i>
                                <p class="card-text" style="font-weight: 800;">Certificate of completion</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="col-md-6 flex-fill">
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-download"></i>
                                <p class="card-text" style="font-weight: 800;">5 downloadable resources</p>
                            </div>
                        </div>
                        <div class="col-md-6 flex-fill">
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-link"></i>
                                <p class="card-text" style="font-weight: 800;">online Links</p>
                            </div>
                        </div>
                    </div>
                    <p class="mb-3 mt-4 w-header-text" style="font-size: 25px;">Course content</p>
                    <div class="" style="border: 1px solid rgb(173 173 173);">
                        <div v-for="(section, index) in courseSections" :key="index" class="course-section">
                            <button class="section-toggle" @click="toggleSection(index)"
                                style="display: flex; justify-content: space-between;">
                                <span class="section-little">{{ section.title }}</span>
                                <div class='d-flex gap-1'>
                                    <span class="lectures-timing">4 lectures</span>
                                    <span class="lectures-timing">.</span>
                                    <span class="lectures-timing">12min</span>
                                </div>
                            </button>
                            <div v-if="section.isOpen" class="lectures">
                                <p v-for="(lecture, i) in section.lectures" class="mb-3" :key="i"
                                    style="display: flex;justify-content: space-between;">
                                    <span>
                                        <i class="fa-regular fa-circle-play" style="width: 26px;"></i>{{ lecture.title
                                        }}
                                    </span>
                                    <span style="color: #00bcd4;"><strong>{{ lecture.duration }}</strong></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <p class="mb-2 mt-4 w-header-text" style="font-size: 25px;">Requirements</p>
                    <li class="card-text">Basic knowledge of programming is recommended. However, You can follow my
                        Basics of
                        Python Course which is free of cost therefore, the course has no prerequisites, and is open to
                        anyone with basic programming knowledge. Students who enroll in this course will master data
                        science and directly apply these skills to solve real world challenging business problems.</li>
                    <p class="mb-2 mt-4 w-header-text" style="font-size: 25px;">Students also bought</p>
                    <div v-for="course in courses" :key="course.id" class="row mb-3"
                        style="border-bottom: 1px solid #b9b6b6;">
                        <div class="col-md-2" style="width: 10.666667%;">
                            <img :src="course.image" style="width: 100%;" :alt="course.title">
                        </div>
                        <div class="col-md-4">
                            <p class="card-title mb-0" style="font-size: 16px; font-weight: 800;">
                                {{ course.title }}
                            </p>
                            <p class="card-title mb-2 card-text-label">
                                {{ course.duration }} total hours
                                <span style="color: #361d67; font-weight: 800;">
                                    {{ course.updated }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p class="card-title mb-2" style="font-size: 18px; font-weight: 900;">
                                {{ course.rating }} <span style="color: #c4710d;">★</span>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p class="card-title mb-2" style="font-size: 15px; font-weight: 800;">
                                <span><i class="fa-solid fa-users-line"></i></span> {{ course.students }}
                            </p>
                        </div>
                        <div class="col-md-1">
                            <p class="card-title mb-2">
                                <span style="font-size: 18px; font-weight: 900;">${{ course.price }}</span>
                                <span style="text-decoration: line-through; font-size: 14px;">
                                    ${{ course.originalPrice }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-1">
                            <p class="card-title-heard-icon mb-2">
                                <i class="fa-regular fa-heart"></i>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 mt-2">
                    <div class="video-section">
                        <div class="flex-center video-thumnnile">
                            <img src="../../../../public/frontend/images/pause_btn.png" alt="" style="width: 20%;">
                            <p class="preview-course">Preview This Course</p>
                        </div>
                        <div class="p-3">
                            <div class="d-flex gap-2 mt-3" style="align-items: center;">
                                <p class="text-price mb-1">$10.99</p>
                                <p class="mb-1" style="text-decoration: line-through;">$59.99</p>
                                <p class="text-price-discount mb-1">82% off</p>
                            </div>
                            <div class="d-flex gap-2" style="align-items: center;">
                                <i class="fa-solid fa-clock-rotate-left" style="font-size: 14px; color: red;"></i>
                                <p class="price-remain-discount mb-0"><strong>1 day</strong> left at this price!</p>
                            </div>
                            <div class="d-flex gap-2 mt-3" style="align-items: baseline;">
                                <router-link to="/cart" class="btn-all-data mb-2" style="text-decoration: none;">Add to cart</router-link>
                                <p class="card-title-heard-icon mb-2">
                                    <i class="fa-regular fa-heart"></i>
                                </p>
                            </div>
                            <p class="btn-all-data-border mb-2">Buy now</p>
                            <p style="font-size: small; text-align: center;">30-Day Money-Back Guarantee</p>
                            <p class="text-price mb-2" style="font-size: 15px;">This course includes:</p>
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-regular fa-circle-play icon-width" style="font-size: 14px;"></i>
                                <p class="course-detail mb-2">29.5 hours on-demand video</p>
                            </div>
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-regular fa-file icon-width" style="font-size: 14px;"></i>
                                <p class="course-detail mb-2">41 articles</p>
                            </div>
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-download icon-width" style="font-size: 14px;"></i>
                                <p class="course-detail mb-2">54 downloadable resources</p>
                            </div>
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-tv icon-width" style="font-size: 14px;"></i>
                                <p class="course-detail mb-2">Access on mobile and TV</p>
                            </div>
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-infinity icon-width" style="font-size: 14px;"></i>
                                <p class="course-detail mb-2">Full lifetime access</p>
                            </div>
                            <div class="d-flex gap-2" style="align-items: baseline;">
                                <i class="fa-solid fa-trophy icon-width" style="font-size: 14px;"></i>
                                <p class="course-detail mb-2">Certificate of completion</p>
                            </div>
                            <div class="d-flex gap-3 mt-3" style="justify-content: space-between;">
                                <p class="main-thinh-course mb-0">Share</p>
                                <p class="main-thinh-course mb-0">Gift this course</p>
                                <p class="main-thinh-course mb-0">Apply Coupon</p>
                            </div>
                            <div class="d-flex gap-2 mt-3" style="align-items: baseline;">
                                <input type="text" class="form-control from-control" placeholder="Enter Coupon">
                                <p class="btn-all-data-coupon mb-2">Apply</p>
                            </div>
                            <p class="text-price mb-2 mt-3" style="font-size: 15px;">Training 5 or more people?</p>
                            <p>Get your team access to 27,000+ top Udemy courses anytime, anywhere.</p>
                            <p class="btn-all-data-border mb-2">Try Inpath Business</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 flex-column">
                    <p class="mb-2 w-header-text" style="font-size: 25px;">Innovating the Future: Developers Driving
                        AI-Driven Technology</p>
                    <p>In today’s fast-paced digital world, developers play a pivotal role in shaping the
                        technologies that power everything from web applications to artificial intelligence
                        (AI).
                        Machine learning, a transformative force, is revolutionizing industries by enabling
                        systems
                        to learn from data and make intelligent decisions without explicit programming. Deep
                        learning, a subset of machine learning, takes this further by mimicking the human brain
                        through neural networks, tackling complex challenges such as image recognition, natural
                        language processing, and autonomous driving.

                        With robust frameworks like TensorFlow and PyTorch, developers can create advanced AI
                        models
                        that push the boundaries of innovation. The demand for skilled professionals in AI and
                        data
                        science is surging as businesses leverage big data to uncover insights and enhance
                        efficiency. From recommendation systems to fraud detection, machine learning is
                        reshaping
                        how we interact with technology.

                        As artificial intelligence continues to evolve, ethical considerations are becoming
                        increasingly critical to ensure the development of responsible and unbiased AI systems.
                        The
                        collaboration between software engineering and AI is driving groundbreaking
                        advancements,
                        making this an ideal time to explore the world of intelligent computing. Whether you're
                        building chatbots, self-learning applications, or predictive analytics tools, the future
                        of
                        technology lies in the hands of those who innovate with AI.</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            courseSections: [
                {
                    title: "Introduction to this course",
                    lectures: [
                        { title: "Installing Anaconda Navigator", duration: "10:32" },
                        { title: "Quick Summary of Jupyter Notebook", duration: "08:15" }
                    ],
                    isOpen: false
                },
                {
                    title: "Introduction to Life-Cycle of Data Science Project !",
                    lectures: [
                        { title: "Part 3 : EDA(Exploratory Data Analysis) + Feature Engineering !", duration: "15:45" },
                        { title: "Part 4 : Model Building & Deployment of Model !", duration: "12:30" },
                        { title: "Data Science & its Applications", duration: "09:20" }
                    ],
                    isOpen: false
                },
                {
                    title: "Project 1-->> Predict Fare of Airlines Tickets using Machine Learning",
                    lectures: [
                        { title: "Part 3 : EDA(Exploratory Data Analysis) + Feature Engineering !", duration: "14:50" },
                        { title: "Part 4 : Model Building & Deployment of Model !", duration: "16:05" },
                        { title: "Data Science & its Applications", duration: "11:45" }
                    ],
                    isOpen: false
                },
                {
                    title: "Project 2-->> Predict Password Strength using Natural Language Processing",
                    lectures: [
                        { title: "Part 3 : EDA(Exploratory Data Analysis) + Feature Engineering !", duration: "13:25" },
                        { title: "Part 4 : Model Building & Deployment of Model !", duration: "14:10" },
                        { title: "Data Science & its Applications", duration: "10:55" }
                    ],
                    isOpen: false
                },
                {
                    title: "Project 3-->> Predict Stock Prices using Time Series Analysis",
                    lectures: [
                        { title: "Part 3 : EDA(Exploratory Data Analysis) + Feature Engineering !", duration: "17:30" },
                        { title: "Part 4 : Model Building & Deployment of Model !", duration: "18:45" },
                        { title: "Data Science & its Applications", duration: "12:20" }
                    ],
                    isOpen: false
                },
                {
                    title: "Bonus Session",
                    lectures: [
                        { title: "Part 3 : EDA(Exploratory Data Analysis) + Feature Engineering !", duration: "14:00" },
                        { title: "Part 4 : Model Building & Deployment of Model !", duration: "15:25" },
                        { title: "Data Science & its Applications", duration: "09:50" }
                    ],
                    isOpen: false
                }
            ],
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
.video-section {
    background-color: white;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.video-thumnnile {
    background-image: url(https://img-c.udemycdn.com/course/240x135/3474510_5d2c_4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 25vh;
}
.preview-course{
    color: white;
    font-size: 20px;
    font-weight: 900;
    margin-top: 10px;
}
.from-control {
    background-color: white !important;
    border: 2px solid #361d67 !important;
    outline: none;
    box-shadow: none !important;
}
.main-thinh-course {
    font-size: 16px;
    font-weight: 800;
    color: #6d6d72;
    border-bottom: 3px solid #361d67;
    cursor: pointer;
}

.icon-width {
    width: 20px;
}

.course-detail {
    font-size: 13px;
    color: #00bcd4;
    font-weight: 700;
}

.btn-all-data {
    border: 1px solid #361d67;
    padding: 10px 21px;
    border-radius: 5px;
    background: #361d67;
    color: white;
    width: 80%;
    text-align: center;
}

.btn-all-data-border {
    border: 2px solid #361d67;
    padding: 10px 21px;
    border-radius: 5px;
    color: #361d67;
    width: 100%;
    font-size: 18px;
    text-align: center;
    font-weight: 700;
}

.price-remain-discount {
    font-size: 14px;
    color: red;
}

.text-price {
    font-size: 21px;
    font-weight: 900
}

.text-price-discount {
    font-size: 18px;
    color: #00bcd4;
    font-weight: 700;
}

.flex-center {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.flex-column {
    display: flex;
    flex-direction: column;
}

.card-text-label {
    font-size: 12px;
    color: #00bcd4;
}

.card-title-heard-icon {
    width: 40px;
    height: 40px;
    border: 2px solid #361d67;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-title-heard-icon>i {
    font-size: 18px;
    color: #361d67;
}

.lectures-timing {
    color: #361d67;
    font-weight: 800;
}

.categoryCard {
    font-size: 14px;
    font-weight: 800;
    color: black;
}

.rating-ratio-text {
    font-size: 16px;
    color: #c4710d;
    font-weight: 900;
}

.rating-ratio {
    font-size: 14px;
    font-weight: 900;
    color: #361d67;
}

.total-student {
    font-size: 14px;
    font-weight: 800;
    color: black;
}

.course-container {
    max-width: 500px;
    margin: auto;
}

.course-section {
    border-bottom: 1px solid #0000002b;
    border-radius: 2px;
    overflow: hidden;
    padding: 10px 0;
    background: #f6f7f9
}

.section-little {
    font-weight: 900;
    width: 80%;
}

.section-toggle {
    width: 100%;
    background: #f6f7f9;
    padding: 10px;
    border: none;
    text-align: left;
    font-size: 16px;
    cursor: pointer;
}
.btn-all-data:hover {
    background: #6EE0fB;
    color: black;
}

.lectures {
    padding: 10px;
    background: white;
}

.lectures p {
    margin: 5px 0;
}
</style>