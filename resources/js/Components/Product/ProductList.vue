<script setup>
import ProductCard from './ProductCard.vue'
import ProductDeleteDialog from "./ProductDeleteDialog.vue";
import { ref } from 'vue'
defineProps({
    products: Array,
    isAdmin: Boolean
})

const showConfirm = ref(false)
const selectedProduct = ref(null)
const loading = ref(false)


const onDelete = () => {
    showConfirm.value = true
}

const confirmDelete = () => {
    // if (!selectedProduct.value) return

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
            v-for="i in 4"
            :key="i"
            :xs="24"
            :sm="12"
            :md="8"
            :lg="6"
            class="mb-4"
        >
            <ProductCard
                :is-admin="isAdmin"
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
