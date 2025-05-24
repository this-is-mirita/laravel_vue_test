import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
    state: () => ({
        user: JSON.parse(localStorage.getItem('user')) || null
    }),
    actions: {
        setUser(userData) {
            this.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
        },
        clearUser() {
            this.user = null
            localStorage.removeItem('user')

            // Важно добавить очистку кук Sanctum (минимальное добавление)
            document.cookie = 'XSRF-TOKEN=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;'
        }
    }
})
