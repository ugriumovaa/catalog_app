<script setup>
import AppLayout from '../Layouts/AppLayout.vue'
import CategoryFilter from "../Components/CategoryFilter.vue";
import ProductList from '../Components/Product/ProductList.vue'

import {ref} from "vue";

defineOptions({
    layout: AppLayout,
    message: String,
    products: Array,
    user: Object
})

const categories = ref([
    { id: 1, name: 'Electronics' },
    { id: 2, name: 'Clothes' },
    { id: 3, name: 'Books' }
])

const selectedCategory = ref(null)

const onFilter = (val) => {
    console.log('filter by category:', val)
}

const user = true

</script>


<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-center mb-6">
            <CategoryFilter
                    v-model="selectedCategory"
                    :categories="categories"
                    @change="onFilter"
                />
            <el-button
                v-if="user"
                type="primary"
            >
                Create Product
            </el-button>
        </div>

        <ProductList
            :is-admin="true"
        />
    </div>
</template>

<style>
</style>
