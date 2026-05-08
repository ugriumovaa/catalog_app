<script setup>
import { reactive, ref, onMounted, computed } from 'vue'

import { useCategory } from '../../Composables/useCategory'

const props = defineProps({
    product: Object,
})
console.log(props.product)
const emit = defineEmits(['submit'])

const formRef = ref()
const { categories, fetchCategories } = useCategory()

const isEdit = computed(() => !!props.product)

const form = reactive({
    name: props.product?.name || '',
    category_id: props.product?.category?.id|| '',
    description: props.product?.description || '',
    price: props.product?.price || ''
})

const rules = {
    name: [{ required: true, message: 'Name required', trigger: 'blur' }],
    description: [{ required: true, message: 'Description required', trigger: 'blur'}],
    category_id: [{ required: true, message: 'Category required', trigger: 'change' }],
    price: [{ required: true, message: 'Price required', trigger: 'blur' }]
}

console.log(props.product)
const onSubmit = async () => {
    const valid = await formRef.value.validate()

    if (!valid) {
        return
    }

    emit('submit', {
        ...form,
        price: Number(form.price)
    })
}

onMounted(async () => {
    await fetchCategories()
})
</script>

<template>
    <div class="max-w-xl mx-auto">
        <h2 class="text-xl font-semibold mb-6">
            {{ isEdit ? 'Edit Product' : 'Create Product' }}
        </h2>

        <el-form
            :model="form"
            :rules="rules"
            ref="formRef"
            label-position="top"
            class="space-y-4"
        >
            <el-form-item label="Name" prop="name">
                <el-input v-model="form.name" />
            </el-form-item>

            <el-form-item label="Category" prop="category_id">
                <el-select v-model="form.category_id" filterable class="w-full">
                    <el-option
                        v-for="c in categories"
                        :key="c.id"
                        :label="c.name"
                        :value="c.id"
                    />
                </el-select>
            </el-form-item>

            <el-form-item label="Description">
                <el-input v-model="form.description" type="textarea" :rows="4" />
            </el-form-item>

            <el-form-item label="Price" prop="price">
                <el-input v-model="form.price" type="number" />
            </el-form-item>

            <div class="flex justify-end gap-2">
                <el-button @click="$inertia.visit('/admin/products')">
                    Cancel
                </el-button>

                <el-button type="primary" @click="onSubmit">
                    {{ isEdit ? 'Update' : 'Create' }}
                </el-button>
            </div>
        </el-form>
    </div>
</template>
