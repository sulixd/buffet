<template>
    <div class="bg-gray-50 rounded flex flex-1 flex-col justify-between border-2 border-gray-300 my-3 md:my-1" data-wrap="product">
        <div
            class="product transition w-full h-[200px] bg-primary py-5 flex items-center cursor-pointer rounded-t-sm"
            :style="{backgroundImage: `url(${product.image_url})`}"
        ></div>
        <div class="px-3 mt-auto py-2">
            <h4 class="text-xl bree-serif-regular">{{ product.name }}</h4>
            <hr class="my-2 rounded border-0 bg-gray-300 h-1">
            <p class="text-lg">Ár: {{ price }}</p>
            <ButtonOrange @click="emit('order', product)" class="mt-2 !rounded-md !py-2">
                Kosárba
            </ButtonOrange>
        </div>
    </div>
</template>

<script setup lang="ts">
import {Product} from "@/types";
import {computed} from "vue";
import ButtonOrange from "@/Components/Main/ButtonOrange.vue";

const props = defineProps<{
    product: Product;
}>()

const emit = defineEmits(['order'])

const price = computed(() => {
    return props.product.price.toLocaleString('hu-HU', {
        style: 'currency',
        currency: 'HUF',
        maximumSignificantDigits: Math.trunc(Math.abs(props.product.price)).toFixed().length,
    })
})
</script>

<style scoped>
.product {
    background-repeat: no-repeat;
    background-attachment: inherit;
    background-size: cover;
    background-position: center;
}
</style>
