<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    projects: Object,
});

const form = useForm({
    name_en: null,
    name_fr: null,
    brief_description_en: null,
    brief_description_fr: null,
    description_en: null,
    description_fr: null,
    github_url: null,
    project_url: null,
    start_date: null,
    end_date: null,
    image: null,
});


const successMessage = ref('');
const submitForm = async () => {
    await form.post(route('projects.store'), {
        onSuccess: () => {
            successMessage.value = 'Projet enregistré avec succès';
        },
        onError: () => {
            successMessage.value = 'Projet non enregistré, veuillez réessayer';
        }
    });
};

</script>

<template>
    <Head title="Create project" />

    <AuthenticatedLayout>
        <template #header>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Create a new project
                </h2>

                <form @submit.prevent="submitForm" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg" enctype="multipart/form-data">
                    <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <div class="flex">
                                <label class="block w-full  bg-blue-200 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brief_description" required>
                                    Start of the project
                                </label>
                                <label class="block w-full bg-green-200 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="start_date" required>
                                    End of the project
                                </label>
                        </div>
                        <div class="flex">
                            <input v-model="form.start_date" label="Start date of the project" id="start_date" type="date" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="6" cols="50" required>
                            <input v-model="form.end_date" label="End date of the project" id="end_date" type="date" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="6" cols="50">
                        </div>
                    <!-- Name (English and French) -->
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name_en">
                        Name of the project (English)
                    </label>
                    <input v-model="form.name_en" id="name_en" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white" required>
                    <p class="mt-2 text-sm text-red-600" v-if="form.errors.name_en">
                            {{ form.errors.name_en }}
                        </p>

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name_fr">
                        Name of the project (French)
                    </label>
                    <input v-model="form.name_fr" id="name_fr" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white">
                    <p class="mt-2 text-sm text-red-600" v-if="form.errors.name_fr">
                            {{ form.errors.name_fr }}
                        </p>


                    <!-- Brief Description (English and French) -->
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brief_description_en">
                        Brief description of the project (English)
                    </label>
                    <textarea v-model="form.brief_description_en" id="brief_description_en" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white" required></textarea>
                    <p class="mt-2 text-sm text-red-600" v-if="form.errors.brief_description_en">
                            {{ form.errors.brief_description_en }}
                        </p>

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brief_description_fr">
                        Brief description of the project (French)
                    </label>
                    <textarea v-model="form.brief_description_fr" id="brief_description_fr" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white"></textarea>
                    <p class="mt-2 text-sm text-red-600" v-if="form.errors.brief_description_fr">
                            {{ form.errors.brief_description_fr }}
                        </p>

                    <!-- Description (English and French) -->
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description_en">
                        Description of the project (English)
                    </label>
                    <textarea v-model="form.description_en" id="description_en" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white" required></textarea>
                    <p class="mt-2 text-sm text-red-600" v-if="form.errors.description_en">
                            {{ form.errors.description_en }}
                        </p>

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description_fr">
                        Description of the project (French)
                    </label>
                    <textarea v-model="form.description_fr" id="description_fr" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white"></textarea>
                    <p class="mt-2 text-sm text-red-600" v-if="form.errors.description_fr">
                            {{ form.errors.description_fr }}
                        </p>

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="github_url" required>
                            Github URL
                        </label>
                        <input v-model="form.github_url" label="Github URL" id="github_url" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="6" cols="50">
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.github_url">
                            {{ form.errors.github_url }}
                        </p>

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="project_url" required>
                            Project URL
                        </label>
                        <input v-model="form.project_url" label="URL to the project" id="url" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="6" cols="50">
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.project_url">
                            {{ form.errors.project_url }}
                        </p>
                        <div>
                        <label
                            for="image"
                            class="block text-sm font-medium text-gray-700"
                            >Image</label
                        >
                        <input
                            type="file"
                            id="image"
                            @input="form.image = $event.target.files[0]"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Entrez l'image"
                        />
                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="100"
                        >
                            {{ form.progress.percentage }}%
                        </progress>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.image">
                            {{ form.errors.image }}
                        </p>
                    </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create project</button>
                        <p class="mt-4 text-sm text-green-600" v-if="successMessage">{{ successMessage }}</p>
                    </div>
                    </div>
            </form>
        </template>
    </AuthenticatedLayout>
</template>
