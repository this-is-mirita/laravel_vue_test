<script setup>
import {ref, onMounted, computed} from 'vue'
import axios from "axios";
import {useUserStore} from "@/stores/useUserStore.js";
import router from "@/router/index.js";
const BASE_URL = 'http://localhost:8000';
const isLoggedIn = computed(() => useUserStore.isAuthenticated);
// console.log(isLoggedIn.value); // фолс и идёт переадресация
if (isLoggedIn.value) {
    console.log('redirect / ');
} else {
    router.push('/login');
}
// onMounted(async () => {
//     const token = localStorage.getItem('token') || '';
//     const user_id = userStore.user.id;
//
//     try {
//         const response = await axios.get(`${BASE_URL}/users/${user_id}`, {
//             headers: {
//                 'Authorization': `Bearer ${token}`
//             }
//         });
//
//         userInfo.value = response.data;
//         console.log(userInfo.value);
//     } catch (err) {
//         console.error(err);
//     }
// })

const user = ref({
    name: '123',
    email: '123@example.com',
    password: '123',
    created_at: '2025-01-15',
})
</script>

<template>
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Профиль пользователя</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Имя</th>
                    <td>{{ user.name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ user.email }}</td>
                </tr>
                <tr>
                    <th>Пароль</th>
                    <td>{{ user.password }}</td>
                </tr>
                <tr>
                    <th>Дата регистрации</th>
                    <td>{{ user.created_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
