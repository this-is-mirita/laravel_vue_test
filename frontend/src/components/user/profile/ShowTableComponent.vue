<script setup>
defineProps({ article: Object });
const emit = defineEmits(['edit']);
</script>

<template>
    <td>{{ article.id }}</td>
    <td>{{ article.preview_image }}</td>
    <td>{{ article.title }}</td>
    <td>{{ article.text }}</td>
    <td>{{ article.created_at }}</td>
    <td colspan="2">
        <button @click="emit('edit', article.id)" class="btn btn-white btn-sm shadow-sm">
            ✏️
        </button>
    </td>
</template>
