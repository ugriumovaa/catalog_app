<script setup>
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import CategoryFilter from "../../../Components/CategoryFilter.vue";
import ProductList from "../../../Components/Product/ProductList.vue";

defineOptions({
    layout: AdminLayout,
})

</script>

<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-center mb-6">
            <CategoryFilter/>
        </div>

        <ProductList
            :is-admin="true"
        />
    </div>
</template>

