<script setup>
import { ref } from 'vue'
import { useProduct } from '../../Composables/useProduct'


import ProductCard from './ProductCard.vue'
import ProductDeleteDialog from "./ProductDeleteDialog.vue";

const props = defineProps({
    products: Array,
    variant: String,
})

const emit = defineEmits(['deleted'])

const { deleteProduct } = useProduct()

const showConfirm = ref(false)
const selectedProduct = ref(null)
const loading = ref(false)

const onDelete = (product) => {
    selectedProduct.value = product
    showConfirm.value = true
}

const confirmDelete = async () => {
    if (!selectedProduct.value) {
        return
    }

    loading.value = true

    try {
        await deleteProduct(selectedProduct.value.id)

        emit('deleted')

        showConfirm.value = false
        selectedProduct.value = null
    } finally {
        loading.value = false
    }
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
        :message="`Delete ${selectedProduct?.name}?`"
        @confirm="confirmDelete"
    />
</template>
