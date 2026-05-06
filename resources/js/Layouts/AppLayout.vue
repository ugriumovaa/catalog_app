<script setup>
import {ref} from 'vue'
import { useAuth } from '../Composables/useAuth'

import Header from "../Components/Header.vue"
import LoginDialog from '../Components/LoginDialog.vue'

const showLogin = ref(false)
const { isAuth, logout } = useAuth()
</script>

<template>
    <el-container class="min-h-screen bg-gray-100">

        <el-header class="flex justify-end items-center px-8 border border-gray-300 bg-white">
            <Header
                :is-auth="isAuth()"
                @login="showLogin = true"
                @logout="logout"
            />
        </el-header>

        <el-main class="flex justify-center p-8">
                <slot/>
        </el-main>

        <LoginDialog
            v-model="showLogin"
        />

    </el-container>
</template>
