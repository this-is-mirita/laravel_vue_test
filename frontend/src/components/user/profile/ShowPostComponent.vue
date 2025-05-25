<script setup>
defineProps({
    articles: Array
});

function formatDate(dateString) {
    return new Date(dateString).toLocaleString("ru-RU")
}

const BASE_URL = 'http://localhost:8000';
</script>


<template>
    <div class="mt-4">
        <h3 class="text-success mb-4">Мои посты</h3>
        <div class="container mt-5">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Фото</th>
                    <th scope="col">Название</th>
                    <th scope="col">Текст</th>
                    <th scope="col">Дата публикации</th>
                    <th scope="col">ID автора</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="article in articles" :key="article.id">
                    <td>
                        <img class="img-thumbnail" :src="`${BASE_URL}/storage/${article.preview_image}`" alt="image" style="width: 100px;" />
                    </td>
                    <td>{{ article.title }}</td>
                    <td>{{ article.text }}</td>
                    <td>{{ formatDate(article.created_at) }}</td>
                    <td>{{ article.owner_id }}</td>
                    <td>
                        <router-link :to="{ name: 'ArticleEditPageView.vue', params: { id: article.id } }" class="btn btn-outline-primary">
                            Редактировать
                        </router-link>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
</template>

<style scoped lang="scss">

</style>
