<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import {ref} from "vue";
import {User} from "@/types";
import getUserFirstName from "../../scripts/getUserFirstName";

const isMenuOpen = ref(false)
</script>

<template>
    <nav class="bg-white w-full z-20 top-0 left-0 border-b fixed">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <Link to="/" class="flex items-center">
                <img src="/images/logo.webp" class="w-[100px] md:w-[100px] mr-3" alt="Logo">
            </Link>
            <div class="flex md:order-2">
                <button v-if="$page.props.auth.user" class="flex space-x-3 items-center w-full py-2 px-3 text-gray-900 rounded md:w-auto hover:bg-gray-50 focus:bg-gray-200">
                    <img :src="$page.props.auth.user.profile_image_url" class="w-[26px] rounded-full">
                    <span>
                        {{ getUserFirstName($page.props.auth.user) }}
                    </span>
                </button>
                <a href="/auth/redirect" v-else class="flex space-x-3 items-center w-full py-2 px-3 text-gray-900 rounded md:w-auto hover:bg-gray-50 focus:bg-gray-200">
                    Bejelentkezés
                </a>
                <button @click="isMenuOpen = !isMenuOpen" type="button" class="mr-2 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-700 rounded-lg md:hidden bg-gray-100 hover:bg-gray-50 focus:bg-gray-200">
                    <span class="sr-only">Open menu</span>
                    Menu icon
                </button>
            </div>
            <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" :class="{'hidden': !isMenuOpen}">
                <ul class="flex flex-col md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 p-1">
                    <li>
                        <Link href="/" class="block py-2 pl-3 pr-4 text-gray-400 rounded-lg hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-600 md:p-0">Főoldal</Link>
                    </li>
                    <li>
                        <Link href="/" class="block py-2 pl-3 pr-4 text-gray-400 rounded-lg hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-600 md:p-0">Termékek</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

