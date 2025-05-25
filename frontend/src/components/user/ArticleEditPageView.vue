<script setup>
import axios from "axios";
import { useRoute } from "vue-router";
import { onMounted, ref } from "vue";
import router from "@/router";

const route = useRoute();
const page_id = route.params.id;
const BASE_URL = 'http://localhost:8000';

const page = ref({});
const previewImage = ref(null);

onMounted(async () => {
    try {
        const response = await axios.get(`${BASE_URL}/api/article/${page_id}`);
        page.value = response.data.page;
    } catch (error) {
        console.error(error);
    }
});

async function editPosts() {
    try {
        const user = JSON.parse(localStorage.getItem('user'));
        const token = user?.token;
        const userId = user?.id;

        const formData = new FormData();
        formData.append('title', page.value.title);
        formData.append('text', page.value.text);
        formData.append('user_id', userId);

        if (previewImage.value) {
            formData.append('preview_image', previewImage.value);
        }

        await axios.post(`${BASE_URL}/api/article/edit`, formData, {
            headers: {
                Authorization: `Bearer ${token}`,
                'Content-Type': 'multipart/form-data',
            },
        });

        alert('Статья успешно обновлена');
        router.push('/user/article/');
    } catch (error) {
        console.error('Ошибка при редактировании:', error?.response?.data?.message || error.message);
        alert(`Ошибка: ${error?.response?.data?.message || error.message}`);
    }
}

function handlePreviewImageChange(event) {
    const file = event.target.files[0];
    previewImage.value = file;
}
</script>


<template>
    <div class="row">
        <!-- Левая часть: форма -->
        <div class="col-md-6">
            <div class="container py-4">
                <h2 class="text-center mb-4">Редактировать статью</h2>
                <router-link to="/user/article/">Назад</router-link>
                <div v-if="page.id">
                    <form @submit.prevent="editPosts">
                        <div class="mb-3">
                            <label class="form-label">Название</label>
                            <input type="text" class="form-control" v-model="page.title" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Текст</label>
                            <textarea class="form-control" rows="5" v-model="page.text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Изображение (preview_image)</label>
                            <input type="file" class="form-control" @change="handlePreviewImageChange" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата создания</label>
                            <input type="text" class="form-control" v-model="page.created_at" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Owner ID</label>
                            <input type="text" class="form-control" v-model="page.owner_id" readonly />
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Сохранить</button>
                    </form>
                </div>
                <div v-else class="alert alert-info text-center mt-3">
                    Загрузка данных...
                </div>
            </div>
        </div>

        <!-- Правая часть: предпросмотр -->
        <div class="col-md-6">
            <div class="container py-4">
                <h2 class="text-center mb-4">Предпросмотр</h2>
                <div v-if="page.id" class="card">
                    <img
                        class="card-img-top"
                        :src="previewImage ? URL.createObjectURL(previewImage) : `${BASE_URL}/storage/${page.preview_image}`"
                        alt="image"
                    />
                    <div class="card-body">
                        <h3 class="card-title">{{ page.title }}</h3>
                        <p class="card-text">{{ page.text }}</p>
                        <p class="card-text"><strong>Дата создания:</strong> {{ page.created_at }}</p>
                        <p class="card-text"><strong>Owner ID:</strong> {{ page.owner_id }}</p>
                    </div>
                </div>
                <div v-else class="alert alert-info text-center">Загрузка данных...</div>
            </div>
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
