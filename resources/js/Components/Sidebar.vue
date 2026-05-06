<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const links = [
    {
        name: 'Main',
        href: '/admin',
    },
    {
        name: 'All Products',
        href: '/admin/products',
    },
    {
        name: 'Create Product',
        href: '/admin/products/create',
    },
]
</script>

<template>
    <el-menu
        :default-active="page.url"
        class="flex-1 w-full"
    >
        <el-menu-item
            v-for="link in links"
            :key="link.href"
            :index="link.href"
        >
            <Link :href="link.href" class="w-full">
                {{ link.name }}
            </Link>
        </el-menu-item>
    </el-menu>
</template>
