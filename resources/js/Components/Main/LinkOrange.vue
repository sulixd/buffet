<template>
    <Link :href="href" class="transition inline-block w-full bg-orange-400 hover:bg-orange-300 active:bg-orange-200 rounded-xl p-3 text-white text-center">
        <slot/>
    </Link>
</template>

<script setup lang="ts">
import {Link} from "@inertiajs/vue3"

defineProps<{
    href: string;
}>()
</script>
