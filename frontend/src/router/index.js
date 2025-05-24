import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue';
import RegisterComponent from "@/components/RegisterComponent.vue";
import LoginComponent from "@/components/LoginComponent.vue";

import UserComponent from "@/components/user/UserComponent.vue";
import ArticleUserView from "@/components/user/ArticleUserView.vue";
import ArticleCreateComponent from "@/components/user/ArticleCreateComponent.vue";


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {path: '/', name: 'article', component: Home},

        {path: '/register', name: 'register', component: RegisterComponent},
        {path: '/login', name: 'login', component: LoginComponent},
        {path: '/logout', name: 'logout'}, // middleware

        {path: '/user', name: 'user', component: UserComponent}, // middleware

        {path: '/user/article', name: 'userArticle', component: ArticleUserView}, // middleware
        {path: '/user/article/create', name: 'userCreateArticle', component: ArticleCreateComponent}, // middleware
    ],
})

export default router
