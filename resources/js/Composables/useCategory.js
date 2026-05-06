import { ref } from 'vue'
import api from './useApi'

export function useCategory() {
    const categories = ref([])

    const fetchCategories = async () => {
        const { data } = await api.get('/categories')
        categories.value = data.data
    }

    return { categories, fetchCategories }
}
