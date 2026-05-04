<script setup>
import {ref, watch} from 'vue'

const props = defineProps({
    modelValue: Boolean
})

const emit = defineEmits(['update:modelValue', 'submit'])

const form = ref({
    email: '',
    password: ''
})

const loading = ref(false)

const close = () => emit('update:modelValue', false)

const submit = () => {
    loading.value = true

    setTimeout(() => {
        loading.value = false
        emit('submit', form.value)
        close()
    }, 500)
}
</script>

<template>
    <el-dialog
        :model-value="modelValue"
        @update:modelValue="val => emit('update:modelValue', val)"
        title="Login"
        width="400px"
    >
        <el-form :model="form" label-position="top">
            <el-form-item label="Email">
                <el-input v-model="form.email"/>
            </el-form-item>

            <el-form-item label="Password">
                <el-input v-model="form.password" type="password" show-password/>
            </el-form-item>
        </el-form>

        <template #footer>
            <div class="flex justify-end gap-2">
                <el-button type="primary" :loading="loading" @click="submit">
                    Login
                </el-button>
            </div>
        </template>
    </el-dialog>
</template>
