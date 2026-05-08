<script setup>
import { ref, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

import AppLayout from '../Layouts/AppLayout.vue'
import ProductCard from '../Components/Product/ProductCard.vue'

import { useProduct} from "../Composables/useProduct.js";

defineOptions({ layout: AppLayout })

const { getProduct } = useProduct()

const product = ref(null)
const loading = ref(true)

const productId = usePage().props.id

const load = async () => {
    loading.value = true

    product.value = await getProduct(productId)

    loading.value = false
}

onMounted(load)
console.log(product)
</script>

<template>
    <div class="max-w-3xl mx-auto">
        <Link href="/">
            <el-button> Back to products</el-button>
        </Link>
        <div class=" mt-4">
            <ProductCard
                v-if="product"
                :product="product"
                variant="plain"
            />
        </div>
    </div>
</template>
