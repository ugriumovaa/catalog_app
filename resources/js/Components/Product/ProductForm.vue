<script setup>
import { reactive } from 'vue'

const props = defineProps({
    product: Object,
    categories: Array,
    isEdit: Boolean
})

const emit = defineEmits(['submit'])

const form = reactive({
    name: props.product?.name || '',
    category_id: props.product?.category_id || '',
    description: props.product?.description || '',
    price: props.product?.price || ''
})

const rules = {
    name: [{ required: true, message: 'Name required', trigger: 'blur' }],
    category_id: [{ required: true, message: 'Category required', trigger: 'change' }],
    price: [{ required: true, message: 'Price required', trigger: 'blur' }]
}

let formRef = null

const onSubmit = () => {
    formRef.validate((valid) => {
        if (!valid) return
        emit('submit', form)
    })
}
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
                <el-input v-model="form.description" type="textarea" rows="4" />
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
