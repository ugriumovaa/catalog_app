<script setup>

const props = defineProps({
    product: Object,
    isAdmin: Boolean,
    showActions: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['delete'])

</script>

<template>
    <el-card>
        <template #header>
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <span class="font-medium">Product name</span>
                    <p class="text-sm text-gray-500">127.00</p>
                </div>
            </div>
        </template>
        <div class="text-sm text-gray-500 mb-2">Category</div>
        <p>Product description...</p>
        <template #footer    v-if="showActions">
            <div class="flex justify-end">
                <el-button v-if="!isAdmin" size="small">View</el-button>

                <div  v-else>
                    <el-button size="small">Edit</el-button>
                    <el-button
                        @click="emit('delete')"
                        size="small"
                        type="danger"
                        plain>Delete</el-button>
                </div>
            </div>
        </template>
    </el-card>
</template>
