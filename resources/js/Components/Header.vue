<script setup>
defineProps({
    isAuth: Boolean
})

const emit = defineEmits(['login', 'logout'])
</script>

<template>

        <el-button
            v-if="!isAuth"
            type="primary"
            @click="emit('login')"
        >
            Login
        </el-button>

        <el-button
            v-else
            type="primary"
            @click="emit('logout')"
        >
            Logout
        </el-button>

</template>
