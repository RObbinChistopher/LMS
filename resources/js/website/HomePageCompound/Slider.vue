<template>
    <div >
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/55c3a967-041b-4fe7-8f19-a2470506c6ae.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</template>

<style scoped>
.carousel {
    position: relative;
    z-index: 500 !important; /* Lower than header and dropdown */
}
.container {
    overflow: visible !important;
}

.carousel-inner {
    overflow: visible !important;
}
</style>