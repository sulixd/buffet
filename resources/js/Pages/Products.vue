<template>
    <Head title="Termékek" />
    <MainLayout :navFixed="false">
        <section class="my-4 md:max-w-screen-lg px-5 lg:px-0 mx-auto mb-2">
            <h1 class="text-3xl mb-5">Termékek</h1>
            <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-3 mb-4">
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
import Paginator from "@/Components/Main/Product/Paginator.vue";
import {computed} from "vue";
import Product from "@/Components/Main/Product/Product.vue";
import OrderModal from "@/Components/Main/Product/OrderModal.vue";

const page = usePage()

const pageLinks = computed(() => {
    return (page.props.paginator as Pagination).links
})
</script>

