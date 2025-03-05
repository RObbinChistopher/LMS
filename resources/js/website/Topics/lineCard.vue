<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 p-2">
                <p class="w-header-text mb-3" style="font-size: 25px;">Filters By Sorts</p>
                <p class="mb-0" style="font-size: 25px;">Categories</p>
                <div class="form-check mb-2 mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label category-label" for="flexCheckDefault">
                        Deep Learning
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Artificial Intelligence (AI)
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Machine Learning
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Convolutional Neural Networks
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Data Science
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Natural Language Processing (NLP)
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Computer Vision
                    </label>
                </div>
                <p class="mt-3 mb-1" style="font-size: 25px;">Levels</p>
                <div class="form-check mb-2 mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        All Levels (156)
                    </label>
                </div>
                <div class="form-check mb-2 mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Beginner (38)
                    </label>
                </div>
                <div class="form-check mb-2 mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Intermediate (45)
                    </label>
                </div>
                <div class="form-check mb-2 mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label category-label" for="flexCheckChecked">
                        Expert (56)
                    </label>
                </div>
            </div>
            <div class="col-md-9 p-2">
                <div class="row mb-2 cardLine" v-for="(card, index) in cards" :key="index"
                    style="border: 1px solid #f6f7f9;">
                    <div class="col-md-4 p-2">
                        <img :src="card.image" class="card-img" alt="Course Image">
                    </div>
                    <div class="col-md-7 p-2">
                        <p class="card-title mb-1">{{ card.title }}</p>
                        <p class="card-text mb-1">{{ card.description }}</p>
                        <p class="card-text-user-text mb-1">{{ card.userName }}</p>
                        <p class="card-text-user-text mb-0">34 total mins, 14 lectures, All Levels</p>
                        <p class="card-rating mb-1">
                            <span v-for="(star, index) in Math.floor(card.rating)" :key="'filled-' + index"
                                class="filled">★</span>
                            <span v-for="(star, index) in Math.max(0, 5 - Math.floor(card.rating || 0))"
                                :key="'empty-' + index" class="empty">☆</span>
                        </p>
                    </div>
                    <div class="col-md-1 p-2">
                        <p class="card-title mb-1">{{ card.price }}
                        </p>
                        <p class="card-text card-discount">{{ card.discount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    setup() {
        const getStars = (rating) => {
            const fullStars = Math.floor(rating);
            const emptyStarsCount = 5 - fullStars;

            const filledStars = '★'.repeat(fullStars);
            const emptyStars = '☆'.repeat(emptyStarsCount);

            return filledStars + emptyStars;
        };
        const cards = [
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Learn Python from scratch and build your coding skills.",
                userName: "christopher",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                link: "#",
                rating: 0,
                price: '$12.99',
                discount: '79.99$',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                userName: "christopher",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '79.99$',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                link: "#",
                userName: "christopher",
                rating: 4.5,
                price: '$12.99',
                discount: '79.99$',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                link: "#",
                userName: "christopher",
                rating: 4.5,
                price: '$12.99',
                discount: '79.99$',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                link: "#",
                userName: "christopher",
                rating: 4.5,
                price: '$12.99',
                discount: '79.99$',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                link: "#",
                userName: "christopher",
                rating: 4.5,
                price: '$12.99',
                discount: '79.99$',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/course/480x270/2090180_1bb7.jpg",
                link: "#",
                userName: "christopher",
                rating: 4.5,
                price: '$12.99',
                discount: '79.99$',
            }
        ];

        return {
            cards,
            getStars,
        };
    }
}
</script>

<style scoped>
.category-label {
    color: black;
}

.form-check-input {
    border-color: #361d67 !important;
}

.form-check-input:checked {
    background-color: #361d67 !important;
    border-color: #361d67 !important;
}

.card-text-user-text {
    font-size: 13px;
    font-weight: 900;
    color: #1413138f;
}

.cardLine {
    border: 2px solid rgb(120 120 120 / 51%);
    border-radius: 5px;
}
</style>