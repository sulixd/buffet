<template>
    <NavBar :fixed="navFixed" />
    <main>
        <slot/>
    </main>
</template>

<script setup lang="ts">
import NavBar from "@/Components/Main/NavBar.vue";
defineProps<{
    navFixed: boolean;
}>()
</script>
