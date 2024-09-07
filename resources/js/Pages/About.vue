<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    projects: Object
});
</script>


<template>
    <GuestLayout>

            <h1>Who am I ?</h1>

    </GuestLayout>
</template>


