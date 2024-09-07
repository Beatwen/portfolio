<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import PortfolioLayout from "@/Layouts/PortfolioLayout.vue";
import { router } from "@inertiajs/vue3";
import { computed, watch } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const currentLang = page.props.locale;
const toggleLanguage = () => {
    const newLang = currentLang === "en" ? "fr" : "en";
    router.get(route("user.lang", { lang: newLang }));
};

const props = defineProps({
    projects: Object,
    experiences: Object,
});

const getImageUrl = (image) => {
    return `/storage/${image}`;
};

function Trad(translate) {
    if (currentLang === "en") {
        return translate["en"];
    } else {
        return translate["fr"];
    }
}
console.log("%cBe happy ❤️", "font-size: 30px; color: red; font-weight: bold;");
</script>

<template>
    <PortfolioLayout>
        <template v-slot:header>
            <div class="language-switcher p-6">
                <span>FR</span>
                <label class="switch">
                    <input
                        type="checkbox"
                        :checked="currentLang === 'en'"
                        @change="toggleLanguage"
                    />
                    <span class="slider round"></span>
                </label>
                <span>EN</span>
            </div>
            <div
                class="flex flex-col items-center p-8 lg:pt-8 lg:py-12 lg:pl-12"
            >
                <h1 class="text-4xl font-bold sm:text-5xl pb-4 text-justify">
                    {{ $page.props.messages.welcome }} <br />
                    {{ $page.props.messages.welcome2 }}
                    <!-- Display the current locale -->
                </h1>
                <img
                    :src="getImageUrl('images/profile/Chris.jpg')"
                    alt="picture of me"
                    class="object-cover rounded-full border-2"
                    style="width: 150px; height: 150px; border-radius: 50%"
                />
                <h2 class="mt-4 text-lg font-medium sm:text-xl">
                    {{ $page.props.messages.work }}
                </h2>
                <p
                    class="mt-4 max-w-sm leading-normal text-justify"
                    v-html="$page.props.messages.description"
                ></p>
                <p
                    class="mt-4 max-w-sm leading-normal italic"
                    v-html="$page.props.messages.happenings"
                ></p>
                <!-- Navigation section -->
                <nav class="flex flex-col mt-6 mb-6 text-left items-start">
                    <a
                        class="group flex items-center py-3 active"
                        href="#about"
                    >
                        <span
                            class="nav-indicator mr-4 h-px w-8 bg-slate-600 transition-all group-hover:w-16 group-hover:bg-slate-200 group-focus-visible:w-16 group-focus-visible:bg-slate-200 motion-reduce:transition-none"
                        ></span>
                        <span
                            class="nav-text text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-slate-200 group-focus-visible:text-slate-200"
                            v-html="$page.props.messages.about"
                        ></span>
                    </a>
                    <a
                        class="group flex items-center py-3 active"
                        href="#projects"
                    >
                        <span
                            class="nav-indicator mr-4 h-px w-8 bg-slate-600 transition-all group-hover:w-16 group-hover:bg-slate-200 group-focus-visible:w-16 group-focus-visible:bg-slate-200 motion-reduce:transition-none"
                        ></span>
                        <span
                            class="nav-text text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-slate-200 group-focus-visible:text-slate-200"
                            v-html="$page.props.messages.projects"
                        ></span>
                    </a>
                    <a
                        class="group flex items-center py-3 active"
                        href="#experiences"
                    >
                        <span
                            class="nav-indicator mr-4 h-px w-8 bg-slate-600 transition-all group-hover:w-16 group-hover:bg-slate-200 group-focus-visible:w-16 group-focus-visible:bg-slate-200 motion-reduce:transition-none"
                        ></span>
                        <span
                            class="nav-text text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-slate-200 group-focus-visible:text-slate-200"
                            v-html="$page.props.messages.experience"
                        ></span>
                    </a>
                </nav>
            </div>
            <!-- Social media icons -->
            <ul
                class="flex flex-row mt-auto w-full justify-center"
                aria-label="Social media"
            >
                <li class="pr-4">
                    <a
                        class="block hover:text-slate-200"
                        href="https://github.com/beatwen"
                        target="_blank"
                        rel="noreferrer noopener"
                        aria-label="GitHub (opens in a new tab)"
                        title="GitHub"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="h-6 w-6"
                            aria-hidden="true"
                        >
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                            ></path>
                        </svg>
                    </a>
                </li>
                <li class="pl-4 pr-4">
                    <a
                        class="block hover:text-slate-200"
                        href="https://www.linkedin.com/in/christophebouserez/"
                        target="_blank"
                        rel="noreferrer noopener"
                        aria-label="LinkedIn (opens in a new tab)"
                        title="LinkedIn"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="h-6 w-6"
                            aria-hidden="true"
                        >
                            <path
                                d="M20.5 2h-17A1.5 1.5 0 002 3.5v17A1.5 1.5 0 003.5 22h17a1.5 1.5 0 001.5-1.5v-17A1.5 1.5 0 0020.5 2zM8 19H5v-9h3zM6.5 8.25A1.75 1.75 0 118.3 6.5a1.78 1.78 0 01-1.8 1.75zM19 19h-3v-4.74c0-1.42-.6-1.93-1.38-1.93A1.74 1.74 0 0013 14.19a.66.66 0 000 .14V19h-3v-9h2.9v1.3a3.11 3.11 0 012.7-1.4c1.55 0 3.36.86 3.36 3.66z"
                            ></path>
                        </svg>
                    </a>
                </li>
                <li class="pl-4 pr-4 pt-0.5">
                    <a
                        class="block hover:text-slate-200"
                        href="https://www.facebook.com/christophe.bouserez/"
                        target="_blank"
                        rel="noreferrer noopener"
                        aria-label="Facebook (opens in a new tab)"
                        title="Facebook"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="h-6 w-6"
                            aria-hidden="true"
                        >
                            <path
                                d="M14.217 0H1.783A1.783 1.783 0 000 1.783v12.434A1.783 1.783 0 001.783 16h6.503v-5.521H6.336V7.546h1.95V5.893c0-1.936 1.182-2.992 2.908-2.992.826 0 1.538.061 1.744.089v2.023h-1.197c-.941 0-1.124.447-1.124 1.103v1.429h2.247l-.293 2.933h-1.954V16h3.631A1.783 1.783 0 0016 14.217V1.783A1.783 1.783 0 0014.217 0z"
                            ></path>
                        </svg>
                    </a>
                </li>
                <li class="pl-4 pb-2">
                    <a
                        class="block hover:text-slate-200"
                        href="mailto:christophe@noobastudio.be"
                        aria-label="Email"
                        title="Email"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="h-6 w-6"
                            aria-hidden="true"
                        >
                            <path
                                d="M2 4a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V4zm2 0l6 4.5L16 4v-.01L10 8.49 4 3.99V4zm0 2.5v7.5h12V6.5l-6 4.5-6-4.5z"
                            />
                        </svg>
                    </a>
                </li>
            </ul>
        </template>
        <h1
            id="about"
            class="mt-4 text-lg font-medium tracking-tight sm:text-xl mb-4"
        >
            {{ $page.props.messages.about }}
        </h1>
        <p class="text-justify">
            {{ $page.props.messages.aboutme }}
        </p>

        <div class="ProjectsDiv" id="projects">
            <h1
                id="about"
                class="mt-8 text-lg font-medium tracking-tight sm:text-xl mb-4"
            >
                {{ $page.props.messages.projects }}
            </h1>

            <ul v-for="project in projects" :key="project.id" class="mb-12">
                <a
                    :href="project.project_url"
                    target="_blank"
                    class="flex rounded hover:bg-slate-800"
                >
                    <li class="flex rounded hover:bg-slate-800 p-4">
                        <div class="w-1/5 justify-start pr-4">
                            <img
                                :src="getImageUrl(project.image)"
                                :alt="project.name"
                                class="object-cover rounded border-2 border-slate-200/10 transition group-hover:border-slate-200/30 sm:order-1 sm:col-span-2 sm:translate-y-1"
                                style="color: transparent"
                            />
                            <a
                                v-if="project.github_url != null"
                                :href="project.github_url"
                                target="_blank"
                                class="text-xs text-slate-500 hover:text-slate-200"
                                >View on GitHub</a
                            >
                        </div>
                        <div class="w-4/5">
                            <h2 class="font-semibold text-xl leading-tight">
                                {{ Trad(project.name) }}
                            </h2>
                            <div
                                class="flex justify-start items-center space-x-4"
                            >
                                <h3 class="mt-2 text-justify">
                                    {{ Trad(project.description) }}
                                </h3>
                            </div>
                        </div>
                    </li>
                </a>
            </ul>
        </div>

        <div class="ExperiencesDiv" id="experiences">
            <h1
                id="about"
                class="mt-4 text-lg font-medium tracking-tight sm:text-xl mb-4"
            >
                {{ $page.props.messages.experience }}
            </h1>

            <ul
                v-for="experience in experiences"
                :key="experience.id"
                class="mt-4"
            >
                <li class="flex">
                    <div class="w-1/5 justify-start">
                        {{ experience.start_year }} - {{ experience.end_year }}
                    </div>
                    <div class="w-4/5">
                        <h2 class="font-semibold text-xl leading-tight">
                            {{ Trad(experience.name) }}
                        </h2>

                        <div class="flex justify-end items-center space-x-4">
                            <h3 class="mt-2 text-justify">
                                {{ Trad(experience.description) }}
                            </h3>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </PortfolioLayout>
</template>

<style scoped>
.language-switcher {
    display: flex;
    align-items: center;
    gap: 10px;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    margin-left: 10px; /* Adds some spacing between the label and the switch */
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #0f60a3;

    transition: 0.4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: rgb(148 163 184);
    transition: 0.4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #b14a00;
}

input:focus + .slider {
    box-shadow: 0 0 1px #0f60a3;
}

input:checked + .slider:before {
    transform: translateX(26px);
}
</style>
