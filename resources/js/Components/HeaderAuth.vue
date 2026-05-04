<script setup>
defineProps({
    user: Object
})

const emit = defineEmits(['login', 'logout'])
</script>

<template>
    <el-button
        v-if="!user"
        type="primary"
        @click="emit('login')"
    >
        Login
    </el-button>

    <el-dropdown v-else>
    <span class="cursor-pointer flex items-center gap-2">
      {{ user.name }}
    </span>

        <template #dropdown>
            <el-dropdown-menu>
                <el-dropdown-item @click="emit('logout')">
                    Logout
                </el-dropdown-item>
            </el-dropdown-menu>
        </template>
    </el-dropdown>
</template>
