<script setup>
import { ref, onMounted } from 'vue'

// Пример данных (замени на реальные, если получаешь с API)
const user = ref({
    name: 'Mirita',
    email: 'mirita@example.com',
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
