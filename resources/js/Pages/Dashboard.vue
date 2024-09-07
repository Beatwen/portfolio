<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    projects: Object,
    experiences: Object,
});

const form = useForm({});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Here are all the projects made</div>
                </div>
                <div v-for="project in projects" :key="project.id" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="flex p-6 text-gray-900 dark:text-gray-100">
                        <div class="w-1/2 flex flex-col justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ project.name }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ project.brief_description }}</p>
                        </div>
                        <div class="w-1/2 flex justify-end items-center space-x-4">
                            <a :href="route('projects.edit', project)" class="text-blue-500 hover:text-blue-700">
                                <i class="ri-edit-line"></i>
                            </a>
                            <form @submit.prevent="form.delete(route('projects.destroy', project))">
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="ri-delete-bin-2-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <form @submit.prevent="form.get(route('projects.create'))" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Créer un nouveau projet</button>
                </form>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Here are all the experiences added</div>
                </div>
                <div v-for="experience in experiences" :key="experience.id" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="flex p-6 text-gray-900 dark:text-gray-100">
                        <div class="w-1/2 flex flex-col justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ experience.name }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ experience.brief_description }}</p>
                        </div>
                        <div class="w-1/2 flex justify-end items-center space-x-4">
                            <a :href="route('experiences.edit', experience)" class="text-blue-500 hover:text-blue-700">
                                <i class="ri-edit-line"></i>
                            </a>
                            <form @submit.prevent="form.delete(route('experiences.destroy', experience))">
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="ri-delete-bin-2-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <form @submit.prevent="form.get(route('experiences.create'))" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Add an XP</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
