<script setup>
defineProps({
    modelValue: [String, Number, null],
    categories: {
        type: Array,
        default: () => []
    }
})

const emit = defineEmits([
    'update:modelValue',
    'change'
])

const onChange = (value) => {
    emit('update:modelValue', value)
    emit('change', value)
}
</script>

<template>
    <div class="w-64">

        <el-select
            :model-value="modelValue"
            @update:modelValue="onChange"
            placeholder="Select category"
            clearable
            class="w-full"
        >
            <el-option
                v-for="category in categories"
                :key="category.id"
                :label="category.name"
                :value="category.id"
            />
        </el-select>

    </div>
</template>
