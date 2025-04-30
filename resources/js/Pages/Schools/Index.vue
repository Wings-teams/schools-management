<script setup lang="ts">
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, router } from '@inertiajs/vue3';

defineProps<{
    schools: Array<{
        id: number;
        app_icon: string;
        app_icon_url: string;
        name: string;
        domain: string;
        created_at: string;
    }>;
}>();

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString();
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6">
                        <div class="mb-6 flex items-center justify-between">
                            <h1
                                class="text-2xl font-semibold text-gray-900 dark:text-gray-100"
                            >
                                Schools
                            </h1>
                            <Link :href="route('schools.create')">
                                <PrimaryButton>Create New School</PrimaryButton>
                            </Link>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead
                                    class="border-b-2 border-gray-300 text-left dark:border-gray-600"
                                >
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            Icon
                                        </th>
                                        <th
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            Name
                                        </th>
                                        <th
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            Domain
                                        </th>
                                        <th
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            Created At
                                        </th>
                                        <th
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="school in schools"
                                        :key="school.id"
                                        class="border-b border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700"
                                    >
                                        <td class="px-4 py-3">
                                            <img
                                                :src="school.app_icon"
                                                class="h-10 w-10"
                                            />
                                        </td>
                                        <td
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            {{ school.name }}
                                        </td>
                                        <td
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            {{ school.domain }}
                                        </td>
                                        <td
                                            class="px-4 py-3 text-gray-900 dark:text-gray-300"
                                        >
                                            {{ formatDate(school.created_at) }}
                                        </td>
                                        <td class="space-x-2 px-4 py-3">
                                            <Link
                                                :href="
                                                    route(
                                                        'schools.show',
                                                        school.id,
                                                    )
                                                "
                                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300"
                                            >
                                                Show
                                            </Link>
                                            <Link
                                                :href="
                                                    route(
                                                        'schools.edit',
                                                        school.id,
                                                    )
                                                "
                                                class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300"
                                            >
                                                Edit
                                            </Link>
                                            <DangerButton
                                                @click="
                                                    router.delete(
                                                        route(
                                                            'schools.destroy',
                                                            school.id,
                                                        ),
                                                    )
                                                "
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                            >
                                                Delete
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
