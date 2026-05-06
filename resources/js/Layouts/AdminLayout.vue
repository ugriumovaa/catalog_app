<script setup>
import {onMounted, ref} from 'vue'
import {useAuth} from '../Composables/useAuth'
import {router} from '@inertiajs/vue3'

import Header from "../Components/Header.vue";
import Sidebar from "../Components/Sidebar.vue";

const {isAuth, logout} = useAuth()
const ready = ref(false)

onMounted(() => {
    if (!isAuth()) {
        router.visit('/')
    } else {
        ready.value = true
    }
})
</script>

<template>
    <div class="common-layout">
        <el-container class="min-h-screen bg-gray-100" v-if="ready">

            <el-header class="flex justify-end items-center px-8 border border-gray-300 bg-white">
                <Header
                    :is-auth="true"
                    @logout="logout"
                />
            </el-header>

            <el-container>
                <el-aside class="w-64 flex">
                    <Sidebar/>
                </el-aside>
                <el-main class="flex justify-center p-8">
                    <slot/>
                </el-main>
            </el-container>

        </el-container>
    </div>
</template>
