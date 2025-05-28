<script setup>
import { ref } from 'vue';
import axios from "axios";

const props = defineProps({
    article: Object,
    baseUrl: { type: String, default: 'http://localhost:8000' }
});

const emit = defineEmits(['save', 'cancel']);

const editedArticle = ref({ ...props.article });
const isLoading = ref(false);

const saveChanges = async () => {
    isLoading.value = true;
    try {
        const token = JSON.parse(localStorage.getItem('user')).token;
        await axios.post(
            `${props.baseUrl}/api/article/edit/${editedArticle.value.id}`,
            editedArticle.value,
            {
                headers: {
                    Authorization: `Bearer ${token}`,
                }
            }
        );
        emit('save', editedArticle.value);
    } catch (error) {
        console.error(error);
    } finally {
        isLoading.value = false;
    }
};
const BASE_URL = 'http://localhost:8000';
</script>

<template>
    <td>{{ editedArticle.id }}</td>
    <td>
        <img class="img-fluid" :src="`${BASE_URL}/storage/${article.preview_image}`" alt="image"/>
    </td>
    <td><input v-model="editedArticle.title" class="form-control form-control-sm shadow-sm" /></td>
    <td><input v-model="editedArticle.text" class="form-control form-control-sm shadow-sm" /></td>
    <td colspan="2">
        <button @click="saveChanges" class="btn btn-white btn-sm shadow-sm" :disabled="isLoading">
            <span v-if="isLoading" class="spinner-border spinner-border-sm"></span>
            <span v-else>✅</span>
        </button>
        <button @click="$emit('cancel')" class="btn btn-white btn-sm shadow-sm ms-2">
            ✖️
        </button>
    </td>
</template>

<style scoped>
.spinner-border {
    display: inline-block;
    width: 1rem;
    height: 1rem;
    vertical-align: text-bottom;
    border: 0.15em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    animation: spinner-border .75s linear infinite;
}
</style>
