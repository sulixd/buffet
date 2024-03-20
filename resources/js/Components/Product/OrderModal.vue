<template>
    <DefaultModal :show="true" @close="emit('close')">
        <h2 class="text-xl bree-serif-regular">{{ product.name }}</h2>
        <hr class="my-3 rounded border-0 bg-gray-300 h-1">
        <div class="text-left">
            <p>Kérd ahogy szereted</p>
            <ul class="max-h-[300px] overflow-x-hidden overflow-y-scroll mb-4">
                <li v-for="(ingredient, index) in product.ingredients"
                    :key="ingredient.id"
                    class="my-2 py-1 bg-white border-gray-300 flex items-center justify-between"
                    :class="{'border-b': index != product.ingredients.length-1}"
                >
                    <div class="flex items-center space-x-2">
                        <img :src="ingredient.image_url" :alt="ingredient.ingredient" class="w-7 h-7" >
                        <p>
                            {{ ingredient.ingredient[0].toUpperCase() + ingredient.ingredient.substring(1) }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <Toggler/>
                    </div>
                </li>
                <ButtonOrange>Kosárba</ButtonOrange>
            </ul>
        </div>
    </DefaultModal>
</template>

<script setup lang="ts">
import DefaultModal from "@/Components/Main/DefaultModal.vue";
import type {Product} from "@/types";
import ButtonOrange from "@/Components/Main/ButtonOrange.vue";
import Toggler from "@/Components/Toggler.vue";

defineProps<{
    product: Product;
}>()

const emit = defineEmits(['close'])
</script>
