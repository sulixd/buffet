<template>
    <NavBar/>
    <main>
        <slot/>
    </main>
</template>

<script setup lang="ts">
import NavBar from "@/Components/Main/NavBar.vue";
</script>
