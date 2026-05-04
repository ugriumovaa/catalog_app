<script setup>
import { ref } from 'vue'

const props = defineProps({
    modelValue: [String, Number, null],
})

const emit = defineEmits(['update:modelValue', 'change'])

const options = ref([])
const loading = ref(false)

let timeout = null

const remoteMethod = (query) => {
    clearTimeout(timeout)

    timeout = setTimeout(() => {
        loading.value = true

        const all = [
            { id: 1, name: 'Electronics' },
            { id: 2, name: 'Clothes' },
            { id: 3, name: 'Books' },
            { id: 4, name: 'Cosmetics' },
        ]

        options.value = all.filter(c =>
            c.name.toLowerCase().includes(query.toLowerCase())
        )

        loading.value = false
    }, 300)
}

const onChange = (val) => {
    emit('update:modelValue', val)
    emit('change', val)
}
</script>

<template>
    <div    class="flex w-64">
        <el-select
            :model-value="modelValue"
            @update:modelValue="onChange"
            filterable
            remote
            reserve-keyword
            placeholder="Search category"
            :remote-method="remoteMethod"
            :loading="loading"
            clearable

        >
            <el-option
                v-for="c in options"
                :key="c.id"
                :label="c.name"
                :value="c.id"
            />
        </el-select>
    </div>

</template>
