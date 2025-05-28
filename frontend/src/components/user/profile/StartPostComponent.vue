<script setup>
import EditTableComponent from "@/components/user/profile/EditTableComponent.vue";
import ShowTableComponent from "@/components/user/profile/ShowTableComponent.vue";
import { ref, watch } from 'vue';
import axios from "axios";

const BASE_URL = 'http://localhost:8000';
const props = defineProps({ articles: Array });

const editingId = ref(null);

// ❗ копия articles
const localArticles = ref([...props.articles]);
// отслеживание на обновление
watch(() => props.articles, (newVal) => {
    localArticles.value = [...newVal];
});

const startEdit = (id) => editingId.value = id;

const handleSave = (article) => {
    const index = localArticles.value.findIndex(a => a.id === article.id);
    if (index !== -1) {
        localArticles.value[index] = article;
    }
    editingId.value = null;
};

const handleDelete = async (id) => {
    try {
        await axios.delete(`${BASE_URL}/api/article/${id}`);
        localArticles.value = localArticles.value.filter(article => article.id !== id);
    } catch (error) {
        console.error('Ошибка при удалении:', error);
    }
};

</script>

<template>
    <div class="mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Фото</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th colspan="2">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="article in localArticles" :key="article.id">
                        <ShowTableComponent
                            v-if="editingId !== article.id"
                            :article="article"
                            @edit="startEdit"
                            @delete="handleDelete"
                        />
                        <EditTableComponent
                            v-else
                            :article="article"
                            @save="handleSave"
                            @cancel="editingId = null"
                        />
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
