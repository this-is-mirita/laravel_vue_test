<script setup>
import axios from "axios";
import {useRoute} from "vue-router"; //  useRoute
import {onMounted, ref} from "vue";

const route = useRoute(); //  текущий маршрут
const page_id = route.params.id;
const page = ref({}); // Референс для хранения данных статьи
const BASE_URL = 'http://localhost:8000';

// Ждем окончания монтирования компонента, чтобы гарантировать наличие ID
onMounted(async () => {
    try {
        const response = await axios.get(`http://localhost:8000/api/article/${page_id}`);
        //console.log(response.data.page);
        page.value = response.data.page; // присваиваем данные после успешного запроса
    } catch (error) {
        //console.error(error);
    }
});

console.log(page.value);
</script>

<template>
    <div class="container py-5 d-flex justify-content-center align-items-center w-50">
        <div v-if="page.id" class="card article-card shadow-lg">
            <img
                class="card-img-top"
                :src="`${BASE_URL}/storage/${page.preview_image}`"
                alt="Preview image"
            />
            <div class="card-body text-center">
                <h3 class="card-title text-success">{{ page.title }}</h3>
                <p class="card-text">{{ page.text }}</p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                <small>ID: {{ page.id }}</small>
                <small>Дата: {{ page.created_at }}</small>
            </div>
            <router-link to="/" class="btn btn-outline-success m-3">← Назад</router-link>
        </div>
        <div v-else class="alert alert-info text-center w-100" role="alert">
            Идёт загрузка...
        </div>
    </div>
</template>



<style scoped lang="scss">

</style>
