import axios from 'axios'
import { router } from '@inertiajs/vue3'

const api = axios.create({
    baseURL: '/api',
    headers: {
        Accept: 'application/json',
    },
})

api.interceptors.request.use(config => {
    const token = localStorage.getItem('token')
    if (token) config.headers.Authorization = `Bearer ${token}`
    return config
})

api.interceptors.response.use(
    r => r,
    err => {
        if (err.response?.status === 401) {
            localStorage.removeItem('token')
            router.visit('/')
        }
        return Promise.reject(err)
    }
)

export default api
