<script setup>
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'

import ProductForm from '../../../Components/Product/ProductForm.vue'
import AdminLayout from "../../../Layouts/AdminLayout.vue";

import { useProduct } from '../../../Composables/useProduct'

defineOptions({
    layout: AdminLayout,
})

const { createProduct } = useProduct()

const submit = async (form) => {
    await createProduct(form)

    router.visit('/admin/products')
}
</script>

<template>
    <ProductForm
        @submit="submit"
    />
</template>
