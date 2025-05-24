<script setup>
import { ref } from 'vue'
import axios from "axios"

const title = ref('')
const text = ref('')
const image = ref()
const BASE_URL = 'http://localhost:8000'

function handleImage(e) {
    image.value = e.target.files[0]
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

                <form @submit.prevent="createPost" enctype="multipart/form-data"
                      class="bg-light p-4 rounded shadow-sm border border-success">
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
                        <label for="image" class="form-label text-success">Превью
                            изображение</label>
                        <input type="file" class="form-control border-success" id="image"
                               accept="image/*" @change="handleImage">
                    </div>

                    <button type="submit" class="btn btn-success">Создать</button>
                </form>
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
