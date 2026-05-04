<script setup>

defineProps({
    modelValue: Boolean,
    title: {
        type: String,
        default: 'Confirm'
    },
    message: String,
    loading: Boolean
})

const emit = defineEmits(['update:modelValue', 'confirm'])

const close = () => {
    emit('update:modelValue', false)
}

const confirm = () => {
    emit('confirm')
}
</script>

<template>
    <el-dialog
        :model-value="modelValue"
        @update:modelValue="emit('update:modelValue', $event)"
        :title="title"
        width="400"
    >
        <span>{{ message }}</span>

        <template #footer>
            <div class="flex justify-end gap-2">
                <el-button @click="close">
                    Cancel
                </el-button>

                <el-button
                    type="danger"
                    :loading="loading"
                    @click="confirm"
                >
                    Confirm
                </el-button>
            </div>
        </template>
    </el-dialog>
</template>
