<script setup>
import {useUserStore} from "@/stores/useUserStore.js";
import axios from "axios";
import {onMounted, ref, computed} from "vue";

const store = useUserStore();
const userName = computed(() => store.user?.name ?? null);

const BASE_URL = 'http://localhost:8000';
const fetchedArticles = ref([]);
const startPageHomeVue = ref(1);
const allPageHomeVue = ref(null);
const isLoading = ref(false);

const fetchArticlesFn = async () => {

    try {
        isLoading.value = true;
        const token = JSON.parse(localStorage.getItem('user'))?.token;
        const response = await axios.get(`${BASE_URL}/api/article?page=${startPageHomeVue.value}`, {
            headers: {
                Accept: 'application/json',
                Authorization: `Bearer ${token}`,
            },
        });
        const data = response.data.article;
        fetchedArticles.value = data.data;
        startPageHomeVue.value = data.current_page;
        allPageHomeVue.value = data.last_page;
    } catch (error) {
        console.error('Ошибка:', error);
    } finally {
        isLoading.value = false;
    }
};

const nextPage = async (page) => {
    startPageHomeVue.value = page;
    await fetchArticlesFn();
};

onMounted(fetchArticlesFn);
</script>

<template>
    <div class="home-page">
        <h1 class="main-title text-center">
            {{
                userName ? `${userName}, Добро пожаловать на главную страницу!` : 'Добро пожаловать!'
            }}
        </h1>
<!--        <div v-if="isLoading" class="text-center py-5 text-success">Загрузка...</div>-->
        <div class="container">
            <div class="row row-cols-md-3 cards-wrapper">
                <div v-for="article in fetchedArticles" :key="article.id" class="mt-3 col">
                    <div class="card info-card card-hover h-100">
                        <div class="card-body">
                            <img class="img-fluid"
                                 :src="`${BASE_URL}/storage/${article.preview_image}`" alt="image"/>
                            <h3 class="card-title">{{ article.title }}</h3>
                            <p class="card-text">{{ article.text }}</p>
                            <p class="card-text">Дата создания : {{ article.created_at }}</p>
                            <p class="card-text">owner id : {{ article.owner_id }}</p>
                            <router-link
                                :to="{ name: 'ArticleSinglePageView', params: { id: article.id } }"
                                class="text-success">
                                Подробнее
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-center align-items-center">
                <ul class="pagination">
                    <li
                        v-for="page in allPageHomeVue"
                        :key="page"
                        class="page-item"
                        :class="{ active: page === startPageHomeVue }"
                    >
                        <a class="page-link" href="#" @click.prevent="nextPage(page)">{{ page }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss">
.home-page {
    padding: 40px 20px;
    min-height: 100vh;
}

.main-title {
    font-size: 32px;
    margin-bottom: 30px;
    color: #2c3e50;
}

.card-hover {
    transition: transform 0.3s ease-in-out;

    &:hover {
        transform: scale(1.05); /* увеличение размера при наведении */
    }
}

.info-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    height: 100%;

    .card-title {
        color: #42b983;
        margin-bottom: 10px;
    }

    .card-text {
        color: #555;
        font-size: 15px;
    }
}

.pagination {
    display: flex;
    justify-content: center;
    padding: 20px 0;
    gap: 8px;

    .page-item {
        list-style: none;

        .page-link {
            display: block;
            padding: 8px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            color: #42b983;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;

            &:hover {
                background-color: #42b983;
                color: #fff;
            }

            &:focus {
                box-shadow: none !important;
                outline: none !important;
            }
        }

        &.active .page-link {
            background-color: #42b983;
            color: #fff;
            font-weight: bold;
        }

    }
}

</style>


