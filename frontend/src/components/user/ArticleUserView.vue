<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import StartPostComponent from "@/components/user/profile/StartPostComponent.vue";

const articleUser = ref([]);
const BASE_URL = 'http://localhost:8000';

const fetchArticles = async () => {
    const token = JSON.parse(localStorage.getItem('user')).token;
    const response = await axios.get(`${BASE_URL}/api/user/article/`, {
        headers: {
            Accept: 'application/json',
            Authorization: `Bearer ${token}`,
        },
    });
    articleUser.value = response.data.article;
};

const handleUpdate = (updatedArticle) => {
    const index = articleUser.value.findIndex(a => a.id === updatedArticle.id);
    if (index !== -1) {
        articleUser.value[index] = updatedArticle;
    }
};

onMounted(fetchArticles);
</script>

<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 mt-4">
                <ul class="d-flex gap-3 my-3 p-0" style="list-style:none;">
                    <router-link to="/user" class="nav-link">Назад</router-link>
                </ul>
            </div>
            <div class="col-11">
                <start-post-component
                    :articles="articleUser"
                    @update="handleUpdate"
                />
            </div>
        </div>
    </div>
</template>

