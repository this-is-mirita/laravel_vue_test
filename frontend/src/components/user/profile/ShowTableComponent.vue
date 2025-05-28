<script setup>
defineProps({
    article: Object,

});
const emit = defineEmits(['edit', 'delete']);
const BASE_URL = 'http://localhost:8000';


</script>

<template>
    <td>{{ article.id }}</td>
    <img class="img-fluid"
         :src="`${BASE_URL}/storage/${article.preview_image}`" alt="image"/>
    <td>{{ article.title }}</td>
    <td>{{ article.text }}</td>
    <td>
        <button @click="emit('edit', article.id)" class="btn btn-white btn-sm shadow-sm">
            ✏️
        </button>
        <button @click="emit('delete', article.id)" class="btn btn-white btn-sm shadow-sm ml-5">
            ✖️️
        </button>
    </td>
</template>
<style lang="scss" scoped>
.img-fluid {
    width: 300px;
    height: 200px;
}
</style>
