import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
    state: () => ({
        user: JSON.parse(localStorage.getItem('user')) || null,
        isAuthenticated: Boolean(localStorage.getItem('user')), // t/f
    }),
    actions: {
        setUser(userData) {
            this.user = userData;
            localStorage.setItem('user', JSON.stringify(userData));
            this.isAuthenticated = true;
        },
        clearUser() {
            this.user = null;
            localStorage.removeItem('user');
            this.isAuthenticated = false;

            // Правильно удаляем XSRF-Токен
            document.cookie = 'XSRF-TOKEN=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
    }
});
