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
    const userStore = useUserStore() // получили методы
    try {
        //  CSRF cookie
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
                    'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'), // именно 'XSRF-TOKEN', без 'X-' в имени куки
                },
                withCredentials: true
            }).then(response => {
                const user = response.data.user
                const token = response.data.token

                userStore.setUser({ ...user, token }) // юзер и токен
                toast.success('Авторизация успешна')
                router.push('/')
            }
        );
    } catch (error) {
        console.log(error);
        toast.error('Авторизация не удалась')
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
        <div class="login-form">
            <h2>Вход</h2>

            <div class="input__item">
                <input v-model="email" class="input-2" type="email" placeholder="Введите email"/>
                <svg width="23" height="24" viewBox="0 0 23 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.05894 18.6523L4.91627 14.7943L9.40834 19.2864L5.55033 20.1437C4.65721 20.3422 3.86047 19.5454 4.05894 18.6523ZM10.6427 18.3994L5.80324 13.56L15.2471 4.11612C15.7352 3.62796 16.5267 3.62796 17.0149 4.11612L18.5507 5.65196L20.0865 7.1878C20.5747 7.67595 20.5747 8.46741 20.0865 8.95556L10.6427 18.3994Z"
                        stroke="#A4AEB7" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="input__item">
                <input v-model="password" class="input-2" type="password"
                       placeholder="Введите пароль"/>
                <svg width="23" height="24" viewBox="0 0 23 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.05894 18.6523L4.91627 14.7943L9.40834 19.2864L5.55033 20.1437C4.65721 20.3422 3.86047 19.5454 4.05894 18.6523ZM10.6427 18.3994L5.80324 13.56L15.2471 4.11612C15.7352 3.62796 16.5267 3.62796 17.0149 4.11612L18.5507 5.65196L20.0865 7.1878C20.5747 7.67595 20.5747 8.46741 20.0865 8.95556L10.6427 18.3994Z"
                        stroke="#A4AEB7" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            <div>
                marina11@mail.ru <br>
                12345678910
            </div>
            <button @click.prevent="loginUser" type="submit" class="submit-btn">Войти</button>
        </div>
    </div>
</template>


<style scoped lang="scss">
.login-page {
    display: flex;
    align-items: center;
    justify-content: center;
    //height: 100vh;  // чтобы центр был по высоте всего экрана
    padding: 20px;  // небольшой отступ со всех сторон на мобильных
}

.login-form {
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    width: 600px;        // чуть уже, чтобы не слишком растягивалась
    box-sizing: border-box;

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }
}

.input__item {
    position: relative;
    margin-bottom: 20px;

    svg {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }
}

.input-2 {
    width: 100%;
    padding: 10px 15px 10px 15px;
    height: 45px;
    font-size: 16px;
    color: #333;
    border-radius: 6px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;

    &::placeholder {
        color: #aaa;
    }
}

.submit-btn {
    width: 100%;
    padding: 14px;
    background-color: #42b983;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;

    &:hover {
        background-color: #3a513f;
    }
}

</style>
