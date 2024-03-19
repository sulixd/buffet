<template>
    <Head :title="(product).name" />
    <MainLayout :nav-fixed="false">
        <section class="my-4 md:max-w-screen-lg px-5 lg:px-0 mx-auto mb-2">
            <h1 class="text-3xl mb-5">{{ product.name }}</h1>
            <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-3 mb-4">

            </div>
        </section>
    </MainLayout>
</template>

<script setup lang="ts">
import {Head, usePage} from '@inertiajs/vue3';
import type { Product } from "@/types";
import MainLayout from "@/Layouts/MainLayout.vue";
import {computed} from "vue";

const page = usePage()

const product = computed(() => page.props.product as Product)
</script>
