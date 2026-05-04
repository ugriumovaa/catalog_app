<script setup>
import AppLayout from '../Layouts/AppLayout.vue'
import ProductCard from '../Components/Product/ProductCard.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

defineProps({ product: Object })
</script>

<template>
    <div class="max-w-3xl mx-auto">
        <Link href="/">
            <el-button> Back to products</el-button>
        </Link>
        <div class=" mt-4">
            <ProductCard
                :product="product"
                :show-actions="false"
            />
        </div>
    </div>
</template>
