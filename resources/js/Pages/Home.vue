<template >
    <div id="app">
        <h1>Hello Inertia</h1>
        <p>{{ message }}</p>
    </div>
</template>

<script setup>
defineProps({
    message: String
})
</script>
