<script setup>
import { computed } from 'vue'
import { router } from '@inertiajs/vue3'
import ProductForm from '../../../Components/Product/ProductForm.vue'
import AppLayout from "../../../Layouts/AppLayout.vue";

const props = defineProps({
    product: Object,
    categories: Array
})
defineOptions({
    layout: AppLayout,
    message: String,
    products: Array,
    user: Object
})
const isEdit = computed(() => !!props.product)

const submit = (form) => {
    if (isEdit.value) {
        router.put(`/api/products/${props.product.id}`, form, {
            onSuccess: () => router.get('/admin/products')
        })
    } else {
        router.post('/api/products', form, {
            onSuccess: () => router.get('/admin/products')
        })
    }
}
</script>

<template>
    <ProductForm
        :product="product"
        :categories="categories"
        :is-edit="isEdit"
        @submit="submit"
    />
</template>
