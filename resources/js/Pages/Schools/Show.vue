<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    school: {
        id: number;
        app_icon: string;
        app_icon_url: string;
        name: string;
        domain: string;
        school_id: string;
        created_at: string;
        updated_at: string;
    };
}>();

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleString();
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="bg-white p-6 shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <h1
                        class="mb-6 text-2xl font-semibold text-gray-900 dark:text-gray-100"
                    >
                        School Details
                    </h1>

                    <div class="space-y-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >App Icon</label
                            >
                            <img
                                :src="school.app_icon"
                                class="mt-1 h-20 w-20"
                            />
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Name</label
                            >
                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                {{ school.name }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Domain</label
                            >
                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                {{ school.domain }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Identifier</label
                            >
                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                {{ school.school_id }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Created At</label
                            >
                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                {{ formatDate(school.created_at) }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Updated At</label
                            >
                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                {{ formatDate(school.updated_at) }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-4">
                        <Link
                            :href="route('schools.edit', school.id)"
                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300"
                        >
                            Edit
                        </Link>
                        <Link
                            :href="route('schools.index')"
                            class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                        >
                            Back to List
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
