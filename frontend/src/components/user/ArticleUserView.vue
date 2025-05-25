<script setup>
    import axios from "axios";
    import {onMounted, ref} from "vue";
    const articleUser = ref()
    onMounted( async () =>{
        const BASE_URL = 'http://localhost:8000';
        //  CSRF cookie
        const token =JSON.parse(localStorage.getItem('user')).token
        const response = await axios.get(`${BASE_URL}/api/user/article/`, {
            headers: {
                Accept: 'application/json',
                Authorization: `Bearer ${token}`,
            },
        });
        articleUser.value = response.data.article;
    });
    function formatDate(dateString) {
        return new Date(dateString).toLocaleString("ru-RU")
    }
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-2 mt-4">
                <ul class="d-flex gap-3 my-3 p-0" style="list-style:none;">
                    <router-link to="/user" class="nav-link">Назад</router-link>
                </ul>
            </div>
            <div class="col-10">
                <div class="mt-4">
                    <h3 class="text-success mb-4">Мои посты</h3>

                    <div class="accordion" id="postsAccordion">
                        <div class="accordion-item mt-3" v-for="article in articleUser" :key="article.id">
                            <h2 class="accordion-header" :id="'heading' + article.id">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        :data-bs-target="'#collapse' + article.id"
                                        aria-expanded="false"
                                        :aria-controls="'collapse' + article.id">
                                    {{ article.title }}
                                </button>
                            </h2>
                            <div :id="'collapse' + article.id"
                                 class="accordion-collapse collapse"
                                 :aria-labelledby="'heading' + article.id"
                                 data-bs-parent="#postsAccordion">
                                <div class="accordion-body">
                                    <p><strong>Текст:</strong> {{ article.text }}</p>
                                    <p><strong>Дата:</strong> {{ formatDate(article.created_at) }}</p>
                                    <p><strong>ID автора:</strong> {{ article.owner_id }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<style scoped>
.accordion-button {
    background-color: #e6f9eb; /* светло-зеленый */
    color: #155724;
    font-weight: 500;
}
.accordion-body {
    background-color: #f8fffa;
}
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
