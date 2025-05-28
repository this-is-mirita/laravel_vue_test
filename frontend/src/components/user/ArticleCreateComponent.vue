<script setup>
import {computed, ref} from 'vue';
import axios from 'axios';
import router from "@/router/index.js";
import {useUserStore} from "@/stores/useUserStore.js";
const isLoggedIn = computed(() => useUserStore.isAuthenticated);
// console.log(isLoggedIn.value); // фолс и идёт переадресация
if (isLoggedIn.value) {
    console.log('redirect / ');
} else {
    router.push('/login');
}


const title = ref('');
const text = ref('');
const previewImage = ref(null); // переименовал переменную для единообразия

async function createPost() {
    try {
        const userId = JSON.parse(localStorage.getItem('user'))?.id || '';
        const token = JSON.parse(localStorage.getItem('user'))?.token || ''; // добавляем токен обратно

        if (!title.value) {
            alert('Введите текст!');
            return;
        }
        if (!text.value) {
            alert('Введите текст!');
            return;
        }
        if (!previewImage.value) {
            alert('Выберите превью-изображение!');
            return;
        }

        const formData = new FormData();
        formData.append('title', title.value);
        formData.append('text', text.value);
        formData.append('user_id', userId);
        formData.append('preview_image', previewImage.value);

        const BASE_URL = 'http://localhost:8000';

        await axios.post(
            `${BASE_URL}/api/article/create`,
            formData,
            {
                headers: {
                    'Authorization': `Bearer ${token}`, // включаем токен в запрос
                    'Content-Type': 'multipart/form-data',
                },
            }
        );

        alert('Статья успешно создана!');
        router.push('/user/article/')

    } catch (error) {
        console.error('Ошибка при создании поста:', error.response.data.message);
        alert(`Ошибка: ${error.response.data.message}`);
    }
}
function handlePreviewImageChange(event) {
    const file = event.target.files[0];
    previewImage.value = file;
    const previewUrl = URL.createObjectURL(file);
}
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2 mt-4">
                <ul class="d-flex gap-3 my-3 p-0" style="list-style: none;">
                    <router-link to="/user" class="nav-link">Назад</router-link>
                </ul>
            </div>
            <div class="col-9">
                <h2 class="text-success mb-4">Создание статьи</h2>
                <div class="mb-3">
                    <label for="title" class="form-label text-success">Заголовок</label>
                    <input type="text" v-model="title" class="form-control border-success" id="title">
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label text-success">Текст статьи</label>
                    <textarea v-model="text" class="form-control border-success" id="text" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="preview-image" class="form-label text-success">Превью изображение</label>
                    <input type="file" @change="handlePreviewImageChange" class="form-control border-success" id="preview-image">
                </div>

                <button @click.prevent="createPost()" type="submit" class="btn btn-success">
                    Создать
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
form input,
form textarea {
    background-color: #f4fff7;
    color: #155724;
}

form input:focus,
form textarea:focus {
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
}

.nav-link {
    color: #42b983 !important;
    font-weight: 600;
    border: 2px solid #42b983;
    border-radius: 0.375rem;
    padding: 0.375rem 1rem;
    transition: background-color 0.3s ease, color 0.3s ease;

    &:hover {
        background-color: #42b983;
        color: white !important;
        text-decoration: none;
    }

    &.router-link-exact-active {
        background-color: #42b983;
        color: white !important;
    }
}
</style>
