<script setup>
import { ref, onMounted } from 'vue'
import { usePage, router } from '@inertiajs/vue3'

import AdminLayout from '../../../Layouts/AdminLayout.vue'
import ProductForm from '../../../Components/Product/ProductForm.vue'

import { useProduct } from '../../../Composables/useProduct'

defineOptions({
    layout: AdminLayout,
})

const { getProduct, updateProduct } = useProduct()

const product = ref(null)

const productId = usePage().props.id

const load = async () => {
    product.value = await getProduct(productId)
}

const submit = async (form) => {
    await updateProduct(productId, form)

    router.visit('/admin/products')
}

onMounted(async () => { await load() })
</script>

<template>
    <ProductForm
        v-if="product"
        :product="product"
        @submit="submit"
    />
</template>
