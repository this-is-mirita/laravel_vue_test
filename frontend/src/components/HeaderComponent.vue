<script setup>
import {useToast} from "vue-toastification";
import {useUserStore} from "@/stores/useUserStore.js";
import axios from "axios";
import router from "@/router/index.js";
import {computed} from "vue";

const toast = useToast();
const userStore = useUserStore();
axios.defaults.withCredentials = true;

async function logout() {
    try {
        await axios.get('http://localhost:8000/sanctum/csrf-cookie', {
            withCredentials: true
        });

        const xsrfToken = getCookie('XSRF-TOKEN');

        // запрос на логаут
        await axios.post('http://localhost:8000/api/logout', {}, {
            headers: {
                'Accept': 'application/json',
                'X-XSRF-TOKEN': xsrfToken,
                'Authorization': `Bearer ${userStore.user?.token}`
            },
            withCredentials: true
        });

        // pinia store из локал сторедж очистка
        userStore.clearUser();
        router.push('/login');
    } catch (error) {
        console.error('Ошибка при выходе:', error);
        toast.error('Ошибка при выходе');
    }
}

// Функция для получения куки (оставьте как есть)
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) {
        return decodeURIComponent(parts.pop().split(';').shift());
    }
    return null;
}

// if else header
const isLoggedIn = computed(() => userStore.isAuthenticated);
console.log(isLoggedIn.value);
const windowLocation = router.currentRoute.value.path;
console.log(windowLocation);

function isActive(windowLocation) {
    return 'active';
}
</script>

<template>
    <header class="header bg-white shadow-sm mb-4 py-3 rounded-b-lg">
        <nav class="navbar navbar-expand-md container-fluid p-0">
            <ul class="navbar-nav mx-auto fs-5 fw-medium">
                <li class="nav-item ms-3">
                    <router-link to="/" :class="{ 'nav-link': isActive('/') }">Главная</router-link>
                </li>
                <li class="nav-item ms-3" v-if="!isLoggedIn">
                    <router-link to="/register" :class="{ 'nav-link': isActive('/register') }">
                        Регистрация
                    </router-link>
                </li>
                <li class="nav-item ms-3" v-if="!isLoggedIn">
                    <router-link to="/login" :class="{ 'nav-link': isActive('/login') } ">Вход
                    </router-link>
                </li>
                <li class="nav-item ms-3" v-if="isLoggedIn">
                    <router-link to="/user" :class="{ 'nav-link': isActive('/user') }">Личный
                        кабинет
                    </router-link>
                </li>
                <li class="nav-item ms-3" v-if="isLoggedIn">
                    <a href="#" @click.prevent="logout" class="nav-link">Выход</a>
                </li>
            </ul>
        </nav>
    </header>
</template>


<style scoped lang="scss">
.header {
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 15px 30px;
    border-radius: 0 0 12px 12px;
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.nav {
    display: flex;
    gap: 20px;
}

.nav-link {
    position: relative;
    text-decoration: none;
    font-size: 16px;
    color: #42b983;
    font-weight: 500;
    transition: color 0.3s;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #42b983;
    transition: width 0.3s ease;
}

.nav-link:hover {
    color: #2f4535;
    background-color: transparent !important; /* Убираем фоновый цвет */
}

.nav-link:hover::after {
    width: 100%;
}

</style>
