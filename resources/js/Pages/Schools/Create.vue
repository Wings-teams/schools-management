<script setup lang="ts">
import FileInput from '@/Components/FileInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    app_icon: null as File | null,
    name: '',
    domain: '',
});

const submit = () => {
    form.post(route('schools.store'), {
        forceFormData: true,
        preserveScroll: true,
    });
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
                        Create New School
                    </h1>

                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <InputLabel value="App Icon" />
                            <FileInput
                                v-model="form.app_icon"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.app_icon"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <InputLabel value="Name" />
                            <TextInput
                                v-model="form.name"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.name"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <InputLabel value="Domain" />
                            <TextInput
                                v-model="form.domain"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.domain"
                                class="mt-2"
                            />
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <Link
                                :href="route('schools.index')"
                                class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                            >
                                Cancel
                            </Link>
                            <PrimaryButton :disabled="form.processing">
                                Create School
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
