import { ref } from 'vue'
import api from './useApi'
import { router } from '@inertiajs/vue3'

const token = ref(localStorage.getItem('token'))

export function useAuth() {
    const login = async (payload) => {
        const { data } = await api.post('/login', payload)
        token.value = data.data.token.token
        localStorage.setItem('token', data.data.token.token)

        router.visit('/admin')
    }

    const logout = async () => {
        await api.post('/logout')

        token.value = null
        localStorage.removeItem('token')

        router.visit('/')
    }

    const isAuth = () => !!token.value

    return { login, logout, isAuth, token }
}
