<template>
    <div class="MiancontainerContent">
        <div class="flex-betweens p-3">
            <router-link to="/"><img src="/images/logo.png" alt="" style="width: 12%;"></router-link>
            <router-link to="/cart" style="color: #361d67; text-decoration: none;" class="mb-0 mt-2">Cancel</router-link>
        </div>
    </div>
</template>

<style scoped>
.flex-betweens {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.MiancontainerContent {
    background-color: none;
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    z-index: 9999;
}
</style>