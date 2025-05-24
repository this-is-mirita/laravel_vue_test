<script setup>
import {useUserStore} from "@/stores/useUserStore.js";
import {computed} from "vue";
import router from "@/router/index.js";
import SideBarUserComponent from "@/components/user/SideBarUserComponent.vue";
import ProfileComponent from "@/components/user/ProfileComponent.vue";
const userStore = useUserStore();
const user = userStore.user;
const isLoggedIn = computed(() => userStore.isAuthenticated);
// console.log(isLoggedIn.value); // фолс и идёт переадресация
if (isLoggedIn.value) {
    console.log('user is logged in');
} else {
    router.push('/login');
}
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <side-bar-user-component/>
            </div>
            <div class="col-9">
                <profile-component/>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
