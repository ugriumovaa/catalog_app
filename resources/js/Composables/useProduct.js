import { ref } from 'vue'
import api from './useApi'

export function useProduct() {
    const products = ref([])
    const meta = ref(null)
    const loading = ref(false)

    const fetchProducts = async (params = {}) => {
        loading.value = true
        try {
            const { data } = await api.get('/products', { params })
            products.value = data.data
            meta.value = data.meta
        } finally {
            loading.value = false
        }
    }

    const getProduct = async (id) => {
        const { data } = await api.get(`/products/${id}`)
        return data.data
    }

    const createProduct = (payload) => {
        return api.post('/products', payload)
    }

    const updateProduct = (id, payload) => {
        return api.patch(`/products/${id}`, payload)
    }

    const deleteProduct = (id) => {
        console.log(localStorage.getItem('token'))

        return api.delete(`/products/${id}`)
    }

    return {
        products,
        meta,
        loading,
        fetchProducts,
        getProduct,
        createProduct,
        updateProduct,
        deleteProduct,
    }
}
