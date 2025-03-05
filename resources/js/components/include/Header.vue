<template>
    <div class="px-4 py-2 flex-between header-border">
        <!-- <h1 class="header">
            Welcome Back <span class="s-text">Christopher</span>
        </h1> -->
        <div class="flex-between">
            <div class="d-flex gap-3">
                
                <img :src="profile.profile" class="profile" alt="" v-if="profile.profile">
                <img src="/svg/user.jpg" class="profile" alt="" v-else>
                <div class="" style="margin-top: 17px;">
                    <p class="text mb-0" style="color: white;" v-if="profile">{{profile.first_name}} {{profile.last_name}}</p>
                    <p class="s-text" style="color: white;" v-if="profile">{{profile.role}}</p>
                </div>
            </div>
        </div>  
        <div class="search-container">
            <input type="search" id="search-input" class="form-control ds-input" placeholder="Search..."
                autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false"
                aria-owns="autocomplete-listbox" dir="auto">
            <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
    </div>
</template>
<script>
import { mapActions, mapState } from 'vuex';
export default {
    methods: {
        ...mapActions('auth', ['fetchloginUser']),
    },

    computed: {
        ...mapState('auth', ['profile', 'profileLoading'])
    },

    mounted() {
        this.fetchloginUser();
    }
}
</script>
<style>
.header-border{
    border: 2px solid #8b918f;
    border-left: none;
}
.flex-between {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: var(--pBackground);
}

.profile {
    width: 41px;    
    border-radius: 50%;
    height: 40px;
    margin-top: 17px;
}

.search-container {
    position: relative;
    width: 35%;
}

#search-input {
    padding-left: 50px;
    background: #1d2630;
    border: 2px solid #5d6e78;
    box-shadow: none;
    color: black !important;
}

#search-input::placeholder {
    color: white;
    font-size: 14px;
}

.search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #888;
}
</style>