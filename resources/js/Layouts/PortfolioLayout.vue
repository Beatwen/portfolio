<script setup>
import NavLink from "@/Components/NavLink.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import MusicPlayer from "@/Components/MusicPlayer.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
const page = usePage();
const user = computed(() => page.props.auth.user);
const showingNavigationDropdown = ref(false);





</script>

<template>
    <div>
        <div
            class="lg:flex bg-slate-900 leading-relaxed text-slate-400 antialiased selection:bg-teal-300 selection:text-teal-900"
        >
            <!-- Page Heading -->
            <header
                class="lg:sticky lg:top-0 lg:flex lg:max-h-screen lg:w-2/5 lg:flex-col lg:justify-between overflow-auto"
                v-if="$slots.header"
            >
                <slot name="header" />
            </header>
            <!-- Page Content -->
            <main class="lg:w-3/5 py-24 p-8 overflow-auto">
                <slot />
            </main>
        </div>
    </div>
</template>


<style scoped>
/* For WebKit browsers (Chrome, Safari, etc.) */
header::-webkit-scrollbar {
    width: 5px; /* Width of the scrollbar */
}

header::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2); /* Light color for the scrollbar thumb */
    border-radius: 10px; /* Rounded corners */
}

header::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.4); /* Slightly darker on hover */
}

header::-webkit-scrollbar-track {
    background: transparent; /* Transparent background for the scrollbar track */
}

/* For Firefox */
header {
    scrollbar-width: thin; /* Thinner scrollbar */
    scrollbar-color: rgba(0, 0, 0, 0.2) transparent; /* Thumb color and track color */
}

</style>
