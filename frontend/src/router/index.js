import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue';
import RegisterComponent from "@/components/RegisterComponent.vue";
import LoginComponent from "@/components/LoginComponent.vue";
import ArticleCreateComponent from "@/components/ArticleCreateComponent.vue";
import ArticleSinglePageView from "@/components/ArticleSinglePageView.vue";
import ArticleEdit from "@/components/ArticleEdit.vue";


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {path: '/', name: 'home', component: Home},
        {path: '/user', name: 'user', component: Home},
        {path: '/register', name: 'register', component: RegisterComponent},
        {path: '/login', name: 'login', component: LoginComponent},
        {path: '/logout', name: 'logout'},
        {path: '/articles/create', name: 'article-create', component: ArticleCreateComponent},
        {path: '/articles/:id', name: 'article-view', component: ArticleSinglePageView},
        {path: '/articles/:id/edit', name: 'article-edit', component: ArticleEdit},


    ],
})

export default router
