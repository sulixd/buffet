<template>
    <div v-if="links.length > 1">
        <div class="flex flex-wrap mx-auto items-center md:justify-center">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url == null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <Link v-else :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-[#fef3e2]': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script setup lang="ts">
import {PaginationLink} from "@/types";
import {Link} from "@inertiajs/vue3"

defineProps<{
    links: Array<PaginationLink>;
}>()
</script>
