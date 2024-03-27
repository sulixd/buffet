<template>
    <Head title="Termékek" />
    <MainLayout :navFixed="false">
        <section class="my-4 md:max-w-screen-lg px-5 lg:px-0 mx-auto mb-2">
            <h1 class="text-3xl mb-5">Kosár</h1>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <template v-for="(item, inx) in $page.props.cart.items" :key="inx">
                        <div class="my-2 rounded px-3 py-2 bg-gray-100">
                            <h2>{{ getProduct(item.product_id) }}</h2>
                        </div>
                    </template>
                </div>
                <div>x</div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head, usePage} from '@inertiajs/vue3';
import type {Product} from "@/types";

const page = usePage()

const getProduct = (id: number): Product => {
    for(let i = 0; i < page.props.cart.products.length; i++) {
        if(page.props.cart.products[i].id == id) {
            return page.props.cart.products[i]
        }
    }
    return {} as Product
}
</script>

