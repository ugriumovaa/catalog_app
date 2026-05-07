<script setup>
import ProductCard from './ProductCard.vue'
import ProductDeleteDialog from "./ProductDeleteDialog.vue";
import { ref } from 'vue'
defineProps({
    products: Array,
    variant: String,
})

const showConfirm = ref(false)
const selectedProduct = ref(null)
const loading = ref(false)


const onDelete = () => {
    showConfirm.value = true
}

const confirmDelete = () => {

    loading.value = true

    setTimeout(() => {
        console.log('deleted')

        loading.value = false
        showConfirm.value = false
        // selectedProduct.value = null
    }, 500)
}
</script>

<template>
    <el-row :gutter="20">
        <el-col
            v-for="product in products"
            :key="product.id"
            :xs="24"
            :sm="12"
            :md="8"
            :lg="6"
            class="mb-4"
        >
            <ProductCard
                :product = product
                :variant="variant"
                @delete="onDelete"
            />
        </el-col>
    </el-row>
    <ProductDeleteDialog
        v-model="showConfirm"
        :loading="loading"
        @confirm="confirmDelete"
    />
</template>
