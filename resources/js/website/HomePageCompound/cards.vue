<template>
    <router-link to="/course" style="text-decoration: none;">
        <swiper :navigation="true" :modules="modules" :slides-per-view="'auto'" :space-between="20" class="mySwiper subcateory-filter-card">
            <swiper-slide v-for="(card, index) in cards" :key="index">
                <div class="card">
                    <img :src="card.image" class="card-img-top" :alt="card.title">
                    <div class="card-body">
                        <p class="card-title mb-1">{{ truncateTitle(card.title, 49) }}</p>
                        <p class="card-text mb-1">{{ truncateText(card.description, 70) }}</p>
                        <p class="card-rating mb-1">
                            <span v-for="(star, index) in Math.floor(card.rating)" :key="'filled-' + index"
                                class="filled">★</span>
                            <span v-for="(star, index) in Math.max(0, 5 - Math.floor(card.rating || 0))"
                                :key="'empty-' + index" class="empty">☆</span>
                        </p>
                        <p class='mb-3'><span class="card-title">{{ card.price }}</span> <span
                                class="card-text card-discount">{{ card.discount }}</span>
                        </p>
                        <div class="d-flex gap-3">
                            <p class="labels">BestSeller</p>
                            <p class="labels">BestReviewes</p>
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </swiper>

    </router-link>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';
import { Navigation } from 'swiper/modules';
export default {
    components: { Swiper, SwiperSlide },
    setup() {
        const truncateText = (text, length) => {
            return text.length > length ? text.slice(0, length - 3) + "..." : text;
        };
        const truncateTitle = (text, length) => {
            return text.length > length ? text.slice(0, length - 3) + "..." : text;
        };
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
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 0,
                price: '$12.99',
                discount: '$79.99',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '$79.99',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '$79.99',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '$79.99',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '$79.99',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '$79.99',
            },
            {
                title: "The Complete Full-Stack Web Development Bootcamp",
                description: "Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!",
                image: "https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png",
                link: "#",
                rating: 4.5,
                price: '$12.99',
                discount: '$79.99',
            }
        ];

        return {
            modules: [Navigation],
            cards,
            truncateText,
            truncateTitle,
            getStars,
        };

    },
}
</script>

<style scoped>

.card-discount {
    text-decoration: line-through;
    font-weight: 600;
    margin-left: 6px;
}

.card-rating {
    font-size: 18px;
}

.card-rating .filled {
    color: #c4710d;
    font-size: 16px;
    /* Filled star color */
}

.card-rating .empty {
    color: #c4710d;
    font-size: 16px;
    /* Empty star color */
    background-color: white;
    /* Background for empty stars */
}


.card-text {
    color: #575555;
    font-weight: 400;
    font-size: 15px;
}

.card-title {
    font-size: 16px;
    font-weight: 800;
}

.card-img-top {
    height: 12rem !important;
}

.swiper-slide {
    width: auto;
    /* Allow dynamic sizing */
    flex-shrink: 0;
    display: flex;
}

.card {
    width: 19rem;
    flex: 1;
    border-radius: 12px;
    overflow: hidden;
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

</style>