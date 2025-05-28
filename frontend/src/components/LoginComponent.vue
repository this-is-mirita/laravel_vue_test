<!-- src/components/LoginComponent.vue -->
<script setup>
import {ref} from "vue";
import axios from "axios";
import {useToast} from "vue-toastification";
import router from "@/router/index.js";
import {useUserStore} from "@/stores/useUserStore.js";

axios.defaults.withCredentials = true;
const toast = useToast()

const email = ref('')
const password = ref('')

const BASE_URL = 'http://localhost:8000';

async function loginUser() {
    const userStore = useUserStore() // получили
    try {
        //  CSRF
        await axios.get(`${BASE_URL}/sanctum/csrf-cookie`, {withCredentials: true});
        //  логин
        const response = await axios.post(`${BASE_URL}/api/login`,
            {
                email: email.value,
                password: password.value,
            }
            , {
                headers: {
                    accept: 'application/json',
                    'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
                },
                withCredentials: true
            }).then(response => {
                const user = response.data.user
                const token = response.data.token

                userStore.setUser({...user, token}) // юзер и токен
                toast.success('Авторизация успешна')
                router.push('/')
            }
        );
    } catch (error) {
        // const errEmail = error.response.data.errors.email
        // const errPassword = error.response.data.errors.password
        // toast.error(
        //     `email : ${ errEmail } `,
        // )
        // toast.error(
        //     `пароль : ${ errPassword } `,
        // )
        console.log(error);
    }
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) {
        return decodeURIComponent(parts.pop().split(';').shift());
    }
    return null;
}

</script>
<template>
    <div class="login-page">
        <div class="register-form col-md-6 offset-md-3 mt-5">
            <h2 class="text-center mb-4">Вход</h2>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email:</label>
                <div class="position-relative">
                    <input id="emailInput" v-model="email" type="email"
                           class="form-control custom-focus" placeholder="Введите email"/>
                    <svg class="icon-svg position-absolute end-0 top-50 translate-middle-y me-3"
                         width="23" height="24" viewBox="0 0 23 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.05894 18.6523L4.91627 14.7943L9.40834 19.2864L5.55033 20.1437C4.65721 20.3422 3.86047 19.5454 4.05894 18.6523ZM10.6427 18.3994L5.80324 13.56L15.2471 4.11612C15.7352 3.62796 16.5267 3.62796 17.0149 4.11612L18.5507 5.65196L20.0865 7.1878C20.5747 7.67595 20.5747 8.46741 20.0865 8.95556L10.6427 18.3994Z"
                            stroke="#A4AEB7" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Пароль:</label>
                <div class="position-relative">
                    <input id="passwordInput" v-model="password" type="password"
                           class="form-control custom-focus" placeholder="Введите пароль"/>
                    <svg class="icon-svg position-absolute end-0 top-50 translate-middle-y me-3"
                         width="23" height="24" viewBox="0 0 23 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.05894 18.6523L4.91627 14.7943L9.40834 19.2864L5.55033 20.1437C4.65721 20.3422 3.86047 19.5454 4.05894 18.6523ZM10.6427 18.3994L5.80324 13.56L15.2471 4.11612C15.7352 3.62796 16.5267 3.62796 17.0149 4.11612L18.5507 5.65196L20.0865 7.1878C20.5747 7.67595 20.5747 8.46741 20.0865 8.95556L10.6427 18.3994Z"
                            stroke="#A4AEB7" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <button @click.prevent="loginUser" type="submit" class="submit-btn">Войти</button>
        </div>
        asdasdasd@mail.com <br>
        asdasdasd@mail.com
    </div>
</template>

<style scoped lang="scss">
.login-page {
    align-items: center;
    justify-content: center;
    min-height: 50vh;

}

.register-form {
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .custom-focus:focus {
        outline: none; /* Отменяем стандартную сине-голубую рамку */
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(66, 185, 131, 0.6); /* Зеленый фокус */
        border-color: #42b983; /* Зеленая граница */
    }

    .form-control {
        background-color: #f9f9f9;
        border-color: #ccc;
        color: #333;
        height: 45px;
    }

}

.submit-btn {
    width: 100%;
    padding: 12px;
    background-color: #42b983;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;

    &:hover {
        background-color: white;
        color: black;
    }
}
</style>


