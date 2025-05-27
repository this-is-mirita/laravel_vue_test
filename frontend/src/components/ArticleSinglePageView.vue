<script setup>
import axios from "axios";
import {useRoute} from "vue-router"; //  useRoute
import {onMounted, ref} from "vue";

const route = useRoute(); //  текущий маршрут
const page_id = route.params.id;
const page = ref({}); // Референс для хранения данных статьи

// Ждем окончания монтирования компонента, чтобы гарантировать наличие ID
onMounted(async () => {
    try {
        const response = await axios.get(`http://localhost:8000/api/article/${page_id}`);
        //console.log(response.data.page);
        page.value = response.data.page; // присваиваем данные после успешного запроса
    } catch (error) {
        console.error(error);
    }
});

console.log(page.value);
</script>

<template>
    <div class="container py-5">
        <h1 class="display-4 text-center mb-4">Просмотр статьи ID: {{ page_id }}</h1>
        <div v-if="page.id" class="card shadow-lg rounded">
            <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between">
                <h5 class="mb-0"><strong>ID статьи:</strong> {{ page.id }}</h5>
                <small class="text-muted">Опубликована: {{ page.created_at }}</small>
            </div>
            <div class="card-body">
                <h4 class="card-title text-dark"><strong>Название статьи:</strong> {{ page.title }}</h4>
                <p class="card-text lead fw-lighter">
                    <strong>Краткое содержание:</strong> {{ page.text }}
                </p>
            </div>
            <router-link to="/">назад</router-link>
        </div>
        <div v-else class="alert alert-info text-center" role="alert">
            Идёт загрузка...
        </div>
    </div>
</template>


<style scoped lang="scss">
.container {
    max-width: 800px;
    margin-top: 40px;
}

.card {
    border: none;
    overflow: hidden;
    background-color: #fafafa;
    transition: all 0.3s cubic-bezier(.25,.8,.25,1);

    &:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.1), 0 10px 10px rgba(0,0,0,0.1);
    }

    .card-header {
        font-size: 18px;
        line-height: 1.4;
    }

    .card-title {
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .card-text {
        font-size: 16px;
        color: #666;
    }
}

.alert {
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

</style>
