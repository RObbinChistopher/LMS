<template>
    <div class="row">
        <div class="col-md-3 p-0 col-lg-3 col-xl-2" v-if="showSlideBar">
            <Sidebar class="desktop-logo" />
        </div>
        <div :class="{
            'col-md-9': showSlideBar,
            'col-lg-9': showSlideBar,
            'col-xl-10': showSlideBar,
            'col-sm-12': showSlideBar,
            'col-10': !showSlideBar,
            'p-0': true,
            'sroller': true,
            'col-12': true
        }" :style="(showHeader && showSlideBar) ? { backgroundColor: '#e5e3e359' } : {}">

            <Header v-if="showHeader" />
            <WebsiteHeader v-if="showWebsiteHeader" />
            <main>
                <router-view></router-view>
            </main>
            <WebsiteFooter v-if="showWebsiteFooter" />
        </div>
    </div>
</template>


<script>
import Header from './include/Header.vue';
import Sidebar from './include/sidebar.vue';
import WebsiteHeader from '../website/include/Header.vue'
import WebsiteFooter from '../website/include/Footer.vue'
export default {
    components: {
        Header,
        Sidebar,
        WebsiteHeader,
        WebsiteFooter,
    },

    computed: {
        showWebsiteHeader() {
            return this.$route.meta.WebsiteHeader !== false; // Correct key reference
        },
        showWebsiteFooter() {
            return this.$route.meta.WebsiteFooter !== false; // Correct key reference
        },
        showHeader() {
            return this.$route.meta.showHeader !== false;
        },
        showSlideBar() {
            return this.$route.meta.showSlideBar !== false;
        },
        computedColClass() {
            if (this.showSlideBar) {
                return 'col-md-10 p-0 sroller';
            }
            return 'col-12 p-0 sroller';
        }
    }
}
</script>

<style scoped>
.row {
    width: 100%;
    margin: 0;
}

.sroller {
    max-height: 100vh;
    overflow-y: auto;
    background-color: var(--sBackground);
}

@media (max-width: 767px) {
    .desktop-logo {
        display: none !important;
    }

    #main-content-col {
        width: 100%;
        padding: 0 !important;
    }

    .extra-class-container {
        padding: 0 10px !important;
    }

    .main-container {
        margin: auto 2rem !important;
    }
}
</style>
