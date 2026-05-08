<script setup>
import { computed } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    product: Object,
    isAdmin: Boolean,
    variant: {
        type: String,
        default: 'public'
    }
})

const description = computed(() => {
    if (props.variant === 'plain') {
        return props.product.description
    }

    return props.product.description.length > 100
        ? props.product.description.slice(0, 100) + '...'
        : props.product.description
})

const showPublic = computed(() => props.variant === 'public')
const showAdmin = computed(() => props.variant === 'admin')

const goToEdit = () => {
    router.visit(`/admin/products/${props.product.id}/edit`)
}
const goToShow = () => {
    router.visit(`/product/${props.product.id}`)
}

const emit = defineEmits(['delete'])

</script>

<template>
    <el-card>
        <template #header>
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <span class="font-medium">{{ product.name }}</span>
                    <p class="text-sm text-gray-500">{{ product.price }}</p>
                </div>
            </div>
        </template>

        <div class="text-sm text-gray-500 mb-2">Category: {{ product.category?.name }}</div>
        <p :class="{'line-clamp-3': variant !== 'plain'}">
            {{ description }}
        </p>

        <template #footer v-if="variant !== 'plain'">
            <div class="flex justify-end">
                <el-button
                    v-if="showPublic"
                    size="small"
                    @click="goToShow"
                >
                    View
                </el-button>

                <div  v-if="showAdmin">
                    <el-button
                        size="small"
                        @click="goToEdit"
                    >
                        Edit
                    </el-button>
                    <el-button
                        @click="emit('delete', product)"
                        size="small"
                        type="danger"
                        plain
                    >
                        Delete
                    </el-button>
                </div>
            </div>
        </template>
    </el-card>
</template>
