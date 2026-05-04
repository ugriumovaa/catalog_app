<script setup>
import {ref} from 'vue'
import LoginDialog from '@/Components/LoginDialog.vue'
import HeaderAuth from "../Components/HeaderAuth.vue";

const showLogin = ref(false)
const user = ref(null)

const handleLogin = (data) => {
    user.value = {
        name: data.email
    }
}

const logout = () => {
    user.value = null
}
</script>

<template>
    <el-container class="min-h-screen bg-gray-100">

        <el-header class="flex justify-end items-center px-8 border border-gray-300 bg-white">
            <HeaderAuth
                :user="user"
                @login="showLogin = true"
                @logout="logout"
            />
        </el-header>

        <el-main class="flex justify-center p-8">
                <slot/>
        </el-main>

        <LoginDialog
            v-model="showLogin"
            @submit="handleLogin"
        />

    </el-container>
</template>
