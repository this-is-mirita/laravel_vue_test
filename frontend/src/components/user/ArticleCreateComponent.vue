<script setup>
import { ref } from 'vue'
import axios from 'axios'

const title = ref('')
const text = ref('')
const preview_image = ref(null)

async function createPost() {

    try {
        const user_id = JSON.parse(localStorage.getItem('user'))?.id || ''
        const token = JSON.parse(localStorage.getItem('user'))?.token || ''
        // 2. Готовим данные
        const formData = new FormData()
        formData.append('title', title.value)

        formData.append('text', text.value)
        formData.append('user_id', user_id)

        if (preview_image.value) {
            formData.append('preview_image', preview_image.value)
        }
        const BASE_URL = 'http://localhost:8000'

        await axios.post(`${BASE_URL}/api/article/create`, formData, {
            headers: {
                Accept: 'application/json',
                'Content-Type': 'multipart/form-data',
            },
        })



    } catch (error) {
        console.error('Ошибка создания статьи:', {
            status: error.response?.status,
            data: error.response?.data,
            message: error.message
        })
    }

}

function preview_image_fn(e) {
    const file = e.target.files[0]
    preview_image.value = file
    const previewUrl = URL.createObjectURL(file)
    console.log('Временная ссылка:', previewUrl)
}
</script>



<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2 mt-4">
                <ul class="d-flex gap-3 my-3 p-0" style="list-style:none;">
                    <router-link to="/user" class="nav-link">Назад</router-link>
                </ul>
            </div>
            <div class="col-9">
                <h2 class="text-success mb-4">Создание статьи</h2>
                <div class="mb-3">
                    <label for="title" class="form-label text-success">Заголовок</label>
                    <input type="text" v-model="title" class="form-control border-success"
                           id="title">
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label text-success">Текст статьи</label>
                    <textarea v-model="text" class="form-control border-success" id="text"
                              rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="preview_image" class="form-label text-success">Превью
                        изображение</label>
                    <input type="file" @change="preview_image_fn" class="form-control border-success" id="preview_image"
                           >
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
