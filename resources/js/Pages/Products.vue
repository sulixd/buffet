<template>
    <Head title="Termékek" />
    <MainLayout :navFixed="false">
        <section class="my-4 mx-5">
            <div class="grid grid-cols-3 gap-3">
                <template v-for="product in (($page.props.paginator as Pagination).data as Array<IProduct>)" :key="product.id">
                    <Product :product="product" />
                </template>
            </div>
            <Paginator :links="pageLinks" />
        </section>
    </MainLayout>
</template>

<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head, usePage} from '@inertiajs/vue3';
import type {Pagination, Product as IProduct} from "@/types";
import Paginator from "@/Components/Main/Paginator.vue";
import {computed} from "vue";
import Product from "@/Components/Main/Product.vue";

const page = usePage()

const pageLinks = computed(() => {
    return (page.props.paginator as Pagination).links
})
</script>

