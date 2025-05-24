<script setup>

</script>

<template>
<div>
    <ul class="d-flex gap-3 my-3 p-0" style="list-style:none;">
        <router-link to="/user/article/create" class="nav-link">Создать пост</router-link>
        <router-link to="/user/article/" class="nav-link">Мои посты</router-link>
    </ul>

</div>
</template>

<style scoped lang="scss">
ul {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 15px;
    margin: 20px 0;
}

.nav-link {
    color: #42b983 !important;
    font-weight: 600;
    border: 2px solid #42b983;
    border-radius: 0.375rem;
    padding: 0.375rem 1rem;
    transition: background-color 0.3s ease, color 0.3s ease;

    &:hover {
        background-color: #42b983;
        color: white !important;
        text-decoration: none;
    }

    &.router-link-exact-active {
        background-color: #42b983;
        color: white !important;
    }
}

</style>
