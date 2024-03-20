<template>
    <Head title="Főoldal" />
    <MainLayout :navFixed="true">
        <section class="min-h-screen homeBg h-auto overflow-hidden flex">
            <div class="m-auto z-10 sm:px-0 max-w-sm w-[95%] md:w-full">
                <div class="py-8 px-3 rounded-lg">
                    <div class="px-4 py-2">
                        <div>
                            <h1 class="text-3xl mb-3 bree-serif-regular">
                                Üdvözöljük a Bottyán Büfé weblapján
                            </h1>
                            <LinkOrange href="/products">
                                Rendelés
                            </LinkOrange>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from '@inertiajs/vue3';
import LinkOrange from "@/Components/Main/LinkOrange.vue";
</script>

