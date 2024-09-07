<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name_en: null,
    name_fr: null,
    brief_description_en: null,
    brief_description_fr: null,
    description_en: null,
    description_fr: null,
    experience_url: null,
    start_date: null,
    end_date: null,
});

const successMessage = ref('');
const submitForm = async () => {
    await form.post(route('experiences.store'), {
        onSuccess: () => {
            successMessage.value = 'Enregistré avec succès';
        },
        onError: () => {
            successMessage.value = 'Oups, non enregistré, veuillez réessayer';
        }
    });
};
</script>

<template>
    <Head title="Create experience" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create a new experience</h2>
            <form @submit.prevent="submitForm" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <!-- Start and End Date -->
                        <div class="flex">
                            <label class="block w-full bg-blue-200 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="start_date" required>
                                Start of the experience
                            </label>
                            <label class="block w-full bg-green-200 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="end_date">
                                End of the experience
                            </label>
                        </div>
                        <div class="flex">
                            <input v-model="form.start_date" id="start_date" type="date" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required>
                            <input v-model="form.end_date" id="end_date" type="date" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.start_date">{{ form.errors.start_date }}</p>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.end_date">{{ form.errors.end_date }}</p>

                        <!-- Name (English and French) -->
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name_en">
                            Name of the experience (English)
                        </label>
                        <input v-model="form.name_en" id="name_en" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.name_en">{{ form.errors.name_en }}</p>

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name_fr">
                            Name of the experience (French)
                        </label>
                        <input v-model="form.name_fr" id="name_fr" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.name_fr">{{ form.errors.name_fr }}</p>

                        <!-- Brief Description (English and French) -->
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brief_description_en">
                            Brief description of the experience (English)
                        </label>
                        <textarea v-model="form.brief_description_en" id="brief_description_en" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="6"></textarea>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.brief_description_en">{{ form.errors.brief_description_en }}</p>

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brief_description_fr">
                            Brief description of the experience (French)
                        </label>
                        <textarea v-model="form.brief_description_fr" id="brief_description_fr" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="6"></textarea>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.brief_description_fr">{{ form.errors.brief_description_fr }}</p>

                        <!-- Description (English and French) -->
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description_en" required>
                            Description of the experience (English)
                        </label>
                        <textarea v-model="form.description_en" id="description_en" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="12" required></textarea>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.description_en">{{ form.errors.description_en }}</p>

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description_fr">
                            Description of the experience (French)
                        </label>
                        <textarea v-model="form.description_fr" id="description_fr" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="12"></textarea>
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.description_fr">{{ form.errors.description_fr }}</p>

                        <!-- Experience URL -->
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="experience_url" required>
                            Experience URL
                        </label>
                        <input v-model="form.experience_url" id="experience_url" type="text" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        <p class="mt-2 text-sm text-red-600" v-if="form.errors.experience_url">{{ form.errors.experience_url }}</p>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create experience
                        </button>
                        <p class="mt-4 text-sm text-green-600" v-if="successMessage">{{ successMessage }}</p>
                    </div>
                </div>
            </form>
        </template>
    </AuthenticatedLayout>
</template>
