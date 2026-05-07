<script setup>
import { ref, onMounted, watch } from "vue";
import { useProduct } from '../../../Composables/useProduct'

import AdminLayout from "../../../Layouts/AdminLayout.vue";
import CategoryFilter from "../../../Components/CategoryFilter.vue";
import ProductList from "../../../Components/Product/ProductList.vue";

defineOptions({
    layout: AdminLayout,
})

const { products, meta, fetchProducts } = useProduct()

const selectedCategory = ref(null)
const page = ref(1)

const load = () => {
    fetchProducts({
        page: page.value,
        category_id: selectedCategory.value
    })
}

onMounted(load)
watch([selectedCategory, page], load)
</script>

<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-center mb-6">
            <CategoryFilter/>
        </div>

        <ProductList
            :products="products"
            variant="admin"
        />

        <el-pagination
            v-if="meta"
            class="mt-6 flex justify-center"
            layout="prev, pager, next"
            :total="meta.total"
            :page-size="meta.per_page"
            :current-page="meta.current_page"
            @current-change="val => page = val"
        />
    </div>
</template>

